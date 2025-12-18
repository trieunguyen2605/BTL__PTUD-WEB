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
    <main>
        <h1>Register</h1>
        <form action="index.php?page_layout=register" method="post">
            <div>
                <p>Tên đăng nhập </p>
                <input name="tendangnhap" type="text">
            </div>
            <div>
                <p>Mật khẩu</p>
                <input name="matkhau" type="text">
            </div>
            <div>
                <p>Vai tro</p>
                <select name = "vaitro">
                    <?php
                    include('connect.php'); // phải có cái này thì mới lấy đc dữ liệu 
                        $sql = "SELECT * FROM `vai_tro`";
                        $result = mysqli_query($conn,$sql);
                        while($vai_Tro = mysqli_fetch_array($result)){
                    ?>
                        <option value = "<?php echo($vai_Tro['id']);?>"><?php echo ($vai_Tro['vaiTro']);?></option>";
                    <?php
                      }
                    ?>
                </select>
            </div>
            <div>
                <input type="submit" value="Them">
            </div>
        </form>
        <?php
            if(!empty($_POST['tendangnhap']) &&
            !empty($_POST['matkhau']) &&
            !empty($_POST['vaitro'])){
                $tenDangNhap = $_POST['tendangnhap'];
                $matKhau = $_POST['matkhau'];
                $vaiTro = $_POST['vaitro'];

                $sql="INSERT INTO `nguoi_dung`(`tenDangNhap`, `matKhau`,`idVaiTro`) VALUES ('$tenDangNhap','$matKhau','$vaiTro')";
                // echo $sql;
                mysqli_query($conn, $sql);
                header('location:login.php');
            }
            else{
                echo "Vui long nhap day du thong tin";
            }
        ?>
    </main>
</body>
</html>