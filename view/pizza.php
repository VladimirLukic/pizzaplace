<?php

include "../model/food.php";
include "../model/layout.php";

$layout->header();
$pizzas = $food->getFood('pizza');

?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <div class="prikazi">

<?php

    foreach($pizzas as $pizza){
        print "<div>
                    <p class='hidden'>".$pizza['id']."</p>
                    <img src='../public/$pizza[picture]' alt='picture'>
                    <h1 class='naslovi'>$pizza[name]</h1>
                    <div class='razmak'>$pizza[about]</div>
                    <p class='price' value='$pizza[price_1]'>32cm -". $pizza['price_1']."</p>
                    <p class='price' value='$pizza[price_2]'>45cm -". $pizza['price_2']."</p>
                </div>";
    }

$layout->form();
?>

        </div>
    </div>
        
<script src="../public/js/listing.js"></script>
<script src="../public/js/layout.js"></script>
<?php

$layout->footer();

?>