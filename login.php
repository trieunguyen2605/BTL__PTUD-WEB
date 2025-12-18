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
            background-image: url(5.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
                }
        .container{
            
            display:flex;
            align-items: center; 
            justify-content: center;
            
        }
        .box input{
            margin-bottom: 10px;
            width: 100%;
            padding: 5px 0;
            border-radius: 5px;
            background-color: rgb(244, 247, 213);
            color: black;
            border: 2px solid white;
            
        }
        form {
            text-align: center;
        }
        .warning{
          font-size: 20px;
          color: red;
           text-align: center;
        }
       
    </style>

<body style="background-image: url(5.jpg);background-repeat: no-repeat;background-size: cover;">
        <div class="container" >
            
            <form action="login.php" method="post">
                <h1>Đăng nhập </h1>
                <div class="box">
                <input type="text" name="username" placeholder="Ten dang nhap ">
                </div>
                <div class="box">
                <input type="password" name="password" placeholder="Mat khau  ">
                </div>
                <div class="box">
                <input type="submit" value="Đăng nhập">
                </div>
                <div id="register">
                <a href="register.php">Đăng ký </a>
            </div>
            </form>
            
            <!-- <div id="register">
                <a href="register.php">Đăng ký </a>
            </div> -->
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

  <script>
    const register = document.getElementById("register");

  </script>
</div>
</body>

</html>