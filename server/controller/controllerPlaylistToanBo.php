<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/playlist.php');
    include_once('../model/baihat.php');
?>
<?php 
    class PlaylistController{
        public function DuLieuPlaylist(){
            $db = new db();
            $connect = $db->connectDatabase();

            $playlist = new Playlist($connect);
            $read = $playlist->layPlaylistToanBo();
            $num = $read->rowCount();

            $playlistArr =[];
            if ($num > 0) {
                
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $playlistItem = array(
                        "idPlaylist"=>$idPlaylist,
                        "tenPlaylist"=>$tenPlaylist,
                        "hinhNen"=>$hinhNen,
                        "hinhChinh"=>$hinhChinh,
                    );
                    array_push($playlistArr,$playlistItem);
                }
            
            }
            return $playlistArr;
        }
    }
?>