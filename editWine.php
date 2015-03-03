<?php
require_once 'Wine.php';
require_once 'Connection.php';
require_once 'WineTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new WineTableGateway($connection);

$id = $_POST['id'];
$wine = $_POST['wine'];
$description = $_POST['description'];
$year = $_POST['year'];
$temperature= $_POST['temperature'];
$type = $_POST['type'];

$gateway->updateWine($id, $wine, $description, $year, $temperature, $type);

header('Location: home.php');
