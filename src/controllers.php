<?php
require_once 'business.php';

function home(&$model) {
    return 'index_view';
}

function about(&$model) {
    return 'about_view';
}

function contact(&$model) {
    return 'contact_view';
}

function gallery(&$model) {
    $maxImagesOnPage = 4;

    if (!empty($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;

    $images = get_images_from_page($page, $maxImagesOnPage);
    $model['allImagesCount'] = count(get_images());
    $model['images'] = $images;
    $model['maxImgOnPage'] = $maxImagesOnPage;

    return 'gallery_view';
}

function upload(&$model) {
    return 'upload_view';
}

function uploadFile(&$model) {
    if(isset($_POST['submit'])) {
        $file = $_FILES['fileToUpload'];
        $watermark_text = $_POST['watermark_text'];
        $response = upload_msg($file, $watermark_text);

        if($response == "") {
            $tmp_src = $file['tmp_name'];

            $name = basename($file['name']);
            $src = './images/'.$name;

            move_uploaded_file($tmp_src, $src);
            set_image($name, $_POST['title'], $_POST['author']);

            create_thumbnail($name, $src);
            create_watermark($watermark_text, $src);
        }
        $_SESSION['response'] = $response;
    }
    return 'redirect: ' . $_SERVER['HTTP_REFERER'];
}

function upload_msg(&$file, &$watermark) {
    $response = "";
    
    if(!strpos($file['type'], "jpeg") && !strpos($file['type'], "png")) {
        $response .= "Plik musi być typu .png lub .jpg!";
    }

    if($file['size'] > (1024 * 1024)) {
        if($response != "")
            $response .= "<br>";
        $response .= "Rozmiar pliku nie może przekraczać 1 MB!";
    }

    if(!$watermark) {
        if($response != "")
            $response .= "<br>";
        $response .= "Pole 'znak wodny' jest wymagane!";
    }

    if($file['error'] != UPLOAD_ERR_OK) {
        $response = "Wystąpił błąd";
    }

    return $response;
}

function pinned(&$model) {
    if(isset($_SESSION['checked'])) {
        $images = get_images_based_on_array($_SESSION['checked']);
        $model['images'] = $images;
    }
    return 'pinned_view';
}

function forget_selected(&$model) {
    $images = get_images();

    for($i = 0; $i < count($_SESSION['checked']); $i++) {
        if(in_array($_SESSION['checked'][$i], $_POST['forget'])) {
            $_SESSION['checked'][$i] = null;
        }
    }
    
    return 'redirect: ' . $_SERVER['HTTP_REFERER'];
}

function register(&$model) {
    return 'register_view';
}

function login(&$model) {
    return 'login_view';
}

function set_img_session(&$model) {
    $images = get_images();

    $_SESSION['checked'] = (isset($_SESSION['checked'])) ? $_SESSION['checked'] : array();

    foreach($images as $image) {
        if(in_array($image->{'_id'}, $_POST['remember']) && !in_array($image->{'_id'}, $_SESSION['checked'])) {
            array_push($_SESSION['checked'], $image->{'_id'});
        }
    }
    
    return 'redirect: ' . $_SERVER['HTTP_REFERER'];
}

function create_watermark(&$text, &$src) {
    $extension = (strpos(mime_content_type($src), "png")) ? 'png' : 'jpeg';

    $width = 10 + strlen($text) * 25;

    $watermark = imagecreatetruecolor($width, 50);
    $white = imagecolorallocate($watermark, 255, 255, 255);
    $black = imagecolorallocate($watermark, 0, 0, 0);
    imagefilledrectangle($watermark, 0, 0, $width - 1, 49, $white);

    $font = './static/fonts/FantasqueSansMono-Regular.ttf';
    imagettftext($watermark, 30, 0, 10, 35, $black, $font, $text);

    if ($extension == 'png') {
        imagepng($watermark);
        $image = imagecreatefrompng($src);
    }
    else {
        imagejpeg($watermark);
        $image = imagecreatefromjpeg($src);
    }

    imagecopy($image, $watermark, 10, imagesy($image) - 60, 0, 0, imagesx($watermark), imagesy($watermark));

    if ($extension == 'png') {
        imagepng($image, $src);
    }
    else {
        imagejpeg($image, $src);
    }    
    
    imagedestroy($watermark);
    imagedestroy($image);
}

function create_thumbnail(&$fileName, &$src) {
    $thumbnail = imagecreatetruecolor(200, 125);
    $original = (strpos(mime_content_type($src), "png")) ? imagecreatefrompng($src) : imagecreatefromjpeg($src);

    imagecopyresampled($thumbnail, $original, 0, 0, 0, 0, 200, 125, imagesx($original), imagesy($original));

    if(strpos(mime_content_type($src), "png"))
        imagepng($thumbnail, './images/thumbnails/'.$fileName);
    else
        imagejpeg($thumbnail, './images/thumbnails/'.$fileName);

    imagedestroy($original);
    imagedestroy($thumbnail);
}