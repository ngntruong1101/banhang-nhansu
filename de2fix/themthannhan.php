<?php
require_once 'connect.php';
require_once 'header.php';

if ($_GET) {
    $nhansu_id = $_GET['nhansu_id'];
    $sql = "SELECT thannhan.* FROM nhansu INNER JOIN thannhan ON nhansu.id=thannhan.nhansu_id WHERE nhansu.id=$nhansu_id ";
    $stmt = $pdo->query($sql);
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="nav">
    <a href="index.php"
       class="btn btn-primary me-3">Trang Chủ</a>
    <a href="dsnhansu.php"
       class="btn btn-primary me-3">Danh Sách Nhân Sự</a>
    </td>
</div>
<h5>Thêm thân nhân</h5>
<form action="them.php"
      method="post">
    <label class="form-label">ID</label>
    <input type="text"
           name="id"
           class="form-control">
    <input type="hidden"
           value="<?php echo $nhansu_id ?>"
           name="nhansu_id">
    <label class="form-label">Tên</label>
    <input type="text"
           name="ten"
           class="form-control">

    <label class="form-label">Quan Hệ</label>
    <input type="text"
           name="quanhe"
           class="form-control">

    <label class="form-label">Điện Thoại</label>
    <input type="text"
           name="dienthoai"
           class="form-control">


    <input type="submit"
           value="Thêm"
           class="btn btn-primary mt-3">
</form>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nhân Sự</th>
            <th>Tên</th>
            <th>Quan Hệ</th>
            <th>Điện Thoại</th>
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
                        <?php echo $item['nhansu_id'] ?>
                    </td>
                    <td><?php echo $item['ten'] ?></td>
                    <td>
                        <?php echo $item['quanhe'] ?>
                    </td>
                    <td><?php echo $item['dienthoai'] ?></td>
                </tr>
                <?php
            }
        } ?>
    </tbody>
</table>
<?php require_once 'footer.php' ?>