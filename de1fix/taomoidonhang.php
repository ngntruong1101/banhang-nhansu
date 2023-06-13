<?php 
require_once 'connect.php';
require 'header.php';
$sql = "SELECT * FROM khachhang";
$stmt = $pdo->query($sql);
$khachhangs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<form action="dsdonhang.php"
      method="post">
    <select name="khachhang_id"
            class="form-control mb-2">
        <?php 
                if ($khachhangs) {
                    foreach ($khachhangs as $khachhang) {
            ?>
        <option value="<?php echo $khachhang['id'] ?>"><?php echo $khachhang['hovaten'] ?></option>
        <?php 
                    }
                }
        ?>
    </select>
    <input type="number"
           name="trangthai"
           class="form-control mb-2"
           placeholder="Trạng thái">
    <input type="number"
           name="khuyenmai"
           class="form-control mb-2"
           placeholder="Khuyễn mãi">
    <label class="form-label">Ngày bán</label>
    <input type="datetime-local"
           name="ngayban"
           class="form-control mb-2">
    <label class="form-label">Ngày giao hàng</label>
    <input type="datetime-local"
           name="ngaygiaohang"
           class="form-control mb-2">
    <input type="text"
           name="ghichu"
           class="form-control mb-2"
           placeholder="Ghi chú">
    <input type="submit"
           value="Thêm"
           class="btn btn-primary">
</form>
<?php require 'footer.php' ?>