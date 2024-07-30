<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password;
    private $db = "divariasi";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (Exception $e) {
            echo "Koneksi Gagal" . $e->getMessage();
        }
    }

    // User
    // Login User
    public function login($username, $password)
    {
        $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
        $sql = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($sql);

        if ($row) {
            if ($row['status'] == 1) {
                $aktif = 'ya';
                $query = "UPDATE user SET aktif = '$aktif' WHERE id_user = '$row[id_user]'";
                $sql = mysqli_query($this->conn, $query);
                if ($sql) {
                    session_start();
                    $_SESSION['login'] = $row['id_user'];
                    echo "<script>alert('Login Berhasil')</script>";
                    echo "<script>window.location = 'admin/index.php?page=dashboard'</script>";
                }
            } else if ($row['status'] == 0) {
                $aktif = 'ya';
                $query = "UPDATE user SET aktif = '$aktif' WHERE id_user = '$row[id_user]'";
                $sql = mysqli_query($this->conn, $query);
                if ($sql) {
                    session_start();
                    $_SESSION['login'] = $row['id_user'];
                    echo "<script>alert('Login Berhasil')</script>";
                    echo "<script>window.location = 'index.php'</script>";
                }
            }
        } else {
            echo "<script>alert('Login Gagal')</script>";
            echo "<script>window.location = 'login.php'</script>";
        }
    }

    public function register()
    {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        $status = 0;

        $query = "INSERT INTO user (nama, username, password, nohp,alamat, status) VALUES ('$nama','$username', '$password', '$nohp','$alamat', $status)";

        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Berhasil Register')</script>";
            echo "<script> window.location='login.php';</script>";
        } else {
            echo "<script>alert('Gagal Register')</script>";
            echo "<script> window.location='register.php';</script>";
        }
    }

    // Kategori
    // Mengambil Data Kategori
    public function kategorifetch()
    {
        $data = null;
        $query = 'SELECT * FROM kategori';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    // Tambah Kategori
    public function kategorisave()
    {
        $nama_kategori = $_POST['nama_kategori'];

        $query = "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')";

        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=kategori';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='index.php?page=kategori_add';</script>";
        }
    }

    public function kategoriedit($id_kategori)
    {
        $id_kategori = $_POST['id_kategori'];
        $nama_kategori = $_POST['nama_kategori'];

        $query = "UPDATE kategori SET nama_kategori='$nama_kategori' WHERE id_kategori='$id_kategori'";

        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=kategori';</script>";
        } else {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=kategori_edit';</script>";
        }
    }

    public function kategoridelete($id_kategori)
    {
        $query = "DELETE FROM kategori WHERE id_kategori = '$id_kategori'";
        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            echo "<script> window.location='index.php?page=kategori';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus')</script>";
        }
    }
    // END

    // kategori
    // Mengambil Data Produk
    public function produkfetch()
    {
        $data = null;
        $query = 'SELECT * FROM produk
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function mobilfetch()
    {
        $data = null;
        $query = 'SELECT * FROM produk
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE produk.jenis = 2';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function motorfetch()
    {
        $data = null;
        $query = 'SELECT * FROM produk
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE produk.jenis = 1';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    public function produksave()
    {
        $nama_produk = $_POST['nama_produk'];
        $detail_produk = $_POST['detail_produk'];
        $kategori = $_POST['kategori'];
        $jenis = $_POST['jenis'];
        $stok_produk = $_POST['stok_produk'];
        $harga_produk = $_POST['harga_produk'];
        $gambar = $_FILES['gambar']['name'];
        $tmpName = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmpName, '../upload/' . $gambar);

        $query = "INSERT INTO produk (nama_produk, detail_produk, jenis, kategori, stok_produk, harga_produk, gambar) VALUES ('$nama_produk', '$detail_produk', '$jenis', '$kategori', '$stok_produk', '$harga_produk', '$gambar')";

        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=produk';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='index.php?page=produk_add';</script>";
        }
    }

    public function produkedit($id_produk)
    {
        $id_produk = $_POST['id_produk'];
        $nama_produk = $_POST['nama_produk'];
        $detail_produk = $_POST['detail_produk'];
        $kategori = $_POST['kategori'];
        $jenis = $_POST['jenis'];
        $stok_produk = $_POST['stok_produk'];
        $harga_produk = $_POST['harga_produk'];
        $gambarlama = $_POST['gambarlama'];

        if ($_FILES['gambar']['error'] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = $_FILES['gambar']['name'];
            $tmpName = $_FILES['gambar']['tmp_name'];
            move_uploaded_file($tmpName, '../upload/' . $gambar);
        }


        $query = "UPDATE produk SET nama_produk='$nama_produk', detail_produk='$detail_produk', kategori='$kategori', jenis='$jenis', harga_produk='$harga_produk', stok_produk='$stok_produk', gambar='$gambar' WHERE id_produk='$id_produk'";

        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=produk';</script>";
        } else {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=produk_edit';</script>";
        }
    }


    public function kategorifind($id_kategori)
    {
        $data = null;
        $query = "SELECT * FROM kategori 
        WHERE id_kategori = '$id_kategori'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function produkfind($id_produk)
    {
        $data = null;
        $query = "SELECT * FROM produk 
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE id_produk = '$id_produk'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function motorfind($kategori, $jenis)
    {
        $data = null;
        $query = "SELECT * FROM produk 
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE produk.kategori = '$kategori'
        AND produk.jenis = $jenis";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function mobilfind($kategori, $jenis)
    {
        $data = null;
        $query = "SELECT * FROM produk 
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE produk.kategori = '$kategori'
        AND produk.jenis = $jenis";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function produkdelete($id_produk)
    {
        $query = "DELETE FROM produk WHERE id_produk = '$id_produk'";
        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            echo "<script> window.location='index.php?page=produk';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus')</script>";
        }
    }
    // Akhir Produk


    // Transaksi
    // Tambah Transaksi Detail
    public function transaksidetailsave()
    {
        $query = "SELECT max(kode_transaksi) as kode_tran FROM transaksi_detail";
        if ($sql = $this->conn->query($query)) {
            $rows = mysqli_fetch_assoc($sql);
            $kodetransaksi = $rows['kode_tran'];
        }

        if ($kodetransaksi == null) {
            $kode_transaksi = 'T-001';
        } else {
            $urutan = (int) substr($kodetransaksi, 2, 3);
            $urutan++;
            $huruf = "T-";
            $kode_transaksi = $huruf . sprintf("%03s", $urutan);
        }

        date_default_timezone_set('Asia/Jakarta');
        $kode_transaksi = $kode_transaksi;
        $id_produk = $_POST['id_produk'];
        $id_user = $_POST['id_user'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat_pengirim'];
        $query = "INSERT INTO transaksi_detail (kode_transaksi, id_user, id_produk, jumlah, total, alamat_pengirim, nohp) 
        VALUES ('$kode_transaksi', '$id_user', '$id_produk', '$jumlah', '$total', '$alamat','$nohp')";

        if ($sql = $this->conn->query($query)) {
            $query = 'SELECT * FROM transaksi_detail ORDER BY kode_transaksi DESC LIMIT 1';
            if ($sql = $this->conn->query($query)) {
                $row = mysqli_fetch_assoc($sql);
                $kode_transaksi = $row['kode_transaksi'];
                $total_transaksi = $row['total'];
                $tgl_transaksi = date('Y-m-d');

                if (isset($_POST['bukti_transaksi'])) {
                    $bukti_transaksi = $_POST['bukti_transaksi'];
                }
                if (isset($_FILES['bukti_transaksi'])) {

                    if ($_FILES['bukti_transaksi']['error'] === 4) {
                        $bukti_transaksi = $_FILES['bukti_transaksi']['name'];
                        $tmpName = $_FILES['bukti_transaksi']['tmp_name'];
                        move_uploaded_file($tmpName, './bukti/' . $bukti_transaksi);
                    }
                }

                $status = 'Dikemas';

                $query = "INSERT INTO transaksi (kode_transaksi, total_transaksi, tgl_transaksi, bukti_transaksi, status) VALUES ('$kode_transaksi', '$total_transaksi',  '$tgl_transaksi', '$bukti_transaksi', '$status')";

                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('Data Berhasil Disimpan')</script>";
                    echo "<script> window.location='index.php';</script>";
                }
            }
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='pesan.php';</script>";
        }
    }

    // Pembayaran
    public function transaksisave()
    {
        date_default_timezone_set('Asia/Jakarta');
        $no_transaksi = $_SESSION['no_transaksi'];
        $tgl_transaksi = date('Y-m-d');
        $id_user = $_SESSION['login'];
        $total_pembayaran = $_SESSION['total_pembayaran'];
        $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];
        $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];
        move_uploaded_file($tmpName, 'img/' . $bukti_pembayaran);

        $query = "INSERT INTO transaksi (no_transaksi, tgl_transaksi, id_user, total_pembayaran, bukti_pembayaran) VALUES ('$no_transaksi', '$tgl_transaksi',  '$id_user', '$total_pembayaran', '$bukti_pembayaran')";

        if ($sql = $this->conn->query($query)) {
            unset($_SESSION['keranjang']);
            unset($_SESSION['no_transaksi']);
            unset($_SESSION['total_pembayaran']);
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='produk.php';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='checkout.php';</script>";
        }
    }

    // Mengambil Data Transaksi
    public function transaksifetch()
    {
        $data = null;
        $query = 'SELECT *, transaksi.status as status FROM transaksi_detail
        INNER JOIN transaksi ON transaksi.kode_transaksi = transaksi_detail.kode_transaksi
        INNER JOIN user ON user.id_user = transaksi_detail.id_user
        INNER JOIN produk ON produk.id_produk = transaksi_detail.id_produk
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori 
        ORDER BY transaksi_detail.kode_transaksi DESC
        ';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    // Cari Data Transaksi
    public function transaksifind($awal, $akhir)
    {
        $data = null;
        $query = "SELECT * FROM transaksi_detail
        INNER JOIN transaksi ON transaksi.kode_transaksi = transaksi_detail.kode_transaksi
        INNER JOIN user ON user.id_user= transaksi_detail.id_user
        INNER JOIN produk ON produk.id_produk = transaksi_detail.id_produk
        INNER JOIN kategori ON kategori.id_kategori = produk.kategori
        WHERE transaksi.tgl_transaksi BETWEEN DATE('$awal') AND DATE('$akhir')
        ";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function transaksifind1($id_user)
    {
        $data = null;
        $query = "SELECT * FROM transaksi_detail
        INNER JOIN transaksi ON transaksi.kode_transaksi = transaksi_detail.kode_transaksi
        INNER JOIN produk ON produk.id_produk = transaksi_detail.id_produk
        WHERE transaksi_detail.id_user = '$id_user'
        ";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function transaksiedit($kode_transaksi)
    {
        $status = $_POST['status'];
        $query = "UPDATE transaksi SET status='$status'
                    WHERE kode_transaksi = '$kode_transaksi'
        ";
        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=transaksi';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='index.php?page=transaksi';</script>";
        }
    }

    // Akhir Transaksi

    // User
    // Mengambil Data User
    public function userfetch()
    {
        $data = null;
        $query = 'SELECT * FROM user';
        if ($sql = $this->conn->query($query)) {
            while ($rows = mysqli_fetch_assoc($sql)) {
                $data[] = $rows;
            }
        }
        return $data;
    }

    // Tambah Data User
    public function usersave()
    {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];
        $status = 0;

        $query = "INSERT INTO user (nama, username, password, nohp, alamat, status) VALUES ('$nama', '$username',  '$password', '$nohp','$alamat', '$status')";

        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Disimpan')</script>";
            echo "<script> window.location='index.php?page=user';</script>";
        } else {
            echo "<script>alert('Data Gagal Disimpan')</script>";
            echo "<script> window.location='index.php?page=user_add';</script>";
        }
    }

    // Cari Data User
    public function userfind($id_user)
    {
        $data = null;
        $query = "SELECT * FROM user WHERE id_user = '$id_user'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }


    // Edit Data User
    public function useredit($id_user)
    {
        $nama = $_POST['nama'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nohp = $_POST['nohp'];
        $alamat = $_POST['alamat'];

        $query = "UPDATE user SET id_user='$id_user', nama='$nama', username='$username', password='$password', nohp='$nohp' , alamat='$alamat' WHERE id_user='$id_user'";

        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Diubah')</script>";
            echo "<script> window.location='index.php?page=user';</script>";
        } else {
            echo "<script>alert('Data Gagal Diubah')</script>";
            echo "<script> window.location='index.php?page=user_edit';</script>";
        }
    }

    // Hapus Data User
    public function userdelete($id_user)
    {
        $query = "DELETE FROM user WHERE id_user = '$id_user'";
        if ($this->conn->query($query)) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            echo "<script> window.location='index.php?page=user';</script>";
        } else {
            echo "<script>alert('Data Gagal Dihapus')</script>";
            echo "<script> window.location='index.php?page=user';</script>";
        }
    }
}
