<?php
    //header
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../Config/Database.php';
    include_once '../../models/Post.php';

    //panggil class database koneksi
    $database = new Database();
    $db = $database->connect();

    //panggil class post
    $post = new Post($db);

    //get id_mhs
    $post->id_mhs = isset($_GET['id_mhs']) ? $_GET['id_mhs'] : die();

    //get post
    $post->read_single();

    //data array
    $post_array = array(
        'id_mhs' => $post->id_mhs,
        'nama_mhs' => $post->nama_mhs,
        'jk_mhs' => $post->jk_mhs,
        'hp_mhs' => $post->hp_mhs,
        'alamat_mhs' => $post->alamat_mhs
    );

    //ubah data ke json
    print_r(json_encode($post_array));