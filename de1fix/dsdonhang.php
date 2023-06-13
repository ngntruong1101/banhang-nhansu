<?php 
require_once 'connect.php';
require_once 'header.php';
if (!empty($_POST)) {
    $id = rand(1000, 9999);
    $khachhang_id = $_POST['khachhang_id'];
    $trangthai = $_POST['trangthai'];
    $khuyenmai = $_POST['khuyenmai'];
    $ngayban = date($_POST['ngayban']) ;
    $ngaygiaohang = date($_POST['ngaygiaohang']) ;
    $ghichu = $_POST['ghichu'];
    
    $sql = "INSERT INTO donhang(id, khachhang_id, trangthai, khuyenmai, ngayban, ngaygiaohang, ghichu) VALUES ('$id', '$khachhang_id', '$trangthai', '$khuyenmai', '$ngayban', '$ngaygiaohang', '$ghichu')";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
if (!$_GET) {
    $sql = "SELECT donhang.*, khachhang.hovaten FROM donhang INNER JOIN khachhang ON donhang.khachhang_id = khachhang.id;";
    $stmt = $pdo->query($sql);
    $donhangs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} else {
    $hovaten = $_GET['hovaten'];
    $sql = "SELECT donhang.*, khachhang.hovaten FROM donhang INNER JOIN khachhang ON donhang.khachhang_id = khachhang.id WHERE hovaten LIKE '%$hovaten%'";
    $stmt = $pdo->query($sql);
    $donhangs = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<div>
<content style=" text-align: center; ">
<div class="nav container" style="background-color:#b4c2c4;">
   <ul class="nav " >
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang Chủ</a>
                </li>
                <li class="nav-item">
                    <a href="taomoidonhang.php" class="nav-link">Tạo Mới Đơn Hàng</a>
                </li>                            
            </ul>   
</div>
<form action="">
    <label for="form-label">Tìm kiếm đơn hàng</label>
    <input type="text"
           class="form-control mb-2"
           name="hovaten"
           placeholder="Nhập tên khách hàng">
    <button type="submit"
            class="btn btn-primary">Tìm kiếm</button>
</form>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Khách hàng</th>
                <th scope="col">Trạng thái</th>
                <th scope="col">Khuyến mãi</th>
                <th scope="col">Ngày bán</th>
                <th scope="col">Ngày giao hàng</th>
                <th scope="col">Ghi chú</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if ($donhangs) {
                foreach ($donhangs as $donhang) {
            ?>
            <tr class="">
                <td scope="row"><?php echo $donhang['id'] ?></td>
                <td><?php echo $donhang['hovaten'] ?></td>
                <td><?php echo $donhang['trangthai'] ?></td>
                <td><?php echo $donhang['khuyenmai'] ?></td>
                <td><?php echo $donhang['ngayban'] ?></td>
                <td><?php echo $donhang['ngaygiaohang'] ?></td>
                <td><?php echo $donhang['ghichu'] ?></td>
            </tr>
            <?php 
                }
            }
            ?>
        </tbody>
    </table>

<?php require_once 'footer.php' ?>