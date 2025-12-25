<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (
        !empty($_POST['tendangnhap']) &&
        !empty($_POST['tenTk']) &&
        !empty($_POST['matkhau'])
    ) {

        $tenDangNhap = $_POST['tendangnhap'];
        $tenNguoiDung = $_POST['tenTk'];
        $matKhau = $_POST['matkhau'];

        // MẶC ĐỊNH LÀ NGƯỜI DÙNG
        $idVaiTro = 2;

        $sql = "INSERT INTO nguoi_dung 
                (tenDangNhap, matKhau, idVaiTro, tenNguoiDung) 
                VALUES ('$tenDangNhap', '$matKhau', '$idVaiTro', '$tenNguoiDung')";

        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
        } else {
            $error = "Lỗi SQL: " . mysqli_error($conn);
        }

    } else {
        $error = "Vui lòng nhập đầy đủ thông tin";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
  main{
      height:100vh;
      width: 100%;
      margin: 0,0;
      background-image:url(asset/uploads/poster.jpg);
      background-size: cover;
      background-repeat: no-repeat;
  }
  .container{
    /* height:100vh; */
    display:flex;
    /* align-items:center; */
    margin-top 150px;
  }
  form{
    width: 20%;
    /* height:50%; */
    margin:auto;
  }
  input{
    width: 70%;
    margin:3px;
    padding:5px;
    border-radius:5px;
  
  }
  .box{
    border-radius:5px;
    border: 1px solid white;
    box-sizing: content;
    background-color:rgba(255, 255, 255, 0.92);

    opacity:0.98 ;
    text-align:center;
    margin-top:150px;
    height: 250px;
  }

  
</style>
</head>
<body>
    <main>
      <div class= container>
        
        <form action="index.php?page_layout=register" method="post">
          <div class="box">
          <h1>Đăng ký</h1>
            <div>
                <input name="tendangnhap" type="text" placeholder="Ten dang nhap">
            </div>
            <div>
                <input name="tenTk" type="text" placeholder="Ten tai khoan">
            </div>
            <div>
                <input name="matkhau" type="password" placeholder="Mat khau">
            </div>
            <div>
                <input style=" background-color: #5a8f29; " type="submit" value="Đăng Ký ">
            </div>
            <?php
              if (!empty($error)) {
                  echo "<p style='color:red'>$error</p>";
              }
            ?>
        </div>
        </form>
        </div>
        
    </main>
</body>
</html>