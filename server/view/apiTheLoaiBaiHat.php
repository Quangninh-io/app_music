<?php 
    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    include_once('../controller/controllerTheLoaiBaiHat.php');
?>
<?php 
    class apiTheLoaiBaiHat{
        public function duLieuNhanDuoc(){
            if(isset($_POST['idTheLoai'])){
                $theLoai=$_POST['idTheLoai'];
            }
            return $theLoai;
        }
    }

    $theLoai = new TheLoaiBaiHatController();
    $theLoaiArr = $theLoai->theLoaiBaiHat();
    echo json_encode($theLoaiArr);
?>