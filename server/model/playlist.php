<?php 
    include_once('baihat.php');
    include_once('../config/connect.php');
?>
<?php 
    class Playlist{
        private $conn;
        public  $idPlaylist;
        public  $tenPlaylist;
        public  $hinhNen;
        public  $hinhChinh;

        public function __construct($conn)
        {
            $this->conn = $conn;
        }

        // lay mot phan
        public function layPlaylist(){
            $query = "SELECT * FROM playlist LIMIT 0,5";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // lay toan bo
        public function layPlaylistToanBo(){
            $query = "SELECT * FROM playlist";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        // lay bai hat trong play list
        public function playListBaiHat(){
            $query = "SELECT baihat.idBaiHat, baihat.idAlbum, baihat.idTheLoai, baihat.idPlaylist, baihat.tenBaiHat, baihat.hinhBaiHat, baihat.caSi, baihat.linkBaiHat, playlist.tenPlaylist, playlist.hinhChinh FROM playlist,baihat WHERE baihat.idPlaylist = playlist.idPlaylist AND playlist.idPlaylist = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->idPlaylist);
            $stmt->execute();
            return $stmt;
        }

    }

?>