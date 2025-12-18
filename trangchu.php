<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>trang chu </h1>
  <?php
    // if($_SESSION["username"]=='admin'){
    //   echo"<a class='btn' href='index.php?page_layout=themdiadang'>Thêm địa danh</a>";
    // }
    $sql="SELECT* from `nguoi_dung` where tenDangNhap='{$_SESSION["username"]}'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
      if($row['idVaiTro']==1){
        echo"<a class='btn' href='index.php?page_layout=themdiadanh'>Thêm địa danh</a>";
      }
    }
  ?>
</body>
</html>