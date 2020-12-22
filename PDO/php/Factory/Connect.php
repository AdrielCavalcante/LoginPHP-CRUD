<?php

namespace Factory;

class Connect{
    private static $con;

    public static function GetConexao(){
        if (!isset(self::$con)):
            self::$con = new \PDO('mysql:host=localhost;dbname=loginPHP;charset=utf8','root','');
        endif;
            return self::$con;
    }
}

?>