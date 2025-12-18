<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login </title>
</head>
<body>
    <form action="login.php" method="post"> 
      <h1>đăng nhập </h1>
      <div class="">
        <input type="text" name="username" placeholder="tên đăng nhập ">
      </div>
      <div class="">
        <input type="password" name="password" placeholder="mật khẩu  ">
      </div>
      <div class="">
        <input type="submit" value="đăng nhập"> 
      </div>
    </form>

    <?php
      include('connect.php');

      if(isset($_POST['username']) && isset($_POST['password'])){ 
          $tenDangNhap = $_POST['username'];
          $matKhau = $_POST['password'];

          $sql = "select * from nguoi_dung where tenDangNhap = '$tenDangNhap' and matkhau = '$matKhau'";
          $result = mysqli_query($conn,$sql); // $conn là ở bên trong connect.php 
          if (mysqli_num_rows($result) > 0) { // kiểm tra số dòng sql trả ra 
              session_start();
              $_SESSION["username"] = $tenDangNhap;// lưu để các trang khác có thể dùng 
              header('location: index.php'); // chuyển đến tranh trangchu.php
          }
          else{
              echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
          }
      }
    ?>
</body>
</html>