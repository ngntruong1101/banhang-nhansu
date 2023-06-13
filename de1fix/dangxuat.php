<?php
session_start();
$_SESSION['dangnhap'] = 0;
session_destroy();
header("Location:" . 'dangnhap.php');
?>