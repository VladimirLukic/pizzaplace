<?php

class layout{
    function header(){
        print "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='csrf-token' content='{{ csrf_token() }}'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <meta http-equiv='X-UA-Compatible' content='ie=edge'>
            <title>Pizzashop</title>
            <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css' integrity='sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk' crossorigin='anonymous'>    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Tangerine'> 
            <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
            <link href='https://fonts.googleapis.com/css?family=Livvic&display=swap' rel='stylesheet'>
            <link rel='stylesheet' href='../public/css/index.css'>
        </head>
        <body>
        <div class='currency'>
            <span value='USD'>USD</span>
            <span value='EUR'>EUR</span>
        </div>";        
    }

    function form(){
        print "<form action='orderList.php' method='POST'>
                    <div id='form-div'>
                        <input type='text' id='input1' name='order' class='hidden'>
                        <input type='text' id='input2' name='sum' class='hidden'>
                        <p id='total' class='footer'>
                            Total: <span class='sum'></span>
                            <button class='btn button choose'>Choose</button>
                        </p>
                    </div>
                </form>";
    }

    function footer(){
        print "<div class='footer'>
                    <div class='footer-cell'>
                        <i class='fa fa-phone' aria-hidden='true'></i>
                        <p>555-32-12</p>
                    </div>
                    <div class='footer-cell'>
                        <i class='fa fa-clock-o' aria-hidden='true'></i>
                        <p>weekdays: 10h - 23h</p>
                        <p>weekend: 15h - 23h</p>
                    </div>
                    <div class='footer-cell'>
                        <a href=''><i class='fa fa-facebook-square' aria-hidden='true'></i></a>
                        <a href=''><i class='fa fa-instagram' aria-hidden='true'></i></a>
                        <a href=''><i class='fa fa-twitter' aria-hidden='true'></i></a>
                        <p>Follow us</p>
                    </div>
                </div>";
    }
}

$layout = new layout();

?>