<?php

include "../model/food.php";
include "../model/layout.php";

$layout->header();
$salads = $food->getFood('salads');

?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <div class="prikazi">

<?php

    foreach($salads as $salad){
        print "<div>
                    <p class='hidden'>".$salad['id']."</p>
                    <img src='../public/$salad[picture]' alt='picture'>
                    <h1 class='naslovi'>$salad[name]</h1>
                    <div class='razmak'>$salad[about]</div>
                    <p class='price' value='$salad[price_1]'>". $salad['price_1']."</p>
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