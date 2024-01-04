<?php
session_start();
require_once __DIR__ . '/classes/ShortUrlCreator.php';

global $pdo;

$shortUrl = new ShortUrlCreator($pdo);

if(isset($_POST['button'])) {
    $url = $_POST['button'];

    if($code = $shortUrl->createCode($url)) {
        $_SESSION['feedback'] = "Готово! Вот ваша ссылка: <a href='http://localhost/shorturlcreator-/$code'>http://localhost/shorturlcreator-/$code</a>";
    } else {
        $_SESSION['feedback'] = "Ошибка! Возможно, некорректный URL?";
    }

    header('Location: index.php');
}