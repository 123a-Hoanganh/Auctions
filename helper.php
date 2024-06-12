<?php

define("BASE_URL", "http://localhost/chuabaiqslv/index.php/");

function site_url($url = ""){
    return BASE_URL. $url;
}

function redirect($url){
    header('Location: '. $url);
    exit();
}
function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function newpassword() {
    $var = "123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $arr = '';
    $length = strlen($var);
    for ($i = 0; $i < 6; $i++) {
        $arr .= $var[rand(0, $length - 1)];
    }
    return $arr;
}
