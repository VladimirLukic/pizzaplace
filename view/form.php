<?php

include "../model/layout.php";

$layout->header();
if(!empty($_GET['message'])) {
    $message = $_GET['message'];
}else
$message='';

?>

    <div id="w">
        <a href="menu.php"><h3>Back to the menu</h3></a>
        <?=$message?>
        <div id='order'>
            <form action='../controllers/FormController.php' methot='POST'>
                <div class="form-group">
                <label>Name</label>
                <input type="text" name='name' class="form-control" placeholder="Add Name" required>
                </div>
                <div class="form-group">
                <label>Last Name</label>
                <input type="text" name='last_name' class="form-control" placeholder="Add Last Name" required>
                </div>
                <div class="form-group">
                <label>Address</label>
                <input type="text" name='address' class="form-control" placeholder="Add Address" required>
                </div>
                <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name='phone' class="form-control" placeholder="Add Phone Number" required>
                </div>

                <div class="form-group">
                <input type="text" id='products' name='products' class="hidden">
                <input type="text" id='total' name='total' class="hidden">
               </div>
                <button id='submit' type="submit" class="btn button">Confirm Order</button>
            </form>
        </div>
    </div>
        
<script src="../public/js/form.js"></script>

<?php

$layout->footer();

?>