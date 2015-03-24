<?php
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWines();
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require "styles.php" ?>
        <meta charset="UTF-8">
        <title>Unwinned</title>
    </head>
    <body>
        <div class ="container">
        <?php require 'toolbar.php' ?>
        <?php require 'header.php' ?>
        <?php require 'mainMenu.php' ?>
            `       <div class = "jumbotron">
                            <div class = "container">
                            <center>
                            <h6 class="banner">UnWined</h6>
                            <h7 class="bannersub">With 27 years outstanding service, let us find the wine for you!<h7>
                               
                                    <p><a href="login.php" class="btn btn-default loginbt">Sign Up</a></p></center>
                                   
                            </div>
                    </div>
                    
                    <!-- row 2 -->
                    <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-10S">
                                <h1> We have a drinking problem</h1>
                                <p>At Unwinned we like to give you the best quailty wines we can, at the best prices we can, and we offer our memebers many different stuff. </p>
                        </div>
                    </div>

                <!-- row 3 -->
                    <div class="row spacer2">
                        <div class="col-md-3 col-xs-6">
                            <p><img src="img/wine1.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <p><img src="img/wine2.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <p><img src="img/wine1.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <p><img src="img/wine2.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                         </div>
                    </div>
                        </div>
            </div>
                    
                    <div class ="area spacer">
                        <div class="container">
                         <div class="col-md-6 col-xs-6">
                             <p><img src="img/wine1.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <p><img src="img/wine2.png" alt="" class="img-responsive img-circle"></p>
                            <h4>we really like wine</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore </p>
                            <p><a href="login.php" class="btn btn-default">Read more </a></p>
                        </div>
                            
                        </div>
                    </div>
        <div class="spacer"> </div> 
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
       </body>
</html>
