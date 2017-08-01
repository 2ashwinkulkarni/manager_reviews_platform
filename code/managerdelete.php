<?php

/*

DELETE.PHP

Deletes a specific entry from the 'manager' table

*/



// connect to the database

require_once ("Includes/connectDB.php");
// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully"."<br>";


// check if the 'mk_id' variable is set in URL, and check that it is valmk_id

if (isset($_GET['mk_id']) && is_numeric($_GET['mk_id']))

{

// get mk_id value
echo "loopentered";
$mk_id = $_GET['mk_id'];
echo $mk_id;


// delete the entry

$sql = "DELETE FROM manager WHERE mk_id=$mk_id";
if ($databaseConnection->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $databaseConnection->error;
}



// delete the entry

//$result = mysqli_query("DELETE FROM manager WHERE mk_id=$mk_id")

//or die(mysqli_error());



// redirect back to the view page

header("Location: managerview.php");

}

else

// if mk_id isn't set, or isn't valid, redirect back to view page

{

header("Location: managerview.php");

}


?>