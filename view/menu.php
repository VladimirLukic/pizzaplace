<?php

include "../model/food.php";
include "../model/layout.php";

$layout->header();
$menus = $food->getMenu();
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
}else
$message='';

?>

    <div id="meni">
        <h3>We prepare for you</h3>
        <div id="pizza-menu">

<?php

    foreach($menus as $menu){
        print "<a href='$menu[name].php'>
                    <div class='kategorije'>
                        <h1>$menu[name]</h1>
                        <img src='../public/$menu[picture]' alt='photo'>
                    </div>
                </a>";
    }

?>

        </div>
        <h1><?=$message?></h1>
    </div>

<?php
$layout->footer();

?>