<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .admin__list{
      display: flex;
    }
  </style>
</head>
<body>
  <h1>trang chu </h1>
  <!-- <a class='btn' href='index.php?page_layout=themdiadanh'>Thêm địa danh</a>"; -->
  <!-- <div class="admin__list">
    <a class='btn' href='index.php?page_layout=listdiadanh'>Danh sách địa điểm </a>
  </div> -->
  <?php
    $sql="SELECT* from `nguoi_dung` where tenDangNhap='{$_SESSION["username"]}'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
      if($row['idVaiTro']==1){
        echo"<div class='admin__list'>
              <a class='btn' href='listdiadanh.php'>Danh sách địa điểm </a>
            </div>";
      }
    }
  ?>

  


</body>
</html>