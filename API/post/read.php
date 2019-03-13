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
    }