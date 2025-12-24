<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
          background-image: url(asset/uploads/poster.jpg);
          height: 100vh;
          background-repeat: no-repeat;
          background-size: cover;
          background-position: center;
        }
        .container{
          height:100vh;
          display:flex;
          align-items:center;
          margin: auto;
        }
        form{
          width: 20%;
          margin:auto;
        }
        input{
          width: 70%;
          margin:3px;
          padding:5px;
        }
        .box{
          background-color: white;
          border-radius:5px;
          border: 1px solid black;
          box-sizing: content;
          text-align:center;
        }
    </style>
</head>
<body>
    <main>
      <div class= container>
        <form action="index.php?page_layout=forgetpw" method="post">
          <div class="box">
            <h1>Quên mật khẩu</h1>
            <div>
                <input name="tendangnhap" type="text" placeholder="tên đăng nhập">
            </div>
            <div>
                <input name="matkhau" type="password" placeholder="mật khẩu mới">
            </div>
            <div>
                <input type="submit" value="Xác nhận">
            </div>
            <?php
              include('connect.php'); 
              if(!empty($_POST['tendangnhap']) && !empty($_POST['matkhau'])){
                  $tenDangNhap = $_POST['tendangnhap'];
                  $matKhau = $_POST['matkhau'];

                  $sqlTL = "SELECT * FROM nguoi_dung where tenDangNhap='$tenDangNhap'";
                  $resultM = mysqli_query($conn, $sqlTL);

                  if(mysqli_num_rows($resultM)>0 ){
                      $sql="UPDATE `nguoi_dung` SET `matKhau`='$matKhau' where  `tenDangNhap`='$tenDangNhap'";
                      mysqli_query($conn, $sql);
                      header('location:login.php');
                  }else{
                    echo"<div>Tài khoản của bạn không tồn tại!</div>";
                  }
                }
              else{
                  echo "</br>Vui long nhap day du thong tin</br></br>";
              }
            ?>
          </div>
        </form>
        </div>
        
    </main>
</body>
</html>