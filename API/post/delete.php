<?php
    //header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
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

    //delete post menggunakan if
    if ($post->delete()) {
        echo json_encode(
            array('message' => 'Post Deleted')
        );
    } else {
        echo json_encode(
            array('message' => 'Post Not Deleted')
        );
    }