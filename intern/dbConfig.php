<?php
//Database credentials
$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName     = 'codexworld';

//Connect and select the database
$db = new mysqli("localhost","root","","dc_activity1");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>