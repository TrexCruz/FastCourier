<?php


if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) OR strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
    header('location: ../../index.html');
}
else{

$secret = "6LdfbE0eAAAAAH_C81x0GcsXE7TatYHU2rL9XlZ5";
    $response = $_REQUEST["captcha"];
    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
    $captcha_success = json_decode($verify);
    
    if ($captcha_success->success == TRUE) {
        die('verified');
    } else if ($captcha_success->success == FALSE) {
        die('verify_failed');
    }
    
}
