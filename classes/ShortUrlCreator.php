<?php

class ShortUrlCreator 
{
    protected $pdo;

    public function __construct(PDO $pdo) 
    {
        $this->pdo = $pdo;
    }


    //генерируем код
    public function generateCode($num) 
    {
        return base_convert($num, 10, 36);
    }


    public function createCode($url) 
    {
        $url = trim($url);

        //проверяем url на корректность
        if(!filter_var($url, FILTER_VALIDATE_URL)) 
        {
            return '';
        }
       //обращаемся к бд и возвращаем код, соотвествующий переданному url.
        $url = $this->pdo->quote($url);
        $exsists = $this->pdo->prepare("SELECT code FROM short_urls WHERE url = '{$url}'");

        // Ecли кода нет, то записываем в бд url и дату создания, потом генерируем код с помощью метода generateCode
        if($exsists->rowCount()) {
            return $exsists->fetchColumn();
        }else {
            $this->pdo->prepare("INSERT INTO short_url(url, created VALUES('{$url}, NOW())')");
        }

        $code = $this->generateCode($this->pdo->lastInsertId());

        $this->pdo->prepare("UPDATE links SET code = '{$code}' WHERE url = '{$url}'");
   
        return $code;

    }

    

}
 