<?php
$recuser = $model->userfetch();
$recproduk = $model->produkfetch();
$rectransaksi = $model->transaksifetch();
$no = 1;
?>

<div class="page-heading">
    <h3>Dashboard</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total User</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($recuser) { ?>
                        <h2><?= count($recuser) ?></h2>
                        <?php } else { ?>
                        <h2>0</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Produk</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($recproduk) { ?>
                        <h2><?= count($recproduk) ?></h2>
                        <?php } else { ?>
                        <h2>0</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Total Transaksi</h4>
                    </div>
                    <div class="card-body">
                        <?php if ($rectransaksi) { ?>
                        <h2><?= count($rectransaksi) ?></h2>
                        <?php } else { ?>
                        <h2>0</h2>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>