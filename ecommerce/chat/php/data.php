<?php
while ($row = mysqli_fetch_assoc($query)) {
    $sql2 = "SELECT * FROM pesan WHERE (pesan_masuk = {$row['id_user']}
                OR pesan_keluar = {$row['id_user']}) AND (pesan_keluar = {$outgoing_id} 
                OR pesan_masuk = {$outgoing_id}) ORDER BY id_pesan DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['isi_pesan'] : $result = "No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if (isset($row2['pesan_keluar'])) {
        ($outgoing_id == $row2['pesan_keluar']) ? $you = "Anda: " : $you = "";
    } else {
        $you = "";
    }
    ($row['aktif'] == "tidak") ? $offline = "Tidak Aktif" : $offline = "";
    ($outgoing_id == $row['id_user']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="chat.php?user_id=' . $row['id_user'] . '">
                    <div class="content">
                    <img src="php/images/user.png" alt="">
                    <div class="details">
                        <span>' . $row['username'] . '</span>
                        <p>' . $you . $msg . '</p>
                    </div>
                    </div>
                    <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                </a>';
}