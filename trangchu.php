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
<body style="background-color: #EAF8FB;">
  
  <div class="container">
    <div class="info-short">
      <div class="info_value">
        <div class="short-content">Khám phá Việt Nam cùng</div>
        <div class="short-content">GO VIỆT</div>
      </div>
      <div class="info-short__img">
        <img src="asset/uploads/gioithieuchung.png" alt="">
      </div>
    </div>
    
    <div class="places">
        <!-- TOP -->
          <section>
            <h2 class="title"> Địa điểm hot </h2>
            <div class="section__hd">
              <div class="content"> Sống để yêu thương </div>
              <div class="section__hd-right">
                <a class="section_right-link" href="index.php?page_layout=diadiemhot">Xem tất cả <i class="fa-solid fa-right-long"></i> </a>
              </div>
            </div>
            <div class="hotPlace__list ">
              <!-- sản phẩm  -->
              <?php
                  $sql = "SELECT * FROM `dia_diem` where laTop=1 limit 3";
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
              <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
            </div>
          </section>

          <!-- seasons -->
          <section>
            <h2 class="title"> Du lịch mùa  </h2>
            <div class="section__hd">
              <div class="content"> Sống để yêu thương </div>
              <div class="section__hd-right">
                <a class="section_right-link" href="index.php?page_layout=theomua">Xem tất cả <i class="fa-solid fa-right-long"></i></a>
              </div>
            </div>
            <div class="hotPlace__list ">
              <!-- sản phẩm  -->
              <!-- ở đây là trang chủ chỉ lấy ra 3 cái  -->
              <?php
                $sql = "(SELECT * FROM dia_diem WHERE idMua = 1 order by rand() LIMIT 1)
                        UNION
                        (SELECT * FROM dia_diem WHERE idMua = 3  order by rand() LIMIT 1)
                        UNION
                        (SELECT * FROM dia_diem WHERE idMua = 4 order by rand() LIMIT 1)";
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
              <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
            </div>
          </section>
          
          <!-- regions: miền  -->
          <section>
            <h2 class="title"> Du lịch miền   </h2>
            <div class="section__hd">
              <div class="content"> Sống để yêu thương </div>
              <div class="section__hd-right">
                <a class="section_right-link" href="index.php?page_layout=theomien">Xem tất cả <i class="fa-solid fa-right-long"></i> </a>
              </div>
            </div>
            <div class="hotPlace__list ">
              <!-- sản phẩm  -->
              <?php
                // $sql = "SELECT * FROM `dia_diem` where idVungMien IN (1,2,3) limit 3";
                $sql = "(SELECT * FROM dia_diem WHERE idVungMien = 1 ORDER BY RAND() LIMIT 1)
                        UNION
                        (SELECT * FROM dia_diem WHERE idVungMien = 2 ORDER BY RAND() LIMIT 1)
                        UNION
                        (SELECT * FROM dia_diem WHERE idVungMien = 3 ORDER BY RAND() LIMIT 1)";
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
              <div class='no-search' style='display: none;font-size: 20px; color: red;'> không có địa điểm bạn tìm kiếm!</div>
            </div>
          </section>
    
     </div>
  </div>
  <footer class="footer">
    <div class="ft_container">
      <div class="ft_lienhe">
        <h3>Công ty lữ hành Go Việt</h3>
        <p>18 Phố Viên, Phường Đức Thắng,<br>Bắc Từ Liêm, TP. Hà Nội, Việt Nam</p>
        <p>(+84 28) 3855 8888</p>
        <p>(+84 28) 3886 9155</p>
        <p>Email: info@goviettravel.com</p>
      </div>
      <div class="ft_thongtin">
        <h3>Thông tin</h3>
        <ul>
          <li><a href="#">Trang chủ</a></li>
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Các địa điểm HOT</a></li>
          <li><a href="#">Du lịch theo miền</a></li>
          <li><a href="#">Du lịch theo mùa</a></li>
        </ul>
      </div>
      <div class="ft_chungnhan">
        <h3>Chứng nhận</h3>
        <img src="asset/uploads/footer-2.png" alt="">
        <img src="asset/uploads/DMCA.png" alt="">
      </div>
      <div class="ft_ketnoi">
        <h3 style="margin-top:0%;">Kết nối với chúng tôi</h3>
        <p>
          Để lại Email hoặc số điện thoại để
          chúng tôi có thể tư vấn giúp bạn
        </p>
        <form class="contact-form">
          <input
            type="text"
            placeholder="Email hoặc Số điện thoại"
            required
          />
          <button type="submit">Gửi</button>
        </form>
      </div>
    </div>
  </footer>

  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>