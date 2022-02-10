<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../config/connect.php');
    include_once('../model/theloai.php');
    include_once('../model/baihat.php');
?>
<?php 
    class TheLoaiController{
        public function DuLieuTheLoai(){
            $db = new db();
            $connect = $db->connectDatabase();

            $theLoai = new TheLoai($connect);
            $read = $theLoai->layTheLoai();
            $num = $read->rowCount();

            $theLoaiArr =[];
            if ($num > 0) {
                
                while($row = $read->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $theLoaiItem = array(
                        "idTheLoai"=>$idTheLoai,
                        "tenTheLoai"=>$tenTheLoai,
                        "hinhTheLoai"=>$hinhTheLoai,
                    );
                    array_push($theLoaiArr,$theLoaiItem);
                }
            
            }
            return $theLoaiArr;
        }
    }
?>