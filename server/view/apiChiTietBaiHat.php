<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerChiTietBaiHat.php');
?>
<?php 
    class apiChiTietBaiHat{
        public function duLieuNhanDuoc(){
            if(isset($_POST['idBaiHat'])){
                $baiHat=$_POST['idBaiHat'];
            }else
            {
                $baiHat = 7;
            }
            return $baiHat;
        }
    }

    $baiHat = new ChiTietBaiHatController();
    $baiHatArr = $baiHat->chiTietBaiHat();
    echo json_encode($baiHatArr);
?>