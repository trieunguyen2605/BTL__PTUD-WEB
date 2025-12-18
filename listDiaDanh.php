<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
            <th> vùng miền</th>
            <th>Mùa</th>
            <th>Tên địa điểm </th>
            <th>Nội dung </th>
            <th>Ảnh đại diện </th>
            <th>TOP</th>
        </tr>
        <?php
            $sql="SELECT p.*, qg.tenQuocGia,tl.tenTheLoai FROM `dia_diem` d join `quoc_gia` qg on p.quoc_gia_id = qg.id join `the_loai` tl on p.the_loai_id = tl.id";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($result)){
        ?>
        <tr>
            <td><?php echo $row['id'] ?></td>
            <td><?php echo $row['ma_phim'] ?></td>
            <td><?php echo $row['thoi_luong'] ?></td>
            <td><?php echo $row['nam'] ?></td>
            <td><?php echo $row['tuoi'] ?></td>
            <td><?php echo $row['dao_dien'] ?></td>
            <td><?php echo $row['link_phim'] ?></td>
            <td><?php echo $row['trailer'] ?></td>

            <td>
              <img src="./uploads/<?php echo basename($row['poster']); ?>" width="100">
            </td>

            <td><?php echo $row['noi_dung'] ?></td>
            <td><?php echo $row['mo_ta'] ?></td>
            <td><?php echo $row['ten_phim'] ?></td>
            <td><?php echo $row['tenQuocGia'] ?></td>
            <td><?php echo $row['tenTheLoai'] ?></td>
            <td>
                <a class="btn" href="index.php?page_layout=capnhatphim&id=<?php echo $row['id'] ?>">Cap nhat</a>
                <a class="btn" href="index.php?page_layout=xoaphim&id=<?php echo $row['id'] ?>">Xoa</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>