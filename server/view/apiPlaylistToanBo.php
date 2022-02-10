<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerPlaylistToanBo.php');
?>
<?php 
    $playlist = new PlaylistController();
    $playlitsArr = $playlist->DuLieuPlaylist();

    echo json_encode($playlitsArr);
?>