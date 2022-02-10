<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/album.php');
    include_once('../model/baihat.php');
?>
<?php 
    class AlbumController{
        public function DuLieuAlbum(){
            $db = new db();
            $connect = $db->connectDatabase();
            $album = new Album($connect);
            $read = $album->layAlbum();
            $num = $read->rowCount();

            $albumArr =[];
            if ($num > 0) {
                
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $albumItem = array(
                        "idAlbum"=>$idAlbum,
                        "tenAlbum"=>$tenAlbum,
                        "tenCaSiAlbum"=>$tenCaSiAlbum,
                        "hinhAlbum"=>$hinhAlbum,
                    );
                    array_push($albumArr,$albumItem);
                }
            
            }
            return $albumArr;
        }
    }
?>