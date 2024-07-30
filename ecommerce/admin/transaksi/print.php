<?php
include '../../model.php';
$model = new Model();
$rectran = $model->transaksifetch();
$no = 1;

if (!empty($_GET['awal']) && !empty($_GET['akhir'])) {
    $rectran = $model->transaksifind($_GET['awal'], $_GET['akhir']);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <script>
    window.print()
    </script>

    <center class="mt-2">
        <img src="../../images/logo.png.png" alt="" class="img-fluid" style="width: 200px;">
    </center>
    <hr>
    <center class="mb-3">
        <h3>LAPORAN TRANSAKSI</h3>
    </center>
    <?php if (!empty($rectran)) { ?>
    <table class="table table-bordered ">
        <thead class="text-center align-middle">
            <tr>
                <th>Tgl</th>
                <th>Kode Transaksi</th>
                <th>Nama User</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody class="align-middle">
            <?php
                $total = 0;
                foreach ($rectran as $u) {
                    $total += $u['total'] ?>
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
                <td><?= $u['total'] ?></td>
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr align="center">
                <th colspan="4">
                    TOTAL TRANSAKSI
                </th>
                <th colspan="4">
                    Rp. <?= number_format($total) ?>
                </th>
            </tr>
        </tfoot>
    </table>
    <?php } ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>