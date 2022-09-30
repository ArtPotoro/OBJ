<?php


class DB{
    private static $pdo=null;

    private function __construct()
    {
    }

    public static function getPDO(){
        if (self::$pdo==null){
            $dsn="mysql:host=localhost;dbname=world202209;charset=utf8mb4";
            self::$pdo=new PDO($dsn,'root','root');
        }
        return self::$pdo;
    }

}