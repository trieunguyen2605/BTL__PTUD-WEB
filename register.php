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
          height:100vh;
          display:flex;
          align-items:center;
         margin: auto;
          
        }
        form{
          width: 20%;
          /* height:50%; */
          margin:auto;
           /* border-radius:5px;
          border: 1px sollid black; */
      
         
         

        }
        input{
          width: 70%;
          margin:3px;
          padding:5px;
        
        }
        .box{
          border-radius:5px;
          border: 1px solid black;
          box-sizing: content;
          background-color:white;
          opacity:0.5 ;
          
         text-align:center;
        }
       
    </style>
</head>
<body>
    <main>
      <div class= container>
        
        <form action="index.php?page_layout=register" method="post">
          <div class="box">
          <h1>Register</h1>
            <div>
                
                <input name="tendangnhap" type="text" placeholder="tên đăng nhập">
            </div>
            <div>
                
                <input name="matkhau" type="password" placeholder="mật khẩu">
            </div>
            <div>
              <br>
                Vai tro
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
                <input type="submit" value="Đăng Ký ">
            </div>
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
                echo "</br>Vui long nhap day du thong tin</br></br>";
            }
        ?>
        </div>
        </form>
        </div>
        
    </main>
</body>
</html>