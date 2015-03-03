<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWines();
       
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/wine.js"></script>
        <title></title>
    </head>
    <body>
        <div class ="container">
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Wine</th>
                    <th>Description</th>
                    <th>Year</th>
                    <th>Temperature</th>
                    <th>Type</th>
                   
                </tr>
            </thead>
            <tbody>
                 <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {
                    
                    
                    echo '<td>' . $row['wine'] . '</td>';
                    echo '<td>' . $row['description'] . '</td>';
                    echo '<td>' . $row['year'] . '</td>';
                    echo '<td>' . $row['temperature'] . '</td>';
                    echo '<td>' . $row['type'] . '</td>';
                    echo '<td>'
                    
                    . '<a href="viewWine.php?id='.$row['id'].'"><button type="button" class="btn btn-warning">View</button></a> '
                    . '<a href="editWineForm.php?id='.$row['id'].'"><button type="button" class="btn btn-info">Edit</button></a> '
                    . '<a class="deleteWine" href="deleteWine.php?id='.$row['id'].'"><button type="button" class="btn btn-danger">Delete</button></a> '
                    . '</td>';
                    echo '</tr>'; 
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    
                }
                ?>
            </tbody>
        </table>
        <p><a href="createWineForm.php"><button type="button" class="btn btn-default">Add A Wine</button></a></p>
        </div>
        </body>
</html>
