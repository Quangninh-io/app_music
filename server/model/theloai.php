<?php 
    include_once('../config/connect.php');
?>
<?php 
    class TheLoai{
        private $conn;
        public  $idTheLoai;
        public  $tenTheLoai;
        public  $hinhTheLoai;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        // mot phan the loai
        public function layTheLoai(){
            $query = "SELECT * FROM theloai LIMIT 0,5";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        // lay toan bo
        public function layTheLoaiToanBo(){
            $query = "SELECT * FROM theloai";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // lay bai hat 
        public function theLoaiBaiHat(){
            $query = "SELECT baihat.idBaiHat, baihat.idAlbum, baihat.idTheLoai, baihat.idPlaylist, baihat.tenBaiHat, baihat.hinhBaiHat, baihat.caSi, baihat.linkBaiHat,theloai.tenTheLoai,theloai.hinhTheLoai FROM theloai,baihat WHERE theloai.idTheLoai=baihat.idTheLoai AND theloai.idTheLoai=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->idTheLoai);
            $stmt->execute();
            return $stmt;
        }
    }
?>