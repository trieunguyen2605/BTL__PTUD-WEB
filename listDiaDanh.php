<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
          margin-top: 86px;
        }
        table{
            width: 100%;
        }

        .btn{
            color: black;
            border: 1px solid black;
            padding: 0 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1> Danh sách địa danh  </h1>
    <a class="btn" href="index.php?page_layout=themdiadanh">Thêm địa danh</a>
    <table border=1>
        <tr>
            <th>Id</th>
            <th>Tên địa điểm</th>
            <th>Nội dung </th>
            <th>Ảnh đại diện </th>
            <th>TOP</th>
            <th>Tên Mùa</th>
            <th>Tên vùng miền </th>
        </tr>
        <?php
            include('connect.php'); 
            $sql="SELECT dd.*, m.tenMua,vm.tenMien FROM `dia_diem` dd join `vung_mien` vm on dd.idVungMien = vm.id join `mua_du_lich` m on dd.idMua = m.id";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['tenDiaDiem'] ?></td>
            <td><?php echo $row['noiDung'] ?></td>
            <!-- <td><?php echo $row['anhDaiDien'] ?></td> -->

            <td>
              <img src="./asset/uploads/<?php echo basename($row['anhDaiDien']); ?>" width="100">
            </td>

            <td><?php echo $row['laTop'] ?></td>
            <td><?php echo $row['tenMua'] ?></td>
            <td><?php echo $row['tenMien'] ?></td>

            <td>
                <a class="btn" href="index.php?page_layout=capnhatdiadanh&id=<?php echo $row['id'] ?>">Cap nhat</a>
                <a class="btn" href="index.php?page_layout=xoadiadanh&id=<?php echo $row['id'] ?>">Xoa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>