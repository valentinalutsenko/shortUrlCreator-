<?php
require_once __DIR__ . '/classes/ShortUrlCreator.php';

if(isset($_GET['code'])) {
    
    $shortUrl = new ShortUrlCreator();
    $code = $_GET['code'];

    if($url = $shortUrl->getUrl($code)) {
        header("Location: {$url}");
        exit();
    }
    header('Location: index.php');
}