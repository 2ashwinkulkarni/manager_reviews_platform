<?php

/*

EDIT.PHP

Allows user to edit specific entry in database

*/



// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($mk_id, $mk_managerfirst, $mk_managerlast, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>Edit Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solmk_id red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<input type="hidden" name="mk_id" value="<?php echo $mk_id; ?>"/>

<div>

<!--<p><strong>mk_id:</strong> <?php// echo $mk_id; ?></p>-->

<strong>First Name: *</strong> <input type="text" name="mk_managerfirst" value="<?php echo $mk_managerfirst; ?>"/><br/>

<strong>Last Name: *</strong> <input type="text" name="mk_managerlast" value="<?php echo $mk_managerlast; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}

// connect to the database

require_once ("Includes/connectDB.php");
// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully"."<br>";

// check if the form has been submitted. If it has, process the form and save it to the database

if (isset($_POST['submit']))

{
// confirm that the 'mk_id' value is a valmk_id integer before getting the form data

if (is_numeric($_POST['mk_id']))

{

// get form data, making sure it is valmk_id

$mk_id = $_POST['mk_id'];

//$mk_managerfirst = mysql_real_escape_string(htmlspecialchars($_POST['mk_managerfirst']));
//$mk_managerlast = mysql_real_escape_string(htmlspecialchars($_POST['mk_managerlast']));
$mk_managerfirst = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerfirst']);
$mk_managerlast = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerlast']);


// check that mk_managerfirst/mk_managerlast fields are both filled in

if ($mk_managerfirst == '' || $mk_managerlast == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



//error, display form

renderForm($mk_id, $mk_managerfirst, $mk_managerlast, $error);

}

else

{

// save the data to the database

//mysql_query("UPDATE manager SET mk_managerfirst='$mk_managerfirst', mk_managerlast='$mk_managerlast' WHERE mk_id='$mk_id'")

//$sql="INSERT INTO manager (mk_managerfirst, mk_managerlast)
//VALUES ('$mk_managerfirst', '$mk_managerlast')";

//$sql="UPDATE manager SET mk_managerfirst='test1', mk_managerlast='test2' WHERE mk_id=4";
//$sql = "UPDATE manager SET mk_managerfirst='Doe' WHERE mk_id=2";
//$sql="INSERT INTO manager (mk_managerfirst, mk_managerlast)
//VALUES ('$mk_managerfirst', '$mk_managerlast')";

$sql = "UPDATE manager SET mk_managerfirst='$mk_managerfirst', mk_managerlast='$mk_managerlast' WHERE mk_id=$mk_id";

if ($databaseConnection->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $databaseConnection->error;
}


//or die(mysql_error());



// once saved, redirect back to the view page

header("Location: managerview.php");

}

}

else

{

// if the 'mk_id' isn't valmk_id, display an error

echo "Error! Check Manager's Id!";

}

}

else

// if the form hasn't been submitted, get the data from the db and display the form

{



// get the 'mk_id' value from the URL (if it exists), making sure that it is valmk_id (checing that it is numeric/larger than 0)

if (isset($_GET['mk_id']) && is_numeric($_GET['mk_id']) && $_GET['mk_id'] > 0)
//if ($mk_managerfirst == '' || $mk_managerlast == '')
{
// query db

$mk_id = $_GET['mk_id'];

//$result = mysql_query("SELECT * FROM manager WHERE mk_id=$mk_id")
//$result = mysqli_query($databaseConnection,"SELECT * FROM manager WHERE mk_id=$mk_id")
$sql = "SELECT * FROM manager Where mk_id=$mk_id";
$result = mysqli_query($databaseConnection, $sql);
//or die(mysql_error());

$row = mysqli_fetch_array($result);


// check that the 'mk_id' matches up with a row in the databse

if($row)

{
 
// get data from db

$mk_managerfirst = $row['mk_managerfirst'];

$mk_managerlast = $row['mk_managerlast'];

// show form

renderForm($mk_id, $mk_managerfirst, $mk_managerlast, '');

}

else

// if no match, display result

{

echo "No results!";

}

}

else

// if the 'mk_id' in the URL isn't valmk_id, or if there is no 'mk_id' value, display an error

{

echo 'Error!';

}

}

?>