<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['login'])) {
    echo "<script>alert('Maaf anda belum login')</script>";
    echo "<script> window.location='../login.php';</script>";
}
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM user WHERE id_user = {$_SESSION['login']}");
                    if (mysqli_num_rows($sql) > 0) {
                        $row = mysqli_fetch_assoc($sql);
                    }
                    ?>
                    <img src="php/images/user.png" alt="">
                    <div class="details">
                        <span><?php echo $row['username']  ?></span>
                        <p><?php echo $row['aktif']; ?></p>
                    </div>
                </div>
                <a href="../index.php" class="logout">Kembali</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search...">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">

            </div>
        </section>
    </div>

    <script src="javascript/users.js"></script>

</body>

</html>