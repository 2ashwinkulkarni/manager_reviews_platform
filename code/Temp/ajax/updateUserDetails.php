<?php
// include Database connection file
include("db_connection.php");

// check request
if(isset($_POST))
{
    // get values
    $user_id = $_POST['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Updaste User details
    $query = "UPDATE users_new SET first_name = '$first_name', last_name = '$last_name', email = '$email' WHERE user_id = '$user_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}