<?php
    class Post {
        // nama tabel database
        private $conn;
        private $tabel = 'tb_mahasiswa';

        // poss att
        public $id_mhs;
        public $nama_mhs;
        public $jk_mhs;
        public $hp_mhs;
        public $alamat_mhs;

        // database construction
        public function __construct($db){
            $this->conn = $db;
        }

        // fungsi fungsi
        // fungsi read all
        public function read() {
            // query database
            $query = 'SELECT * FROM '.$this->tabel.' ORDER BY id_mhs ASC';

            // statement
            $stmt = $this->conn->prepare($query);

            // execute statement
            $stmt->execute();
            return $stmt;
        }

        // fungsi get single data
        public function read_single(){
            // query database
            $query = 'SELECT 
            id_mhs, 
            nama_mhs, 
            jk_mhs, 
            hp_mhs, 
            alamat_mhs 
            FROM '. $this->tabel . '
            WHERE id_mhs = ? 
            LIMIT 0,1';

            // statement
            $stmt = $this->conn->prepare($query);

            // bind id_mhs
            $stmt->bindParam(1, $this->id_mhs);

            //execute
            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            //set data
            $this->nama_mhs = $row['nama_mhs'];
            $this->jk_mhs = $row['jk_mhs'];
            $this->hp_mhs = $row['hp_mhs'];
            $this->alamat_mhs = $row['alamat_mhs'];
        }

        // Create Post
    }