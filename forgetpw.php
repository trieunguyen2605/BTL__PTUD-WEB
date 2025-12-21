
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <style>
        main{
          width: 50%;
          margin: auto;
        }
        </style>
</head>
<body>
    <?php
include('connect.php');

if (!isset($_GET['id'])) {
    die('Thiếu id người dùng');
}

// $id = $_GET['id'];
$id = isset($_GET['id']) ? $_GET['id'] : '';

?>
 
    <main>
        
        <form action="index.php?page_layout=forgetpw&id=<?php echo $id ?>" method="post">
                <h1>Cập nhật mật khẩu </h1>
                // <div class="box">
                // <input type="text" name="username" placeholder="Ten dang nhap ">
                // </div>
                <div class="box">
                <input type="password" name="password" placeholder="Mat khau moi ">
                </div>
                <div class="box">
                <input  type="submit" value="Quên mật khẩu ">
                </div>
                
        </form>
        <?php
            if(
                // !empty($_POST['username'])&&
            !empty($_POST['password']) 
            ){
                // $tenDangNhap = $_POST['username'];
                $matKhau = $_POST['password'];
                
                $sql="UPDATE `nguoi_dung` SET `matKhau`='$matKhau' WHERE id = '$id'";
                // echo $sql;
                mysqli_query($conn, $sql);
                header('location: index.php?page_layout=login.php');
                
            }
            else{
                echo "Vui long nhap day du thong tin";
            }
        ?>
    </main>
</body>
</html>
