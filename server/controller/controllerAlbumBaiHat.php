<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    include_once('../model/album.php');
    include_once('../view/apiAlbumBaiHat.php')
?>
<?php 
    class AlbumBaiHatController{
        public function albumBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $album = new Album($connect);

            $nhanDuoc = new apiAlbumBaiHat();

            $album->idAlbum =$nhanDuoc->duLieuNhanDuoc();
            // tren het len
            $read = $album->albumBaiHat();
            $num = $read->rowCount();
            $albumArr =[];
            if ($num > 0) {
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $albumItem = array(
                        "idBaiHat"=>$idBaiHat,
                        "idAlbum"=>$idAlbum,
                        "idTheLoai"=>$idTheLoai,
                        "idPlaylist"=>$idPlaylist,
                        "tenBaiHat"=>$tenBaiHat,
                        "hinhBaiHat"=>$hinhBaiHat,
                        "caSi"=>$caSi,
                        "linkBaiHat"=>$linkBaiHat,
                        "tenAlbum"=>$tenAlbum,
                        "hinhAlbum"=>$hinhAlbum
                    );
                    array_push($albumArr,$albumItem);
                }
            }
            return $albumArr;
        }
    }
    
?>