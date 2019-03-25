<?php
    //header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Methods,Access-Control-Allow-Headers,Content-Type,Authorization,X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Post.php';

    //panggil class database koneksi
    $database = new Database();
    $db = $database->connect();

    //call public class Post object
    $post = new Post($db);

    //ambil data mentah yang akan dipost
    $data = json_decode(file_get_contents("php://input"));

    //set id
    $post->id_mhs = $data->id_mhs;

    $post->nama_mhs = $data->nama_mhs;
    $post->jk_mhs = $data->jk_mhs;
    $post->hp_mhs = $data->hp_mhs;
    $post->alamat_mhs = $data->alamat_mhs;

    //create post menggunakan if
    if ($post->create()) {
        echo json_encode(
            array('message' => 'Post Updated')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Updated')
        );
    }