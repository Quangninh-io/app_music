<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerTheLoai.php');
?>
<?php 
    $theLoai = new TheLoaiController();
    $theLoaiArr = $theLoai->DuLieuTheLoai();

    echo json_encode($theLoaiArr);
?>