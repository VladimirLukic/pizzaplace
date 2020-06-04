<?php

include "../model/orders.php";

$customerData = [];
$order = [];

(isset($_REQUEST['name']))? array_push($customerData, $_REQUEST['name']):
(isset($_REQUEST['last_name']))? array_push($customerData, $_REQUEST['last_name']):
(isset($_REQUEST['address']))? array_push($customerData, $_REQUEST['address']):
(isset($_REQUEST['phone']))? array_push($customerData, $_REQUEST['phone']):header("Location: ../view/menu.php");

//creating customer and getting his id
$orders->customerData($customerData);
$customerId = $orders->getCustomerId();



(isset($_REQUEST['products']))? $orderData = $_REQUEST['products']:'';
(isset($_REQUEST['total']))? $total = trim($_REQUEST['total'], '"'):'';

$about = '';
foreach(json_decode($orderData) as $data){
    foreach($data as $ind=>$el){
    ($ind != 'id' and $ind != 'img')? $about .= $ind.' : '.$el.",\n":'';
    }
}
print json_encode($about);
array_push($order, $about);
array_push($order, $total);
array_push($order, $customerId[0]);


//creating the order
$orders->orderData($order);

?>