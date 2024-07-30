<?php
$recuser = $model->userfetch();
$no = 1;
?>

<div class="page-heading">
    <h3>User</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            Data User
                        </h5>
                    </div>
                    <div class="col">
                        <a href="index.php?page=user_add" class="btn btn-primary float-end">+ Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>No Hp</th>
                                <th>Alamat</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($recuser)) { ?>

                                <?php foreach ($recuser as $u) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $u['nama'] ?></td>
                                        <td><?= $u['username'] ?></td>
                                        <td><?= $u['password'] ?></td>
                                        <td><?= $u['nohp'] ?></td>
                                        <td><?= $u['alamat'] ?></td>
                                        <td class="text-center">
                                            <a href="index.php?page=user_edit&id_user=<?= $u['id_user'] ?>" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                            <a href="index.php?page=user_delete&id_user=<?= $u['id_user'] ?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <h2>Data masih kosong</h2>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>
</div>