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

            } catch(PDOException $e) {
                
            }
        }
    }