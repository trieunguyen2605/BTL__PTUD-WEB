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
    <div id="register">
      <a href="register.php">Đăng ký </a>
    </div>

    <?php
      include('connect.php');

      if(isset($_POST['username']) && isset($_POST['password'])){ 
          $tenDangNhap = $_POST['username'];
          $matKhau = $_POST['password'];

          $sql = "select * from nguoi_dung where tenDangNhap = '$tenDangNhap' and matkhau = '$matKhau'";
          $result = mysqli_query($conn,$sql); 
          if (mysqli_num_rows($result) > 0) { 
              session_start();
              $_SESSION["username"] = $tenDangNhap;
              header('location: index.php?page_layout=trangchu'); 
          }
          else{
              echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
          }
      }
    ?>

    <script >
      const register = document.getElementById("register");
      
    </script>
</body>
</html>