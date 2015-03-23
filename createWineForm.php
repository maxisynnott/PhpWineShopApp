<?php
require_once 'connection.php';
require_once 'WineryTableGateway.php';


$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$conn = Connection::getInstance();
$wineryGateway = new WineryTableGateway($conn);

$winerys = $wineryGateway->getWinerys();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/createWine.js"></script>
    </head>
    <body>
        <div class ="container"
         <?php require 'toolbar.php' ?>
         <?php require 'header.php' ?>
         <?php require 'mainMenu.php' ?>
        <h1>Add A Wine</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        
        <form id ="createWineForm" name="createWineForm" action="createWine.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                       <td>Wine</td>
                        <td>
                            <input type="text" name="wine" value="<?php
                                    if (isset($_POST) && isset($_POST['wine'])) {
                                        echo $_POST['wine'];
                                    }
                                ?>" />
                            <span id="wineError" class="error">
                                 <?php
                                  if (isset($errorMessage) && isset($errorMessage['wine'])) {
                                      echo $errorMessage['wine'];
                                    }
                                    ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="<?php
                                    if (isset($_POST) && isset($_POST['description'])) {
                                        echo $_POST['description'];
                                    }
                                ?>" />
                            <span id="descriptionError" class="error">
                                 <?php
                                   if (isset($errorMessage) && isset($errorMessage['description'])) {
                                     echo $errorMessage['description'];
                                 }
                                 ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            <input type="text" name="year" value="<?php
                                    if (isset($_POST) && isset($_POST['year'])) {
                                        echo $_POST['year'];
                                    }
                                ?>" />
                                <span id="yearError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['year'])) {
                                        echo $errorMessage['year'];
                                    }
                                    ?>
                                </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Temperature</td>
                        <td>
                            <input type="text" name="temperature" value="<?php
                                    if (isset($_POST) && isset($_POST['temperature'])) {
                                        echo $_POST['temperature'];
                                    }
                                ?>" />
                                <span id="temperatureError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['temperature'])) {
                                        echo $errorMessage['temperature'];
                                    }
                                    ?>
                                </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                             <input type="text" name="type" value="<?php
                                    if (isset($_POST) && isset($_POST['type'])) {
                                        echo $_POST['type'];
                                    }
                                ?>" />
                                <span id="typeError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['type'])) {
                                        echo $errorMessage['type'];
                                    }
                                    ?>
                                </span>
                        </td>
                    </tr>
                     <tr>
                         <td>Winery</td>
                            <td>
                                <select name="winery_id">
                                    <option value="-1">No winery</option>
                                    <?php
                                    $w = $winerys->fetch(PDO::FETCH_ASSOC);
                                    while ($w) {
                                        echo '<option value="' . $w['id'] . '">' . $w['wine'] . '</option>';
                                        $w = $managers->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                        <td></td>
                        <td>
                            <input class="btn btn-default" type="submit" value="Create Wine" name="createWine" />
                        </td>
                    </tr>
                </tbody>
            </table>
       </form>
    </div>
        <?php require 'footer.php'; ?>
        <?php require 'scripts.php'; ?>
     </body>
</html>
