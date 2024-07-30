<?php
$reckategori = $model->kategorifetch();
$no = 1;
?>

<div class="page-heading">
    <h3>Kategori</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            Data Kategori
                        </h5>
                    </div>
                    <div class="col">
                        <a href="index.php?page=kategori_add" class="btn btn-primary float-end">+ Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (!empty($reckategori)) { ?>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($reckategori as $u) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u['nama_kategori'] ?></td>
                                <td class="text-center">
                                    <a href="index.php?page=kategori_edit&id_kategori=<?= $u['id_kategori'] ?>"
                                        class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?page=kategori_delete&id_kategori=<?= $u['id_kategori'] ?>"
                                        class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>

                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php } else { ?>
                    <h2>Data masih kosong</h2>
                    <?php } ?>
                </div>
            </div>

    </section>
</div>