<?php
    class Post {
        // nama table database
        private $conn;
        private $table = 'tb_mahasiswa';

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
            $query = 'SELECT * FROM '.$this->table.' ORDER BY id_mhs ASC';

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
            FROM '. $this->table . '
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

        // Create Post function
        public function create(){
            //create query
            $query = 'INSERT INTO '. 
                $this->table . '
            SET
                nama_mhs = :nama_mhs,
                jk_mhs = :jk_mhs,
                hp_mhs = :hp_mhs,
                alamat_mhs = :alamat_mhs';

            //buat statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->nama_mhs = htmlspecialchars(strip_tags($this->nama_mhs));
            $this->jk_mhs = htmlspecialchars(strip_tags($this->jk_mhs));
            $this->hp_mhs = htmlspecialchars(strip_tags($this->hp_mhs));
            $this->alamat_mhs = htmlspecialchars(strip_tags($this->alamat_mhs));

            //binding data
            $stmt->bindParam(':nama_mhs', $this->nama_mhs);
            $stmt->bindParam(':jk_mhs', $this->jk_mhs);
            $stmt->bindParam(':hp_mhs', $this->hp_mhs);
            $stmt->bindParam(':alamat_mhs', $this->alamat_mhs);

            //execute query database
            if ($stmt->execute()) {
                return true;
            }

            //print error jika ada yang error
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        // Update Post function
        public function update(){
            //create query
            $query = 'UPDATE '. 
                $this->table . '
            SET
                nama_mhs = :nama_mhs,
                jk_mhs = :jk_mhs,
                hp_mhs = :hp_mhs,
                alamat_mhs = :alamat_mhs
            WHERE
                id_mhs = :id_mhs';

            //buat statement
            $stmt = $this->conn->prepare($query);

            //clean data
            $this->nama_mhs = htmlspecialchars(strip_tags($this->nama_mhs));
            $this->jk_mhs = htmlspecialchars(strip_tags($this->jk_mhs));
            $this->hp_mhs = htmlspecialchars(strip_tags($this->hp_mhs));
            $this->alamat_mhs = htmlspecialchars(strip_tags($this->alamat_mhs));
            $this->id_mhs = htmlspecialchars(strip_tags($this->id_mhs));

            //binding data
            $stmt->bindParam(':nama_mhs', $this->nama_mhs);
            $stmt->bindParam(':jk_mhs', $this->jk_mhs);
            $stmt->bindParam(':hp_mhs', $this->hp_mhs);
            $stmt->bindParam(':alamat_mhs', $this->alamat_mhs);
            $stmt->bindParam(':id_mhs', $this->id_mhs);

            //execute query database
            if ($stmt->execute()) {
                return true;
            }

            //print error jika ada yang error
            printf("Error: %s.\n", $stmt->error);

            return false;
        }

        //Delete post
        public function delete(){
            //query delete
            $query = 'DELETE FROM ' . $this->table . ' WHERE id_mhs = :id_mhs';

            //statement 
            $stmt = $this->conn->prepare($query);

            //clean data just id
            $this->id_mhs = htmlspecialchars(strip_tags($this->id_mhs));

            //binding hanya id
            $stmt->bindParam(':id_mhs', $this->id_mhs);

            //execute query database
            if ($stmt->execute()) {
                return true;
            }

            //print error jika ada yang error
            printf("Error: %s.\n", $stmt->error);

            return false;

        }

    }