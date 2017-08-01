<?php

// Connection variables 
$host = "localhost"; // MySQL host name eg. localhost
$user = "simplecmsuser518"; // MySQL user. eg. root ( if your on localserver)
$password = "RMy3_AlVYrC!"; // MySQL user password  (if password is not set for your root user then keep it empty )
$database = "simplecms518"; // MySQL Database name

// Connect to MySQL Database 
$db = mysql_connect($host, $user, $password) or die("Could not connect to database");
// Select MySQL Database 
mysql_select_db($database, $db);

?>