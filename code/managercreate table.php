<?php
 require_once ("Includes/connectDB.php");
// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"."<br>";

// sql to create table
$sql = "CREATE TABLE Manager (
mk_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
mk_managerfirst VARCHAR(30) NOT NULL,
mk_managerlast VARCHAR(30) NOT NULL,
mk_manageremail VARCHAR(50),
mk_managerregdate TIMESTAMP
)";

if ($databaseConnection->query($sql) === TRUE) {
    echo "Table manager created successfully";
} else {
    echo "Error creating table: " . $databaseConnection->error;
}

$databaseConnection->close();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title></title>
    </head>
    <body>
        
    </body>
</html>
