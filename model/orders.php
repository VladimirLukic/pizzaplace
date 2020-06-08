<?php

class orders{
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
            echo "Connection failed: ".$e->getMessage();
        }
    }

    function orderData($array){
        $data = $this->pdo->prepare("INSERT INTO orders(about, order_price, customer_id) 
        VALUES (?, ?, ?)");
        $data->execute($array);
        if($data->rowCount() != 0){
            $this->pdo->query("ALTER TABLE data AUTO_INCREMENT = 0");
            header("Location: ../view/menu.php?message=Thank you for your order");
            }
            else{
                $id = $this->getCustomerId();
                $this->pdo->query("DELETE FROM data WHERE id='$id[0]'");
                $this->pdo->query("ALTER TABLE data AUTO_INCREMENT = 0");
                header("Location: ../view/form.php?message=Something went wrong. Please, try again.");
            }
            
    }
    function customerData($array){
        $data = $this->pdo->prepare("INSERT INTO data(name, last_name, address, phone_number ) 
        VALUES(?, ?, ?, ?)");
        $data->execute($array);
    }

    function getCustomerId(){
        $id = $this->pdo->query("SELECT id FROM data ORDER BY ID DESC");
        if($id)
        $customerId = $id->fetchAll(PDO::FETCH_NUM);
        return $customerId[0];
    }
}


$orders = new orders();

?>