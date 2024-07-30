<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-center align-items-center">
                <div class="logo">
                    <a href="index.php?page=dashboard">
                        <span>DiVariasi</span>
                    </a>
                </div>
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'dashboard') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=dashboard" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php }
                } ?>

                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'user') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=user" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>User</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=user" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>User</span>
                    </a>
                </li>
                <?php }
                } ?>

                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'produk') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=produk" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=produk" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <?php }
                } ?>

                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'kategori') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=kategori" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=kategori" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Kategori</span>
                    </a>
                </li>
                <?php }
                } ?>

                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'transaksi') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=transaksi" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=transaksi" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
                <?php }
                } ?>

                <?php if ($_GET) { ?>
                <?php if ($_GET['page'] == 'chat') { ?>
                <li class="sidebar-item active">
                    <a href="index.php?page=chat" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pesan</span>
                    </a>
                </li>
                <?php } else { ?>
                <li class="sidebar-item ">
                    <a href="index.php?page=chat" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Pesan</span>
                    </a>
                </li>
                <?php }
                } ?>

                <hr>

                <li class="sidebar-item ">
                    <a href="index.php?page=logout" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>