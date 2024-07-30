<?php
session_start();
if (isset($_SESSION['login'])) {
    include_once "config.php";
    $pesan_keluar = $_SESSION['login'];
    $pesan_masuk = mysqli_real_escape_string($conn, $_POST['pesan_masuk']);
    $output = "";
    $sql = "SELECT * FROM pesan LEFT JOIN user ON user.id_user = pesan.pesan_keluar
                WHERE pesan_keluar = '$pesan_keluar' AND pesan_masuk = '$pesan_masuk'
                OR pesan_keluar = '$pesan_masuk' AND pesan_masuk = '$pesan_keluar' ORDER BY id_pesan";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['pesan_keluar'] === $pesan_keluar) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>' . $row['isi_pesan'] . '</p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>' . $row['isi_pesan'] . '</p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">Tidak ada pesan masuk.</div>';
    }
    echo $output;
} else {
    header("location: ../../login.php");
}