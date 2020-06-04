<?php

(isset($_REQUEST['order']))? $order = json_decode($_REQUEST['order']):
header("Location: ../view/menu.php?message=You have no orders, yet");
(isset($_REQUEST['sum']))? $sum = (integer)$_REQUEST['sum']:0;


?>