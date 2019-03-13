<?php
    //header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../Config/Database.php';
    include_once '../../models/Post.php';

    //koneksi database dengan panggil class database
    $database = new Database();
    $db = $database->connect();

    //panggil class post
    $post = new Post($db);

    //variabel post
    $result = $post->read();

    //get data row
    $num = $result->rowCount();

    //mengecek data di row
    if($num > 0){
        //post data jadi array
        $post_array = array();
        $post_array['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $post_item = array(
                'id_mhs' => $id_mhs,
                'nama_mhs' => $nama_mhs,
                'jk_mhs' => $jk_mhs,
                'hp_mhs' => $hp_mhs,
                'alamat_mhs' => $alamat_mhs
            );

            //memasukkan data item ke attribut data
            array_push($post_array['data'], $post_item);
        }

        //mengubah data ke json
        echo json_encode($post_array);

    } else {
        //jika row tidak ditemukan atau data kosong
        echo json_encode(
            array('message' => 'Data Not Found!')
        );
    }