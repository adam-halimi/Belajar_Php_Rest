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
    }