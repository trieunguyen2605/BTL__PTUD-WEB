<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="asset/css/theomien.css">
</head>
<body>
  <div class="container">
    <div class="places">
      <!--  mùa xuân -->
      <section>
        <!-- lấy ra tên mùa  -->
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMua FROM `mua_du_lich` m where id=1";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Mùa <?php echo $row1['tenMua']?>   </h1>
        <div class="hotPlace__list ">
          <!-- lấy ra các địa điểm theo mùa( ở đây là mùa udMua=1 tức là  mùa xuân ) -->
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idMua=1";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) !== 0 ){
              while($row = mysqli_fetch_array($result)){
          ?>
          <!-- đây là vẽ ra giao diện  -->
            <div class="pl__item" onclick="openInfo(<?php echo $row['id']; ?>)">
              <div class="pl__img">
                <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
              </div>
              <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
            </div>
          <?php
              }
            }else{
              //  nếu chưa thêm sản phẩm thì sẽ hiện chưa có địa điểm!
              echo '<div class="no-place">Chưa có địa điểm!</div>';
            }
          ?>
          <!-- dòng này để khi không tìm thấy sản phẩm ở mục tìm kiếm thì hiệ dòng này ra  -->
          <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
        </div>
      </section>

      <!-- mùa hạ  -->
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMua FROM `mua_du_lich` m where id=2";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Mùa <?php echo $row1['tenMua']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idMua=2";
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

      <!-- mùa thu  -->
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMua FROM `mua_du_lich` m where id=3";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Mùa <?php echo $row1['tenMua']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idMua=3";
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

      <!-- mùa đông  -->
      <section>
        <?php
          include('connect.php'); 
          $sql="SELECT m.tenMua FROM `mua_du_lich` m where id=4";
          $result1 = mysqli_query($conn,$sql);
          $row1 = mysqli_fetch_array($result1);
        ?>
        <h1 class="title"> Mùa <?php echo $row1['tenMua']?>   </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            $sql="SELECT * FROM `dia_diem` where idMua=4";
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
        </div>
      </section>
    </div>
  </div>
  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>