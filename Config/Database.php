<?php
    class Database {
        // identifikasi database
        private $host = 'localhost';
        private $db = 'db_coba';
        private $username = 'root';
        private $password = '';
        private $conn;

        // fungsi koneksi
        public function connect(){
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8', $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection Error : ' . $e->getMessage();
            }
            return $this->conn;
        }
    }