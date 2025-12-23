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
  } */
  main{
    margin-top: 100px;
    display:flex;
    justify-content: center;
  }

  .container{
    width:80%;
  }

  .img{
    display:flex;
    justify-content:center;
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
        <div class="img">
          <img class="nd__img" src="<?php echo $row['anhDaiDien']; ?>" alt="">
        </div>
        <h1 class="nd__title" style="text-align:center;"><?php echo $row['tenDiaDiem']; ?></h1>
        <div class="nd__content">
            <?php echo $row['noiDung']; ?>
        </div>
      </div>
    </main>

  <?php } ?>
</body>
</html>