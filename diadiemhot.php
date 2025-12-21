<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
  .container{
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center ;
  }

  .places{
    width: 80%;
  }

  .title{
    margin: 0;
    font-size: 36px;
  }
  .hotPlace__list{ 
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap:wrap;
  }

  .pl__item{
    width: 33.3333%;
  }

  .pl__item:nth-child(2){
    box-sizing: border-box;
    /* margin: 0 5px; */
  }

  .pl__img{
    display: flex;
    justify-content: center;
  }

  .pl__img img{
    width: 100%;
    height: 258px;
    border-radius: 20px;
  }

  .pl__name{
    text-align: center;
  }
</style>
<body>
  <div class="container">
    <div class="places">
      <section>
        <h1 class="title"> TOP các địa điểm HOT  </h1>
        <div class="hotPlace__list ">
          <?php
            include('connect.php'); 
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
        </div>
      </section>
    </div>
  </div>
  <?php include 'asset/modal/modal.php'; ?>
</body>
</html>