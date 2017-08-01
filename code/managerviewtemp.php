


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>View Records</title>
    </head>
    <body>
        <?php

        require_once ("Includes/connectDB.php");
// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully"."<br>";

$sql = "SELECT * FROM manager";
$result = mysqli_query($databaseConnection, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    // display data in table

//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";



echo "<table border='1' cellpadding='10'>";

echo "<tr> <th>ID</th> <th>First Name</th> <th>Last Name</th> <th>email</th> <th>Company Name</th> <th>Title</th> <th>Cell First</th> <th>Cell Middle</th> <th>Cell Last</th> <th>Cell Phone</th> <th>Edit</th> <th>Delete</th> <th>View Review</th> </tr>";



// loop through results of database query, displaying them in the table
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo '<td>'.$row["mk_id"]."</td>";
        echo '<td>'.$row["mk_managerfirst"]."</td>";
        echo '<td>'.$row["mk_managerlast"]."</td>";
        echo '<td>'.$row["mk_manageremail"]."</td>";
        echo '<td>'.$row["mk_managercompany"]."</td>";
        echo '<td>'.$row["mk_managertitle"]."</td>";
        echo '<td>'.$row["mk_managercellfirst"]."</td>";
        echo '<td>'.$row["mk_managercellmiddle"]."</td>";
        echo '<td>'.$row["mk_managercelllast"]."</td>";
        echo '<td>'.$row["mk_managercellfirst"] .".". $row["mk_managercellmiddle"] ."." .$row["mk_managercelllast"]."</td>";

        echo '<td><a href="manageredit.php?mk_id=' . $row["mk_id"]. '">Edit</a></td>';
        echo '<td><a href="managerdelete.php?mk_id=' . $row["mk_id"]. '">Delete</a></td>';
        echo '<td><a href="managerprofile.php?mk_id=' . $row["mk_id"]. '">View Review</a></td>';
        //echo '<td><a href="manageredit.php?id=' . $row['id'] . '">Edit</a></td>';
        //echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
        // echo "Manager's First Name: " . $row["mk_managerfirst"]."<br>";
        // echo "Manager's Last Name: " . $row["mk_managerlast"]."<br>";
        // echo "Manager's Phone Number: " . $row["mk_number"]."<br>";
   echo "</tr>";
    }
} else {
    echo "0 results";
}

// close table>
echo "</table>";

?>

        <p><a href="managernew.php">Add a new record</a></p>
    </body>
</html>
