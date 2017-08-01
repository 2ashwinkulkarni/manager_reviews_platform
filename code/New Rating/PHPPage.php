<?php 
//You'll need a MySQL conn
require_once ("Includes/connectDB.php");

//You need to make sure that a rating AND item ID were sent to the script
if(isset($_POST['rate'])  && isset($_POST['id'])) {

//Declare 'em
$rating = $_POST['rate'];
$bar_id = $_POST['id'];
$ip_addr = $_SERVER['REMOTE_ADDR'];

//Check if the IP address has all ready voted, deny if he or she has.
$check_result = mysql_query('SELECT id FROM ratings WHERE item_id = "'.$bar_id.'" AND ip_addr = "'.$ip_addr.'"');
if(!mysql_num_rows($check_result)){

//All clear, insert into MySQL, if insert fails, don't echo; if insert succeed echo true
$sql = mysql_query('INSERT INTO ratings SET item_id = "'.$bar_id.'", ip_addr = "'.$ip_addr.'", weight = "'.$rating.'"');
if(!$sql) {
//echo 'false';
} else {
echo 'true';
}
} else{
//echo 'false';
}
}
?>
<span class="thanks" style="display:none">Thanks for rating!</span>
<a class="awesome">Awesome</a>
<a class="sucks">Not For Me.</a>


<?php 
//This script assumes you have pulled the item data from the MySQL and the data is a var called row which is an array

$ip_addr = $_SERVER['REMOTE_ADDR'];
$check_result = mysql_query('SELECT id FROM ratings WHERE item_id = "'.$row['id'].'" AND ip_addr = "'.$ip_addr.'"');
if(mysql_num_rows($check_result) > 0){?>

<script>
$('.thanks').show();
$('.awesome').hide();
$('.sucks').hide();
</script>

<?php } ?>
<script>
$('.awesome').click( function() {

$.post("rate_callback.php", {rate: 1, item: "<?php echo $row['id'] ?>"}, function(data){
if(data.length >0) {
$('.thanks').show();
$('.awesome').hide();
$('.sucks').hide();
} else {
//Well they rated all ready so don't do anything, they shouldn't even have gotten this far.
}
});

});

$('.sucks').click( function() {
$('.thanks').show();
$('.awesome').hide();
$('.sucks').hide();

});

</script>