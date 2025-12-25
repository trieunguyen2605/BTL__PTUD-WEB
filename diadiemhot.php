<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="asset/css/diadiemhot.css">
</head>
<body style="background-color: #EAF8FB;">
  <div class="container">
    <div class="places">
      <section>
        <h1 class="title"> TOP các địa điểm HOT  </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
            // lấy ra các địa danh có LaTop=1(quy định của mình là : lopTop có hai giá trị 1 và 2 . nếu là 1 thì mới hiện ở mục top địa danh )
            $sql="SELECT * FROM `dia_diem` where laTop=1";
            $result = mysqli_query($conn,$sql);
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
          ?>
          <!-- nếu không tìm thấy sản phẩm thì sẽ hiện ra dòng này  -->
          <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
        </div>
      </section>
    </div>
  </div>
  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>