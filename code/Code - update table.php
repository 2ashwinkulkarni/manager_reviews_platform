
<?php
 require_once ("Includes/connectDB.php");
// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"."<br>";

$sql = "UPDATE manager SET mk_managerfirst='Ganpati_2', mk_managerlast='Bappa_2' WHERE mk_id=2";

if ($databaseConnection->query($sql) === True) {
    echo "Record updated successfully";
} else {
    echo "Error updating record. " . $databaseConnection->error;
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
