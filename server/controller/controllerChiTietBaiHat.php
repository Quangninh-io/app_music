<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    include_once('../view/apiChiTietBaiHat.php');
    include_once('../view/apiTiepTheo.php');
    include_once('controllerBaiHatToanBo.php');
    
?>
<?php 
    class ChiTietBaiHatController{
        public function chiTietBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $baiHat = new BaiHat($connect);
            $nhanDuoc = new apiChiTietBaiHat();
            
            $baiHat->idBaiHat =$nhanDuoc->duLieuNhanDuoc();

            $read = $baiHat->chiTietBaiHat();
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