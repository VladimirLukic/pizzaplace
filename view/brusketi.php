<?php

include "../model/food.php";
include "../model/layout.php";

$layout->header();
$brusketies = $food->getFood('brusketi');
$_SESSION['url'] = 'brusketi';
?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <div class="prikazi">

<?php

    foreach($brusketies as $brusketi){
        print "<div>
                    <p class='hidden'>".$brusketi['id']."</p>
                    <img src='../public/$brusketi[picture]' alt='picture'>
                    <h1 class='naslovi'>$brusketi[name]</h1>
                    <div class='razmak'>$brusketi[about]</div>
                    <p class='price' value='".$brusketi['price_1']*$rate."'>
                    ". $brusketi['price_1']*$rate.$curr."</p>
                </div>";
    }

$layout->form($curr);

?>
        </div>
    </div>
        
<script src="../public/js/listing.js"></script>
<!-- <script src="../public/js/layout.js"></script> -->

<?php

$layout->footer();

?>