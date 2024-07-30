<?php
if (isset($_POST['simpan'])) {
    $data = $model->usersave();
}
?>

<div class="page-heading">
    <h3>User / Tambah Data</h3>
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
                            <a href="index.php?page=user" class="btn btn-secondary float-start"><i class="bi bi-arrow-left-short">Kembali</i></a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <section class="section">
                        <form action="" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp">
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat">
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