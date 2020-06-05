<?php

if(isset($_REQUEST['dollar'])){
    $rate = 1;
    $curr = 'USD';
} 
if(isset($_REQUEST['euro'])){
    $rate = 0.9;
    $curr = 'EUR';
}
session_start();
$_SESSION['rate'] = $rate;
$_SESSION['curr'] = $curr;
header("Location: ../view/".$_SESSION['url'].".php");

?>