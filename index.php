<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BTL_PTUD-WEB</title>
  <link rel="stylesheet" href="asset/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <?php
      session_start();
      if(!isset($_SESSION["username"])){
          header('location: login.php');
      }
      include('connect.php'); 
    ?> 

<header>
  <div class="hd__wrap">
        <div class="hd__top">
          <div class="hd__top-wr">
            <div>Have a good day!</div>
            <div class="hd__info">
              Thông tin liên hệ: 0394759392
            </div>
          </div>
        </div>
        <div class="hd__bottom">
          <div class="hd__bottom-wr">
              <div class="hd__logo">
                <a href="index.php?page_layout=trangchu">
                  <img src="asset/uploads/logo.png" alt="Logo">
                </a>
              </div>
              <ul class="hd__bottom-list">
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=trangchu">Trang chủ</a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=gioithieu">Giới thiệu </a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=diadiemhot">Các địa điểm HOT</a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=theomien">Du lịch theo miền </a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=theomua">Du lịch theo mùa </a>
                  </li>
              </ul>
              <ul>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" href="index.php?page_layout=dangxuat">Đăng xuất </a>
                    <!-- <a class="hd__bottom-link" href="index.php?page_layout=register">register </a> -->
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
                  </li>
              </ul>
            </div>
        </div>
      </div>  
    </header >

    <?php
      if (isset($_GET['page_layout']) && (($_GET['page_layout'] == 'trangchu') || ($_GET['page_layout'] == 'diadiemhot')||($_GET['page_layout'] == 'theomua')||($_GET['page_layout'] == 'theomien') ) ){
        echo"
          <div class='poster'>
            <div class='hd__search'>
              <input type='text' class='hd__input' placeholder='Tìm kiếm...' >
              <div class='hd__search-logo'>
                <i class='fa-solid fa-magnifying-glass'></i>
              </div>
            </div>
          </div>
        ";
      }
    ?>

    <?php
       if(isset($_GET['page_layout'])){ // lấy thông tin thì ta dùng get 
          switch($_GET['page_layout']){
            case 'trangchu':
              include "trangchu.php"; // gộp hai file lại với nhau 
              break;
            case 'gioithieu':
              include "gioithieu.php";
              break;
            case 'diadiemhot':
              include "diadiemhot.php";
              break;
            case 'theomien':
              include "theomien.php";
              break;
            case 'theomua':
              include "theomua.php";
              break;
            case 'login':
              include "login.php";
              break;
            case 'register':
              include "register.php";
              break;
            case 'dangxuat':
              session_unset();
              session_destroy();
              header ('location:login.php');
              include "dangxuat.php";
              break;
            case 'listdiadanh':
              include "listdiadanh.php";
              break;
            case 'themdiadanh':
              include "themdiadanh.php";
              break;
            case 'capnhatdiadanh':
              include "capnhatdiadanh.php";
              break;
            case 'xoadiadanh':
              include "xoadiadanh.php";
              break;
          }
      }
    ?>


  <script src="script.js"></script>
</body>
</html>