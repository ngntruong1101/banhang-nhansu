<?php
require_once 'connect.php';
require_once 'header.php';

if ($_GET) {
    $hovaten = $_GET['hovaten'];
    $sql = "SELECT * FROM nhansu WHERE hovaten LIKE '%$hovaten%'";
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $sql = "SELECT * FROM nhansu";
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="nav">
    <a href="index.php"
       class="btn btn-primary me-3">Trang Chủ</a>

</div>
<form action="">
    <label class="form-label">Tìm Kiếm Nhân Sự</label>
    <input type="text"
           name="hovaten"
           placeholder="Nhập tên"
           class="form-control">
    <input type="submit"
           value="Tìm Kiếm"
           class="btn btn-primary mt-3">
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Phòng Ban</th>
            <th>Trạng Thái</th>
            <th>Trình Độ</th>
            <th>Họ Và Tên</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            <th>Thân Nhân</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($items) {
            foreach ($items as $item) {


                ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td>
                        <?php echo $item['phongban_id'] ?>
                    </td>
                    <td><?php echo $item['trangthai'] ?></td>
                    <td>
                        <?php echo $item['trinhdo_id'] ?>
                    </td>
                    <td><?php echo $item['hovaten'] ?></td>
                    <td>
                        <?php echo $item['dienthoai'] ?>
                    </td>
                    <td><?php echo $item['email'] ?></td>
                    <td>
                        <a href="themthannhan.php?nhansu_id=<?php echo $item['id'] ?>"
                           class="btn btn-primary">Chi Tiết</a>
                    </td>
                </tr>
                <?php
            }
        } ?>
    </tbody>
</table>

<?php require_once 'footer.php' ?>