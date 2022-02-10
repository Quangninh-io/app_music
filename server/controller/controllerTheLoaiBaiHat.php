<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    include_once('../model/theloai.php');
    include_once('../view/apiTheLoaiBaiHat.php')
?>
<?php 
    class TheLoaiBaiHatController{
        public function theLoaiBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $theLoai = new TheLoai($connect);

            $nhanDuoc = new apiTheLoaiBaiHat();

            $theLoai->idTheLoai =$nhanDuoc->duLieuNhanDuoc();
            $read = $theLoai->theLoaiBaiHat();
            $num = $read->rowCount();
            $theLoaiArr =[];
            if ($num > 0) {
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $theLoaiItem = array(
                        "idBaiHat"=>$idBaiHat,
                        "idAlbum"=>$idAlbum,
                        "idTheLoai"=>$idTheLoai,
                        "idPlaylist"=>$idPlaylist,
                        "tenBaiHat"=>$tenBaiHat,
                        "hinhBaiHat"=>$hinhBaiHat,
                        "caSi"=>$caSi,
                        "linkBaiHat"=>$linkBaiHat,
                        "tenTheLoai"=>$tenTheLoai,
                        "hinhTheLoai"=>$hinhTheLoai
                    );
                    array_push($theLoaiArr,$theLoaiItem);
                }
            }
            return $theLoaiArr;
        }
    }
    
?>