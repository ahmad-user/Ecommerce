<?php
$rectran = $model->transaksifetch();
$no = 1;

if (isset($_POST['cari'])) {
    $_GET['awal'] = $_POST['awal'];
    $_GET['akhir'] = $_POST['akhir'];
    $rectran = $model->transaksifind($_POST['awal'], $_POST['akhir']);
}

if (isset($_POST['update'])) {
    $model->transaksiedit($_POST['kode_transaksi']);
}

?>

<div class="page-heading">
    <h3>Transaksi</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">
                            Data Transaksi
                        </h5>
                    </div>
                </div>
                <form action="index.php?page=transaksi" method="post">
                    <div class="row">
                        <div class="col-3">
                            <input type="date" name="awal" class="form-control" required>
                        </div>
                        <div class="col-3">
                            <input type="date" name="akhir" class="form-control" required>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success" name="cari">Cari</button>
                            <a href="index.php?page=transaksi" class="btn btn-dark">Reset</a>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <?php if (!empty($rectran)) { ?>
                        <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>Tgl</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama User</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Jenis</th>
                                    <th>Jumlah</th>
                                    <th>Total</th>
                                    <th class="text-center">Bukti Transaksi</th>
                                    <th class="text-center">Status</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php foreach ($rectran as $u) { ?>
                                    <tr>
                                        <td><?= $u['tgl_transaksi'] ?></td>
                                        <td><?= $u['kode_transaksi'] ?></td>
                                        <td><?= $u['nama'] ?></td>
                                        <td><?= $u['nama_produk'] ?></td>
                                        <td><?= $u['nama_kategori'] ?></td>
                                        <?php if ($u['jenis'] == '1') { ?>
                                            <td>Motor</td>
                                        <?php } else { ?>
                                            <td>Mobil</td>
                                        <?php } ?>
                                        <td><?= $u['jumlah'] ?></td>
                                        <td><?= $u['harga_produk'] ?></td>
                                        <td align="center">
                                            <?php if ($u['bukti_transaksi'] == "COD") { ?>
                                                <h5>COD</h5>
                                            <?php } else { ?>
                                                <img src="./../bukti/<?= $u['bukti_transaksi'] ?>" class="img-thumbnail" width="80px" height="80px">
                                            <?php } ?>

                                        </td>
                                        <form action="" method="post">
                                            <td>
                                                <select name="status" class="form-control" id="">
                                                    <option value="<?= $u['status'] ?>"><?= $u['status'] ?></option>
                                                    <option value="Dikemas">Dikemas</option>
                                                    <option value="Dikirim">Dikirim</option>
                                                    <option value="Sampai">Sampai</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="hidden" name="kode_transaksi" value="<?= $u['kode_transaksi'] ?>">
                                                <button type="submit" class="btn btn-primary" name="update">Update</button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php if (!empty($_GET['awal']) && !empty($_GET['akhir'])) { ?>
                            <div class="row">
                                <div class="col">
                                    <a href="transaksi/print.php?awal=<?= $_GET['awal'] ?>&akhir=<?= $_GET['akhir'] ?>" class="btn btn-warning btn-lg">Print Data</a>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col">
                                    <a href="transaksi/print.php" class="btn btn-warning btn-lg">Print Data</a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <h2>Data masih kosong</h2>
                    <?php } ?>
                </div>
            </div>

    </section>
</div>