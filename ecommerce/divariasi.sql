-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2024 pada 16.08
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divariasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Velg'),
(2, 'Stiker'),
(3, 'Lampu Depan'),
(4, 'Lampu Belakang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `pesan_masuk` int(11) NOT NULL,
  `pesan_keluar` int(11) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `detail_produk` text NOT NULL,
  `kategori` int(11) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `stok_produk` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `detail_produk`, `kategori`, `jenis`, `stok_produk`, `harga_produk`, `gambar`) VALUES
(22, 'Velg Advan ', 'velg advan rg d2 r16 silver polish lebar 7 et35 kondisi baru', 1, 2, 44, 100000, 'velg mobil.jpg'),
(23, 'VELG MOTOR BEBEK PALANG 8 ', 'VELG MOTOR BEBEK PALANG 8 JUPITER , MX , KARISMA , SUPRA VROSSI', 1, 1, 100, 200000, 'velg motor.jpg'),
(24, 'DECAL STIKER MOBIL', 'DECAL STIKER MOBIL FORTUNER VARIASI DECAL MOBIL TERBARU / ECAL STIKER MOBIL FORTUNER - FTR 10', 2, 2, 100, 1000, 'stiker mobil.jpg'),
(25, 'Stiker Motor Racing', 'Stiker Motor Racing Hologram Vinyl Waterproof Anti Air', 2, 1, 100, 2000, 'stiker motor.jpg'),
(26, 'Lampu Depan Mobil ', ' Lampu Depan Mobil Cahaya Super Terang 72W/12V 24V H4 COB Cool White 6500K', 3, 2, 100, 2000, 'lampud mobil.jpg'),
(27, 'Lampu Utama LED Laser Gun Motor', 'Lampu Utama LED Laser Gun Motor AC DC Lasergun Hi Lo 2 Warna H6 BEBEK DAN MATIC', 3, 1, 100, 10000, 'lampud motor.jpg'),
(28, 'Toyota Calya Daihatsu Sigra', 'oyota Calya Daihatsu Sigra 2016 2017 2018 2019 2021 2022 2023 2024 | Lampu Belakang |Tail Lamp | Stop Lamp | Tail lights |', 4, 2, 100, 50000, 'lampub mobil.jpg'),
(29, 'LED Running Motor', 'Lampu Stop Rem Model Jagung 30 Mata LED Running Motor Mobil Universal', 4, 1, 100, 50000, 'lampub motor.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(15) NOT NULL,
  `total_transaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `bukti_transaksi` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `total_transaksi`, `tgl_transaksi`, `bukti_transaksi`, `status`) VALUES
(40, 'T-001', 100000, '2024-07-28', 'COD', 'Dikemas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `kode_transaksi` varchar(15) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `alamat_pengirim` varchar(255) DEFAULT NULL,
  `nohp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`kode_transaksi`, `id_user`, `id_produk`, `jumlah`, `total`, `alamat_pengirim`, `nohp`) VALUES
('T-001', 8, 22, 1, 100000, 'bandung', 21);

--
-- Trigger `transaksi_detail`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `transaksi_detail` FOR EACH ROW BEGIN
    UPDATE produk
    SET stok_produk = stok_produk - NEW.jumlah
    WHERE produk.id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nohp` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` int(11) NOT NULL,
  `aktif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `nohp`, `alamat`, `status`, `aktif`) VALUES
(1, 'admin', 'admin', 'admin', 8080808, 'jakarta', 1, 'ya'),
(8, 'eko', 'eko', 'eko', 21, 'Jakarta', 0, 'ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
