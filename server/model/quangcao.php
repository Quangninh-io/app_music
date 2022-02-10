<?php 
    include_once('baihat.php');
    include_once('../config/connect.php');
?>
<?php 
    class QuangCao {
        private $conn;

        public  $idQuangCao;
        public  $hinhQuangCaoLon;
        public  $hinhQuangCaoNho;
        public  $noiDungQuangCao;
        public  $idBaiHat;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        // lay toan bo
        public function layQuangCao(){
            $query = "SELECT quangcao.idQuangCao,quangcao.hinhQuangCaoLon,quangcao.hinhQuangCaoNho,quangcao.noiDungQuangCao,quangcao.idBaiHat,baihat.tenBaiHat  FROM quangcao,baihat WHERE quangcao.idBaiHat = baihat.idBaiHat";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        
        
    }
?>