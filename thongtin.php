<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin </title>
</head>
<style>
  main{
    margin-top: 100px;
    display:flex;
    justify-content: center;
  }

  .container{
    border-radius:20px;
    width:60%;
    background-color: white;
    box-shadow:0 0 10px #cacacaff;
    display:flex;
    /* justify-content: center; */
  }

  .img{
    display:flex;
    justify-content:center;
    overflow:hidden;
    border-radius:20px;
    box-shadow:0 0 10px #bcbcbcff;
  }

  .img:hover img{
    transform:scale(1.1)
  }
  .trai{
    
    margin: 0 5% 0 10px;
    
  }
  .phai{
    text-align: justify;
  }
  .img img{
    width:380px;
    height:380px;
    border-radius:20px;
  }
</style>
<body style="background-color:#E6F9FB;">
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
        <div class="trai">
            <div class="img" style="margin-top: 10px">
              <img class="nd__img" src="<?php echo $row['anhDaiDien']; ?>" alt="">
            </div>
        
            <h1 class="nd__title" style="text-align:center;"><?php echo $row['tenDiaDiem']; ?></h1>
        </div>
        <div class="phai">
            <div class="nd__content" style="margin: 10px 10px 0 0; ">
                <?php echo $row['noiDung']; ?>
            </div>
        </div>
      </div>
    </main>

  <?php } ?>
</body>
</html>