<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login </title>
</head>
<style>
  body{
    height: 100vh;
    background-position: center;
  }
  .container{
    margin:  auto;
    width: 20%;
    height:auto ;
    background-color: rgba(255, 255, 255, 0.85);
    /* background-color: rgba(198, 196, 196, 0.392); */
    display:flex;
    align-items: center; 
    justify-content: center;
    border-radius: 10px;
  }
  .box{
    display: flex;
    justify-content: center;
  }
  .box input{
    width: 100%;
    padding: 10px;
    margin-bottom: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 14px;
  }

  form {
    text-align: center;
  }

  .warning{
    font-size: 14px;
    color: red;
    text-align: center;
  }
</style>
  <?php
    $error="";
    include('connect.php');

    if(isset($_POST['username']) && isset($_POST['password'])){ 
        $tenDangNhap = $_POST['username'];
        $matKhau = $_POST['password'];

        $sql = "select * from nguoi_dung where tenDangNhap = '$tenDangNhap' and matkhau = '$matKhau'";
        $result = mysqli_query($conn,$sql); 
        if (mysqli_num_rows($result) > 0) { 
            session_start();
            $_SESSION["username"] = $tenDangNhap;

            // nếu là tài khoản admin thì vào trang list địa điểm, nếu là khách thì nhảy vào trang chủ luôn 
            while($row = mysqli_fetch_array($result)){
              if($row['idVaiTro'] == 1){
                header('location: index.php?page_layout=listdiadanh'); 
              }else{
                header('location: index.php?page_layout=trangchu'); 
              }
            }
        }
        else{
          $error="Tên đăng nhập hoặc mật khẩu không chính xác!";
        }
    }
  ?>
<body style="background-image: url(asset/uploads/poster.jpg);background-repeat: no-repeat;background-size: cover;">
        <div class="container"  >
            
            <form action="login.php" method="post">
              
                <h1>Đăng nhập </h1>
                <div class="box">
                <input type="text" name="username" placeholder="Ten dang nhap ">
                </div>
                <div class="box">
                <input type="password" name="password" placeholder="Mat khau  ">
                </div>
                <div class="box">
                <input  type="submit" value="Đăng nhập">
                </div>
                <a href="forgetpw.php"> Quên mật khẩu? </a>
                <?php if($error != ""): ?>
                <p class="warning"><?= $error ?></p>
                <?php endif; ?>
                
                <div id="register" style="border-top: 2px solid grey">  
                <p > Bạn chưa có tài khoản?</p>
                <a href="register.php"> Đăng ký </a> 
                </div>
            </form>
        </div>
</div>
</body>
</html>