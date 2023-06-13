<?php
require_once 'connect.php';
var_dump($_POST);

$sql = "SELECT * FROM user";
$stmt = $pdo->query($sql);
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

$username = $_POST['username'];
$matkhau = $_POST['matkhau'];

foreach ($items as $item) {
    if ($username == $item['username'] && $matkhau == $item['matkhau']) {
        session_start();
        $_SESSION['dangnhap'] = 1;
        $_SESSION['username'] = $username;
        header("Location:" . 'index.php');
    } else {
        header("Location:" . 'dangnhap.php');
    }
}


?>