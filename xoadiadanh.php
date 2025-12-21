<<<<<<< HEAD
<h1>Xóa</h1>
<?php 
    
?>
=======
<h1>Xoa</h1>
<?php
    $id = $_GET['id'];
    $sql="DELETE FROM `dia_diem` WHERE id = '$id'";
    mysqli_query($conn, $sql);
    header('location: index.php?page_layout=listdiadanh');
?>
>>>>>>> 19357c937f4617b7eb1931a09f9b8a6a72876034
