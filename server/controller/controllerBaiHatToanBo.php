<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/baihat.php');
    
?>
<?php 
    class BaiHatToanBoController{
        public function DuLieuBaiHatToanBo(){
            $db = new db();
            $connect = $db->connectDatabase();

            $baiHat = new BaiHat($connect);
            $read = $baiHat->layBaiHatToanBo();
            $num = $read->rowCount();

            $baiHatArr =[];
            if ($num > 0) {
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $baiHatItem = array(
                        "idBaiHat"=>$idBaiHat,
                    );
                    array_push($baiHatArr,$baiHatItem);
                }
            }
            return $baiHatItem;
        }
    }

    class BaiHatToanBoControllerMin{
        public function DuLieuBaiHatToanBo(){
            $db = new db();
            $connect = $db->connectDatabase();

            $baiHat = new BaiHat($connect);
            $read = $baiHat->layBaiHatToanBo();
            $num = $read->rowCount();

            $baiHatArr =[];
            if ($num > 0) {
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $baiHatItem = array(
                        "idBaiHat"=>$idBaiHat,
                    );
                    array_push($baiHatArr,$baiHatItem);
                    break;
                }
            }
            return $baiHatItem;
        }
    }
?>