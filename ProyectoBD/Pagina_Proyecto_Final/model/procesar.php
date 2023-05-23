<?php

define("DB_USER", 'root');
define("DB_PASSWORD", 'root');
define("DB_NAME", 'bd_proyecto_final');
define("DB_HOST", 'localhost');
class controladorBD{

    public static function connect()
    {
        $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $con->query("SET NAMES 'utf8'");
        return $con;
    }
}