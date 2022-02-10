<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/quangcao.php');
    include_once('../model/baihat.php');
?>
<?php 
    class QuangCaoController{
        public function DuLieuQuangCao(){
            $db = new db();
            $connect = $db->connectDatabase();

            $quangCao = new QuangCao($connect);
            $read = $quangCao->layQuangCao();
            $num = $read->rowCount();

            $num = $read->rowCount();
            $quangCaoArr =[];
            if ($num > 0) {
                
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $quangcaoItem = array(
                        "idQuangCao"=>$idQuangCao,
                        "hinhQuangCaoLon"=>$hinhQuangCaoLon,
                        "hinhQuangCaoNho"=>$hinhQuangCaoNho,
                        "noiDungQuangCao"=>$noiDungQuangCao,
                        "idBaiHat"=>$idBaiHat,
                        "tenBaiHat"=>$tenBaiHat
                    );
                    array_push($quangCaoArr,$quangcaoItem);
                }
            
            }
            return $quangCaoArr;
        }
    }
?>