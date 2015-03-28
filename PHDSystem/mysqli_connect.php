<?php
/*
Moved to Mini's config.php
*/
DEFINE ('DB_USER', 'registrar');
DEFINE ('DB_PASSWORD', 'B4ymax');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'PHDSystem');

// $dbc will contain a resource link to the database
// @ keeps the error from showing in the browser

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
