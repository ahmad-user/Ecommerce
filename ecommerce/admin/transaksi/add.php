<?php
if (isset($_POST['simpan'])) {
    $data = $model->produksave();
}
?>

<div class="page-heading">
    <h3>Produk / Tambah Data</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card w-75">
            <div class="card-header">
                <div class="row mb-3">
                    <div class="col">
                        <h5 class="card-title">
                            Tambah Data
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
                                        <input type="text" class="form-control" id="nama" name="nama_produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="detail">Detail</label>
                                        <textarea type="text" class="form-control" id="detail"
                                            name="detail_produk"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_produk">Jenis Produk</label>
                                        <select name="jenis_produk" id="" class="form-control">
                                            <option value="">Pilih Jenis</option>
                                            <option value="1">Acc Motor</option>
                                            <option value="2">Acc Mobil</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok_produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga_produk">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Gambar Produk</label>
                                        <input type="file" class="form-control" name="gambar">
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