<?php
require_once 'Connection.php';
require_once 'WineryTableGateway.php';
require_once 'WineTableGateway.php';

$sessionId = session_id();
if ($sessionId == "") {
    session_start();
}

