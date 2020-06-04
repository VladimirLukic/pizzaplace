<?php

include "../model/food.php";
include "../model/layout.php";

$layout->header();
$sandwiches = $food->getFood('sandwiches');

?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <div class="prikazi">

<?php

    foreach($sandwiches as $sandwich){
        print "<div>
                    <p class='hidden'>".$sandwich['id']."</p>
                    <img src='../public/$sandwich[picture]' alt='picture'>
                    <h1 class='naslovi'>$sandwich[name]</h1>
                    <div class='razmak'>$sandwich[about]</div>
                    <p class='price' value='$sandwich[price_1]'>". $sandwich['price_1']."</p>
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