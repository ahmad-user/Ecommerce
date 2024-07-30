<?php
session_start();
// session_unset();
session_destroy();

// var_dump($_SESSION['id_user']);
// die;

echo  "<script>alert('Berhasil Logout');</script>";
echo  "<script>window.location='index.php';</script>";
