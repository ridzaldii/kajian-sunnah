<?php

class Connection {
    function getLink(){
        $ip = "192.168.121.145";
        $link = "http://".$ip."/kajian-sunnah/web/images/Donasi/";        
        return $link;
    }
    function getConnection(){
        $host       = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "kajian_sunnah";
        try{
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }
}