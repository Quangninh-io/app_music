<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerAlbumBaiHat.php');
?>
<?php 
    class apiAlbumBaiHat{
        public function duLieuNhanDuoc(){
            if(isset($_POST['idAlbum'])){
                $album=$_POST['idAlbum'];
            }
            $album = 1;
            return $album;
        }
    }

    $album = new AlbumBaiHatController();
    $albumArr = $album->albumBaiHat();
    echo json_encode($albumArr);
?>