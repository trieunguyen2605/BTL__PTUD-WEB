<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Mới</title>
    <style>
        body{
            margin:10%;
        }
        main{
            
            margin: auto;
        }
        
         form,
        h1 {
            display: flex;
            justify-content: center;

        }

        .row {
            display: flex;
            justify-content: center;
            justify-content: space-around;
            margin: auto;
        }

        input {
            border: 2px solid rgb(110, 126, 19);
            border-radius: 5px;
        }
        .warning{
           
          color: red;
            text-align: center;
        }
    </style>
</head>
<body >
    <?php $id = $_GET['id']?>
    <main>
        <h1>Cập nhật</h1>
        <form action="index.php?page_layout=capnhatdiadanh&id=<?php echo $id ?>" method="post" enctype="multipart/form-data">

            <?php
              include('connect.php');
              $sql="SELECT* from `dia_diem` where id='$id'";
              $result1 = mysqli_query($conn,$sql);
              while($row1 = mysqli_fetch_array($result1)){
            ?>
              <div style=" width:50%;border:2px solid rgb(110, 126, 19); border-radius: 5px;background-color:#fff7e6;">
                  <div class="row">
                      <div>
                          <p>Tên địa điểm: </p>
                          <input value="<?php echo $row1['tenDiaDiem'] ?>" name="tendiadiem" type="text">
                      </div>

                      <div>
                          <p>Nội dung:</p>
                          <textarea   style="border: 2px solid rgb(110, 126, 19);border-radius: 5px;"name="noidung"><?php echo $row1['tenDiaDiem'] ?> </textarea>
                      </div>
                  </div>
                  <div class="row">
                      <div>
                          <p>Ảnh đại diện: </p>
                          <input value="<?php echo $row1['anhDaiDien'] ?>"  type="file" name="fileToUpload" id="fileToUpload">
                      </div>
                  </div>
                  <div class="row">
                      <div>
                          <p>Vùng miền: </p>
                          <select style="border: 2px solid rgb(110, 126, 19);border-radius: 5px;" name="vungmien">
                              <option value="">-- Chọn vùng miền --</option>
                              <?php
                              $sqlQG = "SELECT * FROM vung_mien";
                              $resultVM = mysqli_query($conn, $sqlQG);
                              while($rowVM = mysqli_fetch_array($resultVM)){
                                  echo "<option value='{$rowVM['id']}'>{$rowVM['tenMien']}</option>";
                              }
                          ?>
                          </select>
                      </div>
>>>>>>> d6ea21b0cf1c547208f4a0b1af854590547cf6fd

                      <div>
                          <p>Mùa: </p>
                          <select style="border: 2px solid rgb(110, 126, 19);border-radius: 5px;" name="mua">
                              <option value="">-- Chọn Mùa --</option>
                              <?php
                              $sqlTL = "SELECT * FROM mua_du_lich";
                              $resultM = mysqli_query($conn, $sqlTL);
                              while($rowM = mysqli_fetch_array($resultM)){
                              echo "<option value='{$rowM['id']}'>{$rowM['tenMua']}</option>";
                              }
                          ?>
                          </select>
                      </div>

                      <div>
                          <p>TOP:</p>
                          <input value="<?php echo $row1['laTop'] ?>"  name="latop" type="text">
                      </div>
                  </div>
                  <br>
                  <div class="row" style="margin-bottom: 10px;">
                      <input type="submit" value="Cập nhật ">
                  </div>
              </div>
            <?php } ?>
        </form>

        <?php
                if( !empty($_POST['tendiadiem'])&& 
                    !empty($_POST['noidung']) &&
                    !empty($_POST['vungmien']) &&
                    !empty($_POST['mua']) &&
                    !empty($_POST['latop'])){
                        $tenDiaDiem= $_POST['tendiadiem'];
                        $noiDung= $_POST['noidung'];
                        $vungMien= $_POST['vungmien'];
                        $mua= $_POST['mua'];
                        $laTop= $_POST['latop'];
                #Bắt đầu xử lý thêm ảnh
                // Xử lý ảnh
                
                if (!empty($_FILES['fileToUpload']['name'])) {
                $target_dir = "asset/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
                // Kiểm tra xem file ảnh có hợp lệ không
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File không phải là ảnh.";
                    $uploadOk = 0;
                }
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                    echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                    $uploadOk = 0;
                }
                echo "3";
                }

                #Kết thúc xử lý ảnh
                if($uploadOk == 0){
                    echo "File của bạn chưa được tải lên";
                }
                else{
                    //Code logic cũ để xử lý insert DB
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $sql = "UPDATE `dia_diem` SET `tenDiaDiem`='$tenDiaDiem',`noiDung`='$noiDung',`anhDaiDien`='$target_file',`idVungMien`='$vungMien',`idMua`='$mua',`laTop`='$laTop' where id='$id'";
                        // echo $sql;
                        mysqli_query($conn, $sql);

                        echo '<script>window.location.href = "index.php?page_layout=listdiadanh";</script>';
                        
                    }   
                }
            }
                else{
                    // // Không chọn ảnh → giữ ảnh cũ
                    //  $target_file = null;
                    echo "<p class='warning'>Vui lòng nhập đủ thông tin !!</p>";
                    // // echo " Vui lòng nhập  đủ thông tin "; 
                }
        ?>
    </main>
</body>
</html>