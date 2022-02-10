<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    include_once('../view/apiTimKiemBaiHat.php')
?>
<?php 
    class TimKiemBaiHatController{
        public function timKiemBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $baiHat = new BaiHat($connect);

            $nhanDuoc = new apiTimKiemBaiHat();

            $baiHat->tenBaiHat =$nhanDuoc->duLieuNhanDuoc();
            $read = $baiHat->timKiemBaiHat();
            $num = $read->rowCount();
            $baiHatArr =[];
            if ($num > 0) {
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $baiHatItem = array(
                        "idBaiHat"=>$idBaiHat,
                        "idAlbum"=>$idAlbum,
                        "idTheLoai"=>$idTheLoai,
                        "idPlaylist"=>$idPlaylist,
                        "tenBaiHat"=>$tenBaiHat,
                        "hinhBaiHat"=>$hinhBaiHat,
                        "caSi"=>$caSi,
                        "linkBaiHat"=>$linkBaiHat,
                    );
                    array_push($baiHatArr,$baiHatItem);
                }
            }
            return $baiHatArr;
        }
    }
    
?>