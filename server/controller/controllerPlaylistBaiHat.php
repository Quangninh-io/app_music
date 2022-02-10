<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/playlist.php');
    include_once('../model/baihat.php');
    include_once('../view/apiPlaylistBaiHat.php')
?>
<?php 
    class PlaylistBaiHatController{
        public function playlistBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $playlist = new Playlist($connect);

            $nhanDuoc = new apiPlaylistBaiHat();

            $playlist->idPlaylist =$nhanDuoc->duLieuNhanDuoc();
            $read = $playlist->playListBaiHat();
            $num = $read->rowCount();
            $playlistArr =[];
            if ($num > 0) {
                $playlistArr =[];
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $playlistItem = array(
                        "idBaiHat"=>$idBaiHat,
                        "idAlbum"=>$idAlbum,
                        "idTheLoai"=>$idTheLoai,
                        "idPlaylist"=>$idPlaylist,
                        "tenBaiHat"=>$tenBaiHat,
                        "hinhBaiHat"=>$hinhBaiHat,
                        "caSi"=>$caSi,
                        "linkBaiHat"=>$linkBaiHat,
                        "tenPlaylist"=>$tenPlaylist,
                        "hinhChinh"=>$hinhChinh
                    );
                    array_push($playlistArr,$playlistItem);
                }
            }
            return $playlistArr;
        }
    }
    
?>