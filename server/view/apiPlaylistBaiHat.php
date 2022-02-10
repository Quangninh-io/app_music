<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerPlaylistBaiHat.php');
?>
<?php 
    class apiPlaylistBaiHat{
        public function duLieuNhanDuoc(){
            if(isset($_POST['idPlaylist'])){
                $playlist=$_POST['idPlaylist'];
            }
            return $playlist;
        }
    }

    $playlist = new PlaylistBaiHatController();
    $playlistArr = $playlist->playlistBaiHat();
    echo json_encode($playlistArr);
?>