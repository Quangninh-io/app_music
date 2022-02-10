<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    include_once('../view/apiTiepTheo.php')
    
?>
<?php 
    class ChiTietBaiHatController{
        public function chiTietBaiHat(){
            $db = new db();
            $connect = $db->connectDatabase();

            $baiHat = new BaiHat($connect);

            $nhanDuoc = new apiChiTietBaiHat();
            $idBH = $nhanDuoc->duLieuNhanDuoc();
            
            $maxBaiHat = new BaiHatToanBoController();
            $maxArr = $maxBaiHat->DuLieuBaiHatToanBo();
            $max = $maxArr["idBaiHat"];

            $minBaiHat = new BaiHatToanBoControllerMin();
            $minArr = $minBaiHat->DuLieuBaiHatToanBo();
            $min = $minArr["idBaiHat"];

            if($idBH>$max){
                $idBH=$min;
            }else if($idBH<$min){
                $idBH = $max;
            }
            
            $baiHat->idBaiHat =$idBH;

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