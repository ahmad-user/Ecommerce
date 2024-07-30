<?php
$id_user = $_GET['id_user'];
$recuser = $model->userfind($id_user);

if (isset($_POST['simpan'])) {
    $data = $model->useredit($id_user);
}
?>

<div class="page-heading">
    <h3>User / Edit Data</h3>
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
                                        <input type="hidden" class="form-control" id="nama" name="id_user" value="<?= $id_user ?>">
                                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $recuser['nama'] ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $recuser['username'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="text" class="form-control" id="password" name="password" value="<?= $recuser['password'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">No Hp</label>
                                        <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $recuser['nohp'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nohp">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $recuser['alamat'] ?>" required>
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