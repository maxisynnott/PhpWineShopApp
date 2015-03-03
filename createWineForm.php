<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
                            <input type="text" name="wine" value="" />
                            <span id="wineError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name="description" value="" />
                            <span id="descriptionError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Year</td>
                        <td>
                            <input type="text" name="year" value="" />
                            <span id="yearError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Temperature</td>
                        <td>
                            <input type="text" name="temperature" value="" />
                            <span id="TemperatureError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td>
                            <input type="text" name="type" value="" />
                            <span id="typeError" class="error"></span>
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
    </body>
</html>
