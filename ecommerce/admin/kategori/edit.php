<?php
$id_kategori = $_GET['id_kategori'];
$rekategori = $model->kategorifind($id_kategori);

if (isset($_POST['simpan'])) {
    $data = $model->kategoriedit($id_kategori);
}
?>

<div class="page-heading">
    <h3>Kategori / Edit Data</h3>
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
                            <a href="index.php?page=kategori" class="btn btn-secondary float-start"><i
                                    class="bi bi-arrow-left-short">Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <section class="section">
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama Kategori</label>
                                        <input type="hidden" class="form-control" id="nama" name="id_kategori"
                                            value="<?= $id_kategori; ?>" required>

                                        <input type="text" class="form-control" id="nama" name="nama_kategori"
                                            value="<?= $rekategori['nama_kategori'] ?>" required>
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