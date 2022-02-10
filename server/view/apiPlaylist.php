<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerPlaylist.php');
?>
<?php 
    $playlist = new PlaylistController();
    $playlitsArr = $playlist->DuLieuPlaylist();

    echo json_encode($playlitsArr);
?>