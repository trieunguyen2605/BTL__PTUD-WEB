<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login </title>
</head>
<style>
        main{
           
            height: 100vh;
            
            background-position: center;
                }
        .container{
            
            
            /* margin: auto; */
            /* width: 20%; */
            /* height:auto ; */
           /* background-color: rgba(255, 255, 255, 0.85); */
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
            margin: 0 10px 0 10px;
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
<!-- <?php
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
              header('location: index.php?page_layout=trangchu'); 
          }
          else{
            $error="Tên đăng nhập hoặc mật khẩu không chính xác!";
            //   echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
          }
      }
    ?> -->
<body >
   <main style="background-image: url(asset/uploads/poster.jpg);background-repeat: no-repeat;background-size: cover;">     
    <div class="container">
            <form action="login.php" method="post">
              <div style="border-radius:10px;border: 1px solid white; box-sizing: content;
              background-color:rgba(255, 255, 255, 0.88);;text-align:center;margin:150px 10px 0 10px ">
              <div style="box-sizing: content;text-align:center;margin:0 10px 5px 10px ;">
                <h1>Đăng nhập </h1>
                <div class="box">
                <input type="text" name="username" placeholder="Ten dang nhap ">
                </div>
                <div class="box">
                <input type="password" name="password" placeholder="Mat khau  ">
                </div>
                <div class="box" >
                <input style=" background-color: #5a8f29; " type="submit" value="Đăng nhập">
                </div>
                <a style="text-decoration: none;" href="forgetpw.php"> Quên mật khẩu? </a>
                <!-- <?php if($error != ""): ?>
                <p class="warning"><?= $error ?></p>
                <?php endif; ?> -->
                
                <div id="register" style="border-top: 2px solid grey">  
                <p > Bạn chưa có tài khoản?</p>
                <a style="font-size:18px;text-decoration: none;" href="register.php"> Đăng ký </a> 
                </div>
                </div> 
                </div> 
            </form>
            
            <!-- <div id="register">
                <a href="register.php">Đăng ký </a>
            </div> -->
        </div>
      
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
              header('location: index.php?page_layout=trangchu'); 
          }
          else{
            $error="Tên đăng nhập hoặc mật khẩu không chính xác!";
              // echo "<p class='warning'>Tên đăng nhập hoặc mật khẩu không chính xác!</p>";
          }
      }
    ?>

  <script>
    const register = document.getElementById("register");
    
  </script>
</div>
    </main>
</body>

</html>