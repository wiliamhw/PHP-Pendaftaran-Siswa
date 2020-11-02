<?php

// Main page address relative to entry/assets or entry/views
$mainAddress = "../../main/views/index.view.php";

// Entry page address relative to main/assets or entry/views
$entryAddress = "../../entry/views/index.view.php";

/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'pendaftaran_siswa');
 
/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
