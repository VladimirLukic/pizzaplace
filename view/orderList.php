<?php

include "../controllers/OrderController.php";
include "../model/layout.php";

$layout->header();
$_SESSION['url'] = 'orderList';

if(!empty($_GET['message'])) {
    $message = $_GET['message'];
}else
$message='';

?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <div id='order'>

<?php
$orderList = $order;
($orderList == null)? header("Location: ../view/menu.php"):'';
    foreach($orderList as $details){
        print "<div class='order'>";
        foreach($details as $ind=>$detail){
            ($ind == 'img')? print "<img src='$detail' alt='picture'>":'';
            ($ind == 'name')? print "<h1 class='naslovi'>$detail</h1>":'';
            ($ind == 'price')? print "<p class='prices' value='".$detail*$rate."'>".$detail*$rate.$curr."</p>":'';
            ($ind == 'topping')? print "<div class='razmak'>$detail</div>":'';
            ($ind == 'quant')? print "<input class='inp' type='text' maxlength='2' value='$detail'>":'';
            ($ind == 'id')? print "<p id='id' style='display: none'>$detail</p>":'';
        }
        print "<button class='btn button delete'>Delete</button></div>";

    }

?>
            <h1><?=$message?></h1>
            <a href="menu.php"><button class="btn button">More</button></a>
            <div id='payment'>
                <p id='sum'>
                    <span class='left'>Sum: </span>
                    <input id='ordersum' class='sum right' disabled><?=$curr?>
                </p>
                <p id='delivery' value='5'>
                    <span class='left'>Delivery: </span>
                    <input id='delivery' class='right' value='5' disabled><?=$curr?>
                    <hr>
                </p>
                
                <form action="form.php" method='POST'>
                    <p>
                        <span class='left'>Total: </span>
                        <input id='totalsum' class='right' name='total' disabled><label><?=$curr?></label>
                    </p>
                    <p id='submit'>
                        <button class="btn button">Order</button>
                    </p>
                </form>
            </div>
        </div>
   </div>
        
<script src="../public/js/order.js"></script>
<?php

$layout->footer();

?>