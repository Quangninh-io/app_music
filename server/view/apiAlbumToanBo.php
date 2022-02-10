<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerAlbumToanBo.php');
?>
<?php 
    $album = new AlbumController();
    $albumArr = $album->DuLieuAlbum();

    echo json_encode($albumArr);
?>