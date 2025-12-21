<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="asset/css/trangchu.css">
  <style>
    .admin__list{
      display: flex;
    }
  </style>
</head>
<body>
  <?php
    $sql="SELECT* from `nguoi_dung` where tenDangNhap='{$_SESSION["username"]}'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
      if($row['idVaiTro']==1){
        echo"<div class='admin__list'>
              <a class='btn' href='index.php?page_layout=listdiadanh'>Danh sách địa điểm </a>
            </div>";
      }
    }
  ?>

  <div class="container">
    <div class="places">
      <section>
        <h2 class="title"> Địa điểm hot </h2>
        <div class="section__hd">
          <div class="content"> Sống để yêu thương </div>
          <div class="section__hd-right">
            <a href="index.php?page_layout=diadiemhot">Xem tất cả <i class="fa-solid fa-right-long"></i> </a>
          </div>
        </div>
        <div class="hotPlace__list ">
          <!-- sản phẩm  -->
          <?php
              $sql = "SELECT * FROM `dia_diem` where laTop=1 limit 3";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){
          ?>
              <div class="pl__item" onclick="openModal(<?php echo $row['id']; ?>)">
                <div class="pl__img">
                  <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
                </div>
                <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
      
                <div id="noidung-<?php echo $row['id'];?>" style="display:none;">
                  <div class="nd__wrap">
                    <img class="nd__img" src="<?php echo $row['anhDaiDien']; ?>" alt="">
                  </div>
                  <h1 class="nd__title" style="text-align:center;"><?php echo $row['tenDiaDiem']; ?></h1>
                  <div class="nd__content">
                      <?php echo $row['noiDung']; ?>
                  </div>
                </div>
              </div>
          <?php
              }
          ?>
        </div>
      </section>

      <section>
        <h2 class="title"> Du lịch mùa  </h2>
        <div class="section__hd">
          <div class="content"> Sống để yêu thương </div>
          <div class="section__hd-right">
            <a href="index.php?page_layout=theomua">Xem tất cả <i class="fa-solid fa-right-long"></i> </a>
          </div>
        </div>
        <div class="hotPlace__list ">
          <!-- sản phẩm  -->
          <?php
              $sql = "SELECT * FROM `dia_diem` where laTop=1 limit 3";
              $result = mysqli_query($conn,$sql);
              while($row = mysqli_fetch_array($result)){
          ?>
              <div class="pl__item" onclick="openModal(<?php echo $row['id']; ?>)">
                <div class="pl__img">
                  <img src="<?php echo $row['anhDaiDien']; ?>" alt="">
                </div>
                <div class="pl__name"><?php echo $row['tenDiaDiem']; ?> </div>
      
                <div id="noidung-<?php echo $row['id'];?>" style="display:none;">
                  <div class="nd__wrap">
                    <img class="nd__img" src="<?php echo $row['anhDaiDien']; ?>" alt="">
                  </div>
                  <h1 class="nd__title" style="text-align:center;"><?php echo $row['tenDiaDiem']; ?></h1>
                  <div class="nd__content">
                      <?php echo $row['noiDung']; ?>
                  </div>
                </div>
              </div>
          <?php
              }
          ?>
        </div>
      </section>
    </div>
  </div>

  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>