<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin </title>
</head>
<style>
  /* body{
    background-image:<?php
    include('connect.php'); 
    $sql="SELECT *FROM `dia_diem` where id='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
  ?>
    "<?php echo $row['anhDaiDien']; ?>"
  <?php } ?>;
  background-size: cover;
  background-repeat: no-repeat;
  } */
  main{
    margin-top: 100px;
    display:flex;
    justify-content: center;
  }

  .container{
    width:80%;
    background-color: #9cd2f6ff;
    display:flex;
    justify-content: center;
  }

  .img{
    display:flex;
    justify-content:center;
  }
  .trai{
    margin-right: 10px;
  }
  .img img{
    height:380px;
  }
</style>
<body>
  <?php
    $id = $_GET['id'];
  ?>
  <?php
    include('connect.php'); 
    $sql="SELECT *FROM `dia_diem` where id='$id'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
  ?>
    <main>
      <div class="container">
        <div class=trai>
            <div class="img">
              <img class="nd__img" src="<?php echo $row['anhDaiDien']; ?>" alt="">
            </div>
        
            <h1 class="nd__title" style="text-align:center;"><?php echo $row['tenDiaDiem']; ?></h1>
        </div>
        <div class=phai>
            <div class="nd__content">
                <?php echo $row['noiDung']; ?>
            </div>
        </div>
      </div>
    </main>

  <?php } ?>
</body>
</html>