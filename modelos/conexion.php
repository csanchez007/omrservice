<?php

class Conexion
{
    public static  function conectar(){

        $link = new PDO("mysql:host=localhost;dbname=infosite_bss_omr",
                        "root",
                        "cesarinfo777",
                        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );

        return $link;
    }
}