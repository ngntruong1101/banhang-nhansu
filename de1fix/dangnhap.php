<?php
require_once 'header.php';
if (isset($_SESSION['dangnhap'])) {
    if ($_SESSION['dangnhap'] == 1) {
        header("Location:" . 'index.php');
    }
}

?>
<form action="kiemtra.php"
      method="post">
       <label class="form-label">Username</label>
       <input type="text"
              name="username"
              class="form-control">
       <label class="form-label">Password</label>
       <input type="password"
              name="matkhau"
              class="form-control">
       <input type="submit"
              value="Đăng nhập"
              class="btn btn-primary mt-3">
</form>

<?php require_once 'footer.php' ?>