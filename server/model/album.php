<?php 
    include_once('../config/connect.php');
?>
<?php 
    class Album{
        private $conn;
        public  $idAlbum;
        public  $tenAlbum;
        public  $tenCaSiAlbum;
        public  $hinhAlbum;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }
        // lay mot phan
        public function layAlbum(){
            
            $query = "SELECT * FROM album LIMIT 0,5";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        
        // lay toan bo
        public function layAlbumToanBo(){
            $query = "SELECT * FROM album";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }
        
        // lay bai hat 
        public function albumBaiHat(){
            $query = "SELECT baihat.idBaiHat, baihat.idAlbum, baihat.idTheLoai, baihat.idPlaylist, baihat.tenBaiHat, baihat.hinhBaiHat, baihat.caSi, baihat.linkBaiHat, album.tenAlbum, album.hinhAlbum FROM album,baihat WHERE album.idAlbum=baihat.idAlbum AND album.idAlbum=?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->idAlbum);
            $stmt->execute();
            return $stmt;
        }


        
    }
?>