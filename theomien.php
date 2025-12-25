<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="asset/css/theomien.css">
</head>
<body style="background-color: #EAF8FB;">
  <div class="container">
    <div class="places">
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMien FROM `vung_mien` m where id=1";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Miền <?php echo $row1['tenMien']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idVungMien=1";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) !== 0 ){
              while($row = mysqli_fetch_array($result)){
          ?>
            <div class="pl__item" onclick="openInfo(<?php echo $row['id']; ?>)">
              <div class="pl__img">
                <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
              </div>
              <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
            </div>
          <?php
              }
            }else{
              echo '<div class="no-place">Chưa có địa điểm!</div>';
            }
          ?>
          <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
        </div>
      </section>
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMien FROM `vung_mien` m where id=2";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Miền <?php echo $row1['tenMien']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idVungMien=2";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) !== 0 ){
              while($row = mysqli_fetch_array($result)){
          ?>
            <div class="pl__item" onclick="openInfo(<?php echo $row['id']; ?>)">
              <div class="pl__img">
                <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
              </div>
              <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
            </div>
          <?php
              }
            }else{
              echo '<div class="no-place">Chưa có địa điểm!</div>';
            }
          ?>
          <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
        </div>
      </section>
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMien FROM `vung_mien` m where id=3";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Miền <?php echo $row1['tenMien']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idVungMien=3";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) !== 0 ){
              while($row = mysqli_fetch_array($result)){
          ?>
            <div class="pl__item" onclick="openInfo(<?php echo $row['id']; ?>)">
              <div class="pl__img">
                <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
              </div>
              <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
            </div>
          <?php
              }
            }else{
              echo '<div class="no-place">Chưa có địa điểm!</div>';
            }
          ?>
          <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>