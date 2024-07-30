<?php
session_start();
if (isset($_SESSION['login'])) {
    include_once "config.php";
    $pesan_keluar = $_SESSION['login'];
    $pesan_masuk = mysqli_real_escape_string($conn, $_POST['pesan_masuk']);
    $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);
    if (!empty($pesan)) {
        $sql = mysqli_query($conn, "INSERT INTO pesan (pesan_masuk, pesan_keluar, isi_pesan)
                                        VALUES ('$pesan_masuk', '$pesan_keluar', '$pesan')") or die();
    }
} else {
    header("location: ../../login.php");
}