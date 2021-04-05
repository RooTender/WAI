<?php


use MongoDB\BSON\ObjectID;


function get_db() {
    $mongo = new MongoDB\Client(
        "mongodb://localhost:27017/wai",
        [
            'username' => 'wai_web',
            'password' => 'w@i_w3b',
        ]);

    $db = $mongo->wai;

    return $db;
}

function set_image($name, $title, $author) {
    $db = get_db();

    $image = [
        'img' => './images/'.$name,
        'thumbnail' => './images/thumbnails/'.$name,
        'title' => $title,
        'author' => $author
    ];
    $db->images->insertOne($image);

    return true;
}

function get_images() {
    $db = get_db();
    return $db->images->find()->toArray();
}

function get_images_based_on_array($array) {
    $db = get_db();

    $result = null;
    for($i = 0; $i < count($array); $i++) {
        $result[$i] = $db->images->find(['_id' => $array[$i]])->toArray();
    }

    return $result;
}

function get_images_from_page($page, $max) {
    $db = get_db();

    $opts = [
        'skip' => ($page - 1) * $max,
        'limit' => $max
    ];

    $data = $db->images->find([], $opts)->toArray();
    return $data;
}
