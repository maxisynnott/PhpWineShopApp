<?php
$session_id = session_id();
if ($session_id == "") {
    session_start();
}
?>

     <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        
            
            
            <a class="navbar-brand" href="index.php">UnWined</a>
                 
            
        <div class="collapse navbar-collapse" id="collapse">
            <ul class="nav navbar-nav navbar-left">
                <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="home.php">Home</a></li>
            <?php } else { ?>
                <li><a href="index.php">Home</a></li>
            <?php } ?>
                <li><a href="index.php">About</a></li>
                <li><a href="index.php"  data-toggle="modal">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <?php if (isset($_SESSION['username'])) { ?>
                <li><a href="index.php">Logout</a></li>
            <?php } else { ?>
                <li><a href="login.php">Login</a></li>
            <?php } ?>
            </ul>
        </div>
        </div>
    </div>
</nav>
