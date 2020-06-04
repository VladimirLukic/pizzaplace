<?php

class menu{
    private $pdo;
    function __construct(){
        $host = 'localhost';
        $db = 'pizzaplace';
        $user ='root';
        $pass='';
        $charset='utf8';
        $dsn="mysql:host=$host; port=3306; dbname=$db; charset=$charset";
        $options=array(
            PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"
        );
        try{
            $this->pdo=new PDO($dsn,$user,$pass,$options);
        }catch(PDOException $e){
            echo "Kon JOK: ".$e->getMessage();
        }
    }

    function getMenu(){
        $data = $this->pdo->query("SELECT * FROM menus");
        if($data)
        $menu = $data->fetchAll(PDO::FETCH_ASSOC);
        return $menu;
    }

    function getFood($type){
        $data = $this->pdo->query("SELECT * FROM food WHERE type='$type'");
        if($data)
        $food = $data->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }
}

$food = new menu();

?>