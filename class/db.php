<?php

# Prevent warning. #
error_reporting(0);
ob_start();

session_start();

define('HASH', PASSWORD_DEFAULT);
define('COST', 15);

define('DB_HOSTNAME','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','blog');
# Connection to the database. #
$conn = mysqli_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)
or die('Unable to connect to MySQL');

mysqli_query( $conn, 'SET NAMES "utf8" COLLATE "utf8_general_ci"' );

# Select a database to work with. #
$selected = mysqli_select_db( $conn, DB_NAME )
or die('Unable to connect to Database');

session_start(); # Session start. #

setlocale(LC_ALL, 'es_ES');
setlocale(LC_TIME, "spanish");
$timezone = "Europe/Madrid";
if (function_exists('date_default_timezone_set')) {
    date_default_timezone_set($timezone);
}

$curDate = date('d-m-Y H:i:s');
