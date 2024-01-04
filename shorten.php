<?php
session_start();
require_once __DIR__ . '/classes/ShortUrlCreator.php';


$shortUrl = new ShortUrlCreator();

if(isset($_POST['url'])) {
    $url = $_POST['url'];

    if($code = $shortUrl->createCode($url)) {
        $_SESSION['feedback'] = "Готово! Вот ваша ссылка: <a href='http://localhost/test/$code'>http://localhost/test/$code</a>";
    } else {
        $_SESSION['feedback'] = "Ошибка! Возможно, некорректный URL?";
    }

    header('Location: index.php');
}