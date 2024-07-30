<?php
$recproduk = $model->produkfetch();
$no = 1;
?>

<div class="page-heading">
    <h3>Produk</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            Data Produk
                        </h5>
                    </div>
                    <div class="col">
                        <a href="index.php?page=produk_add" class="btn btn-primary float-end">+ Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <?php
                    if (!empty($recproduk)) { ?>
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Detail Produk</th>
                                <th>Kategori</th>
                                <th>Jenis</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($recproduk as $u) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $u['nama_produk'] ?></td>
                                <td><?= $u['detail_produk'] ?></td>
                                <td><?= $u['nama_kategori'] ?></td>
                                <?php if ($u['jenis'] == 1) { ?>
                                <td>Motor</td>
                                <?php } else { ?>
                                <td>Mobil</td>
                                <?php } ?>
                                <td><?= $u['stok_produk'] ?></td>
                                <td><?= $u['harga_produk'] ?></td>
                                <td>
                                    <img src="./../upload/<?= $u['gambar'] ?>" class="img-thumbnail" width="80px"
                                        height="80px">

                                </td>
                                <td class="text-center">
                                    <a href="index.php?page=produk_edit&id_produk=<?= $u['id_produk'] ?>"
                                        class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                    <a href="index.php?page=produk_delete&id_produk=<?= $u['id_produk'] ?>"
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