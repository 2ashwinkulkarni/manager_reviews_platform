<?php
// check request
//if(isset($_POST['user_id']) && isset($_POST['user_id']) != "")
{
    // include Database connection file
    include("db_connection.php");

    // get user user_id

    $user_id = $_POST['user_id'];

    //$user_id = 10;
    // delete User
    $query = "DELETE FROM users_new WHERE user_id = '$user_id'";
    if (!$result = mysql_query($query)) {
        exit(mysql_error());
    }
}
?>