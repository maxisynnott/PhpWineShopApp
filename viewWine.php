<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$statement = $gateway->getWineById($id);
?>

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
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Wine</td>'
                    . '<td>' . $row['wine'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Description</td>'
                    . '<td>' . $row['description'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Year</td>'
                    . '<td>' . $row['year'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Temperature</td>'
                    . '<td>' . $row['temperature'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Type</td>'
                    . '<td>' . $row['type'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
         <p>
            <a href="editWineForm.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-default">
                    Edit Wine</button></a>
             <a class="deleteWine" href="deleteWine.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-default">
                     Delete Wine</button></a>
        </p>
        </div>
    </body>
</html>

        