<?php
$id_produk = $_GET['id_produk'];
$reproduk = $model->produkfind($id_produk);
$reckategori = $model->kategorifetch();

if (isset($_POST['simpan'])) {
    $data = $model->produkedit($id_produk);
}
?>

<div class="page-heading">
    <h3>Produk / Edit Data</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card w-75">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col">
                        <h5 class="card-title">
                            Edit Data
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="col">
                            <a href="index.php?page=produk" class="btn btn-secondary float-start"><i
                                    class="bi bi-arrow-left-short">Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <section class="section">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Produk</label>
                                        <input type="hidden" class="form-control" id="nama" name="id_produk"
                                            value="<?= $id_produk; ?>" required>

                                        <input type="text" class="form-control" id="nama" name="nama_produk"
                                            value="<?= $reproduk['nama_produk'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Detail</label>
                                        <textarea type="text" class="form-control" id="detail" name="detail_produk"
                                            value="<?= $reproduk['detail_produk'] ?>"
                                            required><?= $reproduk['detail_produk'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_produk">Kategori</label>
                                        <select name="kategori" id="" class="form-control">
                                            <?php if ($reproduk['kategori'] == 1) { ?>
                                            <option value="<?= $reproduk['kategori'] ?>">
                                                <?= $reproduk['nama_kategori'] ?>
                                            </option>
                                            <?php } else { ?>
                                            <option value="<?= $reproduk['kategori'] ?>">
                                                <?= $reproduk['nama_kategori'] ?>
                                            </option>
                                            <?php } ?>
                                            <?php if ($reckategori) {
                                                foreach ($reckategori as $d) { ?>
                                            <option value="<?= $d['id_kategori'] ?>"><?= $d['nama_kategori'] ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_produk">Jenis</label>
                                        <select name="jenis" id="" class="form-control">
                                            <?php if ($reproduk['jenis'] == 1) { ?>
                                            <option value="<?= $reproduk['jenis'] ?>">Motor</option>
                                            <?php } else { ?>
                                            <option value="<?= $reproduk['jenis'] ?>">Mobil</option>
                                            <?php } ?>
                                            <option value="1">Motor</option>
                                            <option value="2">Mobil</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok_produk"
                                            value="<?= $reproduk['stok_produk'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga_produk"
                                            value="<?= $reproduk['harga_produk'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Gambar Produk</label>
                                        <input type="file" class="form-control" name="gambar">
                                        <input type="hidden" class="form-control" name="gambarlama"
                                            value="<?= $reproduk['gambar'] ?>">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                        </form>
                    </section>
                </div>
            </div>
        </div>

    </section>
</div>