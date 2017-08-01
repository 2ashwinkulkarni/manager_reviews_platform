<?php

/*

NEW.PHP

Allows user to create a new entry in the database

*/



// creates the new record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($mk_managerfirst, $mk_managerlast, $mk_manageremail, $mk_managercompany, $mk_managertitle, $mk_managercellfirst, $mk_managercellmiddle, $mk_managercelllast, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>

<title>New Record</title>

</head>

<body>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post">

<div>

<strong>Manager's First Name       : *</strong> <input type="text" name="mk_managerfirst" value="<?php echo $mk_managerfirst; ?>"/><br/>

<strong>Manager's Last Name        : *</strong> <input type="text" name="mk_managerlast" value="<?php echo $mk_managerlast; ?>" /><br/>

<strong>Manager's eMail            : *</strong> <input type="text" name="mk_manageremail" value="<?php echo $mk_manageremail; ?>" /><br/>
     
<strong>Manager's Company          : *</strong> <input type="text" name="mk_managercompany" value="<?php echo $mk_managercompany; ?>" /><br/>

<strong>Manager's Title            : *</strong> <input type="text" name="mk_managertitle" value="<?php echo $mk_managertitle; ?>" /><br/>

<strong>Manager's Cell (Area Code) : *</strong> <input type="text" name="mk_managercellfirst" value="<?php echo $mk_managercellfirst; ?>" /><br/>

<strong>Manager's Cell B           : *</strong> <input type="text" name="mk_managercellmiddle" value="<?php echo $mk_managercellmiddle; ?>" /><br/>

<strong>Manager's Cell C           : *</strong> <input type="text" name="mk_managercelllast" value="<?php echo $mk_managercelllast; ?>" /><br/>
<p>* required</p>

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



// check if the form has been submitted. If it has, start to process the form and save it to the database

if (isset($_POST['submit']))

{

// get form data, making sure it is valid
//$mk_managerfirst = mysqli_real_escape_string(htmlspecialchars($_POST['mk_managerfirst']));
//$mk_managerlast = mysql_real_escape_string(htmlspecialchars($_POST['mk_managerlast']));
$mk_managerfirst = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerfirst']);
$mk_managerlast = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerlast']);
$mk_manageremail = mysqli_real_escape_string($databaseConnection, $_POST['mk_manageremail']);
$mk_managercompany = mysqli_real_escape_string($databaseConnection, $_POST['mk_managercompany']);
$mk_managertitle = mysqli_real_escape_string($databaseConnection, $_POST['mk_managertitle']);
$mk_managercellfirst = mysqli_real_escape_string($databaseConnection, $_POST['mk_managercellfirst']);
$mk_managercellmiddle = mysqli_real_escape_string($databaseConnection, $_POST['mk_managercellmiddle']);
$mk_managercelllast = mysqli_real_escape_string($databaseConnection, $_POST['mk_managercelllast']);


echo "Submitted"."<br>";

// check to make sure both fields are entered

if ($mk_managerfirst == '' || $mk_managerlast == '')

{

// generate error message

$error = 'ERROR: Please fill in all required fields!';



// if either field is blank, display the form again

renderForm($mk_managerfirst, $mk_managerlast, $mk_manageremail, $mk_managercompany, $mk_managertitle, $mk_managercellfirst, $mk_managercellmiddle, $mk_managercelllast, $error);
}

else

{

// save the data to the database
$sql = "INSERT INTO manager (mk_managerfirst, mk_managerlast, mk_manageremail, mk_managercompany, mk_managertitle, mk_managercellfirst, mk_managercellmiddle, mk_managercelllast) 
VALUES ('$mk_managerfirst', '$mk_managerlast', '$mk_manageremail', '$mk_managercompany', '$mk_managertitle', '$mk_managercellfirst', '$mk_managercellmiddle', '$mk_managercelllast');";

//$sql="INSERT INTO manager (mk_managerfirst, mk_managerlast, mk_manageremail, mk_managercompany, mk_managertitle, mk_managercellfirst, mk_managercellmiddle, mk_managercelllast)
//VALUES ('$mk_managerfirst', '$mk_managerlast', $mk_managerlast, $mk_manageremail, $mk_managercompany, $mk_managertitle, $mk_managercellfirst, $mk_managercellmiddle, $mk_managercelllast)";

if (!mysqli_query($databaseConnection,$sql)) {
  die('Error: Check if phone number is valid' . mysqli_error($con));
}
echo "1 record added";

//mysqli_close($con);
//mysql_query("INSERT players SET mk_managerfirst='$mk_managerfirst', mk_managerlast='$mk_managerlast'")

//or die(mysql_error());



// once saved, redirect back to the view page

header("Location: managerview.php");

}

}

else

// if the form hasn't been submitted, display the form

{

//renderForm('','','');
renderForm();

}

?>
