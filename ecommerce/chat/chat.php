<?php
session_start();
include_once "php/config.php";
if (!isset($_SESSION['login'])) {
  echo "<script>alert('Anda belum login')</script>";
  echo "<script>window.location = '../login.php'</script>";
}
?>
<?php include_once "header.php"; ?>

<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <?php
        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
        $sql = mysqli_query($conn, "SELECT * FROM user WHERE status = {$user_id}");
        if (mysqli_num_rows($sql) > 0) {
          $row = mysqli_fetch_assoc($sql);
        } else {
          header("location: ../index.php");
        }
        ?>
                <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="php/images/user.png" alt="">
                <div class="details">
                    <span><?= $row['username'] ?></span>
                    <p><?php $row['aktif'] === 'ya' ? 'Aktif' : 'Tidak Aktif'; ?></p>
                </div>
            </header>
            <div class="chat-box">

            </div>
            <form action="#" class="typing-area">
                <input type="text" class="incoming_id" name="pesan_masuk" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="pesan" class="input-field" placeholder="Ketik pesan..." autocomplete="off">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>

    <script src="javascript/chat.js"></script>

</body>

</html>