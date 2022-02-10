<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerTimKiemBaiHat.php');
?>
<?php 
    class apiTimKiemBaiHat{
        public function duLieuNhanDuoc(){
            if(isset($_POST['tenBaiHat'])){
                $baiHat=$_POST['tenBaiHat'];
            }
            return $baiHat;
        }
    }

    $baiHat = new TimKiemBaiHatController();
    $baiHatArr = $baiHat->timKiemBaiHat();
    echo json_encode($baiHatArr);
?>