<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim Mới</title>
    <style>
        body{
            background-color: #EAF8FB;
            margin:10%;
        }
        main{
            width: 50%;
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
            border: 2px solid rgba(19, 126, 124, 1);
            border-radius: 5px;
        }
        .warning{
           
          color: red;
            text-align: center;
        }
    </style>
</head>
<body >
    <h1>Thêm địa danh Mới</h1>
    <form action="index.php?page_layout=themdiadanh" method="post" enctype="multipart/form-data">
            <div style=" width:660px;border:2px solid rgba(10, 137, 135, 1); border-radius: 5px;background-color:rgba(249, 248, 243, 1);">
                <div class="row">
                    <div>
                        <p>Tên địa điểm: </p>
                        <input name="tendiadiem" type="text">
                    </div>

                    <div>
                        <p>Nội dung:</p>
                        <textarea style="border: 2px solid rgba(19, 126, 124, 1);border-radius: 5px;"
                            name="noidung"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <p>Ảnh đại diện: </p>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                    </div>
                </div>
                <div class="row">
                    <div>
                        <p>Vùng miền: </p>
                        <select style="border: 2px solid rgba(19, 126, 124, 1);border-radius: 5px;" name="vungmien">
                            <option value="">-- Chọn vùng miền --</option>
                            <?php
                            include('connect.php'); 
                            $sqlQG = "SELECT * FROM vung_mien";
                            $resultVM = mysqli_query($conn, $sqlQG);
                            while($rowVM = mysqli_fetch_array($resultVM)){
                                echo "<option value='{$rowVM['id']}'>{$rowVM['tenMien']}</option>";
                            }
                        ?>
                        </select>
                    </div>

                    <div>
                        <p>Mùa: </p>
                        <select style="border: 2px solid rgba(19, 126, 124, 1);border-radius: 5px;" name="mua">
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
                        <input name="latop" type="text">
                    </div>
                </div>
                <br>
                <div class="row" style="margin-bottom: 10px;">
                    <input type="submit" value="Thêm địa danh ">
                </div>
            </div>
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
                $target_dir = "asset/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        
                // Kiểm tra xem file ảnh có hợp lệ không
                if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        echo "File không phải là ảnh.";
                        $uploadOk = 0;
                    }
                }
        
                // Kiểm tra nếu file đã tồn tại
                if (file_exists($target_file)) {
                    echo "File này đã tồn tại trên hệ thông";
                    $uploadOk = 2;
                }
        
                // Kiểm tra kích thước file
                if ($_FILES["fileToUpload"]["size"] > 500000) {
                    echo "File quá lớn";
                    $uploadOk = 0;
                }
        
                // Cho phép các định dạng file ảnh nhất định
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Chỉ những file JPG, JPEG, PNG & GIF mới được chấp nhận.";
                    $uploadOk = 0;
                }
                echo "3";

                #Kết thúc xử lý ảnh
                if($uploadOk == 0){
                    echo "File của bạn chưa được tải lên";
                }
                else{
                    //Code logic cũ để xử lý insert DB
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $sql = "INSERT INTO `dia_diem`
                            (`tenDiaDiem`, `noiDung`, `anhDaiDien`, `idVungMien`, `idMua`,`laTop`) 
                            VALUES 
                            ('$tenDiaDiem', '$noiDung', '$target_file', '$vungMien', '$mua', '$laTop')";
                        // echo $sql;
                        mysqli_query($conn, $sql);

                        echo '<script>window.location.href = "index.php?page_layout=listdiadanh";</script>';
                        
                    }   
                }
                }
                else{
                    echo "<p class='warning'>Vui lòng nhập đủ thông tin !!</p>";
                    // echo " Vui lòng nhập  đủ thông tin "; 
                }
        ?>
    </main>
</body>
</html>