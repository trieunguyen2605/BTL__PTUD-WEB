<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BTL_PTUD-WEB</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="asset/css/index.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>

</style>
<body>
  <!-- login -->
    <?php
      include('connect.php'); 
    ?> 
<!-- header -->
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
                    <a class="hd__bottom-link" onclick="onClick()" href="index.php?page_layout=trangchu">Trang chủ</a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" onclick="onClick()" href="index.php?page_layout=gioithieu">Giới thiệu </a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" onclick="onClick()" href="index.php?page_layout=diadiemhot">Các địa điểm HOT</a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" onclick="onClick()" href="index.php?page_layout=theomien">Du lịch theo miền </a>
                  </li>
                  <li class="hd__bottom-item">
                    <a class="hd__bottom-link" onclick="onClick()" href="index.php?page_layout=theomua">Du lịch theo mùa </a>
                  </li>
              </ul>
              <ul>
                  <li class="hd__bottom-item">
                    <?php 
                      session_start();
                      if(isset($_SESSION["username"])){
                    ?>
                      <div class="user">
                        <!--  lấy ra và hiện tên người dùng trên header  -->
                        <?php
                          $sql="SELECT* from `nguoi_dung`where tenDangNhap='{$_SESSION["username"]}'";
                          $result = mysqli_query($conn,$sql);
                          while($row = mysqli_fetch_array($result)){
                            echo "<div class='userName' href=''>Xin chào : {$row['tenNguoiDung']} </div>";
                          }
                        ?>
  
                        <!-- bảng hiện ra: đăng xuất và lits danh sách  -->
                        <div class="cn_user">
                          <ul class="user-list">
                            <li class="user_item">
                              <a class="hd__bottom-link_out" href="index.php?page_layout=dangxuat">Đăng xuất </a>
                            </li>              
                            <!-- nếu là admin thì sẽ hiện mục này   -->
                            <?php
                              $sql="SELECT* from `nguoi_dung` where tenDangNhap='{$_SESSION["username"]}'";
                              $result = mysqli_query($conn,$sql);
                              while($row = mysqli_fetch_array($result)){
                                if($row['idVaiTro']==1){
                                  echo"<li class='user_item'>
                                        <a class='btn' href='index.php?page_layout=listdiadanh'>Danh sách địa điểm </a>
                                      </li>";
                                }
                              }
                            ?> 
                          </ul>
                        </div>
                      </div>

                    <?php }else{ ?>
                      <a class="hd__bottom-link-login" href="index.php?page_layout=login">Đăng nhập  </a>
                    <?php } ?>

                  </li>
              </ul>
            </div>
        </div>
      </div>  
    </header >

    <!--  hiện phần tìm kiếm(có poster) : nếu là trang chủ, địa điểm hot, theo mùa , theo miền thì sẽ hiện ra  -->
    <?php
      if (isset($_GET['page_layout']) && (($_GET['page_layout'] == 'trangchu') || ($_GET['page_layout'] == 'diadiemhot')||($_GET['page_layout'] == 'theomua')||($_GET['page_layout'] == 'theomien') ) ){
        echo"
          <div class='poster'>
            <div class='hd__search'>
              <input type='text' id='searchInput' oninput='search()' class='hd__input' placeholder='Tìm kiếm...' >
              <div class='hd__search-logo'>
                <i class='fa-solid fa-magnifying-glass'></i>
              </div>
            </div>
          </div>
        ";
      }
    ?>

    <?php
       if(isset($_GET['page_layout'])){  
          switch($_GET['page_layout']){
            case 'trangchu':
              include "trangchu.php"; 
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
            case 'forgetpw':
              include "forgetpw.php";
              break;
            case 'nguoidung':
              include "nguoidung.php";
              break;
            case 'thongtin':
              include "thongtin.php";
              break;
          }
      }
    ?>

<script>
    // <!-- phần tìm kiếm  -->
    function search() {
        const input = document.getElementById("searchInput").value.toLowerCase().trim();
        const items = document.getElementsByClassName("pl__item");
        const wrap_item = document.getElementsByClassName("hotPlace__list");
        const no_search = document.getElementsByClassName("no-search");
        let ktra = false;

        for (let i = 0; i < items.length; i++) {
          let name = items[i].getElementsByClassName("pl__name")[0].innerText.toLowerCase();
          if (name.includes(input)|| input === ""  ) {
              items[i].style.display = "block"; 
              ktra = true;
          } else {
              items[i].style.display = "none";
          }
          
        }

        for (let i = 0; i < no_search.length; i++) {
            if (ktra === false && input !== "") {
                no_search[i].style.display = "block";
            } else {
                no_search[i].style.display = "none";
            }
        }
    }
    
</script>
</body>
</html>