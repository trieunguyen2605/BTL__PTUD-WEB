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
          border-radius:5px;
        }
        .box{
          background-color: white;
          border-radius:5px;
          border: 1px solid white;
          box-sizing: content;
          text-align:center;
        }
        .warning{
          font-size: 14px;
          color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <main>
      <div class= container>
        <form action="index.php?page_layout=forgetpw" method="post">
          <div class="box" style="background-color:rgba(255, 255, 255, 0.92)">
            <h1>Quên mật khẩu</h1>
            <div>
                <input name="tendangnhap" type="text" placeholder="Ten dang nhap">
            </div>
            <div>
                <input name="matkhau" type="password" placeholder="Mat khau moi">
            </div>
             <div>
                <input name="matkhau" type="password" placeholder="Nhap lai mat khau moi">
            </div>
            <div>
                <input style=" background-color: #5a8f29; " type="submit" value="Xác nhận">
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
                      echo "<script>window.location.href='login.php';</script>";
                  }else{
                      echo "<p class='warning'>tài khoản của bạn không tồn tại!</p>";
                  }
                }
              else{
                echo "<p class='warning'>Vui lòng nhập đầy đủ thông tin!</p>";
              }
            ?>
          </div>
        </form>
        </div>
        
    </main>
</body>
</html>