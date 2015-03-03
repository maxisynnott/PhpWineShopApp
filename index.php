<?php
require_once 'Wine.php';
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
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <meta charset="UTF-8">
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
        <table>
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
                    echo '</tr>';
                    
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
         </div>
       </body>
</html>
