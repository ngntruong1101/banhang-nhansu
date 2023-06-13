<?php
require_once 'connect.php';
var_dump($_POST);
$id = $_POST['id'];
$nhansu_id = $_POST['nhansu_id'];
$ten = $_POST['ten'];
$quanhe = $_POST['quanhe'];
$dienthoai = $_POST['dienthoai'];

$sql = "INSERT INTO thannhan (id,nhansu_id,ten,quanhe,dienthoai) VALUES ('$id','$nhansu_id','$ten', '$quanhe','$dienthoai')";
$stmt = $pdo->prepare($sql);
$rows = $stmt->execute();
if ($rows) {
    header("Location:" . 'themthannhan.php?nhansu_id=' . $nhansu_id);
}
?>