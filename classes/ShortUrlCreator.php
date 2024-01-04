<?php

class ShortUrlCreator 
{
    protected $db;

    public function __construct() 
    {  
        $this->db = new Mysqli('localhost', 'root', '', 'short_urls');
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
        $url = $this->db->escape_string($url);
        $exsists = $this->db->query("SELECT code FROM short_urls WHERE url = '{$url}'");

        // Ecли кода нет, то записываем в бд url и дату создания, потом генерируем код с помощью метода generateCode
        if($exsists->num_rows) {
            return $exsists->fetch_object();
        }else {
            $this->db->query("INSERT INTO short_urls(url, created VALUES('{$url}, NOW())')");
        }

        $code = $this->generateCode($this->db->insert_id);

        $this->db->query("UPDATE links SET code = '{$code}' WHERE url = '{$url}'");
   
        return $code;

    }

    public function getUrl($code) 
    {
        $code = $this->db->escape_string($code);
        $code = $this->db->query("SELECT url FROM short_urls WHERE code = '{$code}'");

        if($code->num_rows) {
            return $code->fetch_object()->url;
        }

        return '';
    }
    
}
 