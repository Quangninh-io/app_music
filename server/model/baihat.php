<?php 
include_once('../model/playlist.php');
include_once('../model/album.php');
include_once('../model/theloai.php');
?>
<?php 
    class BaiHat {
        private $conn;

        public  $idBaiHat;
        public  $idAlbum;
        public  $idTheLoai;
        public  $idPlaylist;
        public  $tenBaiHat;
        public  $hinhBaiHat;
        public  $caSi;
        public  $linkBaiHat;
        public  $luotThich;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        // chon mot bai hat cu the 
        public function chiTietBaiHat(){
            $query = "SELECT * FROM baihat WHERE baihat.idBaiHat=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->idBaiHat);
            $stmt->execute();
            return $stmt;
        }
        // tim kiem bai hat
        public function timKiemBaiHat(){
            $query = "SELECT * FROM baihat WHERE tenBaiHat =?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->tenBaiHat);
            $stmt->execute();
            return $stmt;
        }
        // chuyen bai hat tiep theo
        public function baiHatTiepTheo(){
            $query = "SELECT * FROM baihat WHERE baihat.idBaiHat=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->idBaiHat);
            $stmt->execute();
            return $stmt;
        }

        // lay toan bo
        public function layBaiHatToanBo(){
            $query = "SELECT * FROM baihat";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

    }
?>