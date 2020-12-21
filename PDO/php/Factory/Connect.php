<?php

namespace Factory;

class Connect{
    private static $istancia;

    public static function GetConexao(){
        if (!isset(self::$istancia)):
            self::$istancia = new \PDO('mysql:host=localhost;dbname=loginPHP;charset=utf8','root','');
        endif;
            return self::$istancia;
    }
}

?>