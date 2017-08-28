

<?php

//}

// connect to the database

require_once ("Includes/connectDB.php");

// Check connection
if (!$databaseConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully"."<br>";

// check if the form has been submitted. If it has, process the form and save it to the database

//if (isset($_POST['submit']))

//{
// confirm that the 'mk_id' value is a valmk_id integer before getting the form data

//if (is_numeric($_POST['mk_id']))

//{

// get form data, making sure it is valmk_id

//$mk_id = $_POST['mk_id'];

//$mk_managerfirst = mysql_real_escape_string(htmlspecialchars($_POST['mk_managerfirst']));
//$mk_managerlast = mysql_real_escape_string(htmlspecialchars($_POST['mk_managerlast']));
//$mk_managerfirst = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerfirst']);
//$mk_managerlast = mysqli_real_escape_string($databaseConnection, $_POST['mk_managerlast']);


// check that mk_managerfirst/mk_managerlast fields are both filled in

//if ($mk_managerfirst == '' || $mk_managerlast == '')

//{

// generate error message

//$error = 'ERROR: Please fill in all required fields!';



//error, display form

//renderForm($mk_id, $mk_managerfirst, $mk_managerlast, $error);

//}

//else

//{

// save the data to the database

//mysql_query("UPDATE manager SET mk_managerfirst='$mk_managerfirst', mk_managerlast='$mk_managerlast' WHERE mk_id='$mk_id'")

//$sql="INSERT INTO manager (mk_managerfirst, mk_managerlast)
//VALUES ('$mk_managerfirst', '$mk_managerlast')";

//$sql="UPDATE manager SET mk_managerfirst='test1', mk_managerlast='test2' WHERE mk_id=4";
//$sql = "UPDATE manager SET mk_managerfirst='Doe' WHERE mk_id=2";
//$sql="INSERT INTO manager (mk_managerfirst, mk_managerlast)
//VALUES ('$mk_managerfirst', '$mk_managerlast')";

//$sql = "UPDATE manager SET mk_managerfirst='$mk_managerfirst', mk_managerlast='$mk_managerlast' WHERE mk_id=$mk_id";

//if ($databaseConnection->query($sql) === TRUE) {
  //echo "Record updated successfully";
//} else {
  //echo "Error updating record: " . $databaseConnection->error;
//}


//or die(mysql_error());



// once saved, redirect back to the view page

//header("Location: managerview.php");

//}

//}

//else

{

// if the 'mk_id' isn't valmk_id, display an error

//echo "Error! Check Manager's Id!";

//}

//}

//else

// if the form hasn't been submitted, get the data from the db and display the form

//{



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

$mk_managercompany = $row['mk_managercompany'];

$mk_managerstate = $row['mk_managerstate'];

$mk_managercity = $row['mk_managercity'];

// show form

//renderForm($mk_id, $mk_managerfirst, $mk_managerlast, '');

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

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/w3.css">
<link rel="stylesheet" href="Styles/Teal.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}


</style>
<body class="w3-light-grey">
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=160527240701277";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="managerhome.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Saheb</a>
  <a href="#" class="w3-bar-item w3-button w3-right #009688">Claim Your Profile</a>
  <a href="#" class="w3-bar-item w3-button w3-right #009688">Review This Boss</a>
 
  <!--  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Link</a>
      <a href="#" class="w3-bar-item w3-button">Link</a>
      <a href="#" class="w3-bar-item w3-button">Link</a>-->
   
   <input type="text" class="w3-bar-item w3-input" placeholder="Search for a boss">
   <a href="managerview.php" class="w3-bar-item w3-button w3-green"><i class="fa fa-search" aria-hidden="true"></i>&nbsp</a>
     
           
   <!--</div>
  <a href="#" class="w3-bar-item w3-button w3-hide-small w3-right w3-hover-teal" title="Search"><i class="fa fa-search"></i></a>
 </div>-->

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-theme-d2 w3-hide w3-hide-large w3-hide-medium">
    <a href="#team" class="w3-bar-item w3-button">Team</a>
    <a href="#work" class="w3-bar-item w3-button">Work</a>
    <a href="#pricing" class="w3-bar-item w3-button">Price</a>
    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
    <a href="#" class="w3-bar-item w3-button">Search</a>
  </div>
</div>
</div>

<!-- Image Header 
<div class="w3-display-container w3-animate-opacity">
  <img src="/w3images/sailboat.jpg" alt="boat" style="width:100%;min-height:350px;max-height:600px;">
  <div class="w3-container w3-display-bottomleft w3-margin-bottom">  
    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-theme w3-hover-teal" title="Go To W3.CSS">LEARN W3.CSS</button>
  </div>
</div>-->

<!-- Modal -->

<div id="id01" class="w3-modal">
  <div class="w3-modal-content w3-card-4 w3-animate-top">
    <header class="w3-container w3-teal w3-display-container"> 
      <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-teal w3-display-topright"><i class="fa fa-remove"></i></span>
      <h2 class="w3-center"> <b>Update Profile</b></h2>    
      <h5>If any of the details for this manager has changed, please update here! </h5>
    </header>
    <div class="w3-container">

<form role="form" id="contactForm">
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mk_managerfirst" type="text" placeholder="First Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mk_managerlast" type="text" placeholder="Last Name">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="mk_manageremail" type="text" placeholder="Email">
    </div>
</div>
    
</form>
<p class="w3-center">
<button class="w3-button w3-section w3-Teal w3-ripple"> submit </button>
<p class="w3-center">Thank you! We will review and publish your updates shortly. - Publish after submit</p>
 <!--<a href="manageredit.php" class="w3-button w3-teal">Link Button</a>-->
    
    <!--<script>
        $("#contactForm").submit(function(event){
    // cancels the form submission
    event.preventDefault();
    submitForm();
});

function submitForm(){
    // Initiate Variables With Form Content
    var first = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();
 
    $.ajax({
        type: "POST",
        url: "manageredit.php",
        data: "name=" + name + "&email=" + email + "&message=" + message,
        success : function(text){
            if (text == "success"){
                formSuccess();
            }
        }
    });
}
function formSuccess(){
    $( "#msgSubmit" ).removeClass( "hidden" );
}
    </script>-->
</p>
        
      <p>Go to our <a class="w3-text-teal" href="/w3css/default.asp">W3.CSS Tutorial</a> to learn more!</p>
    </div>
    <footer class="w3-container w3-teal">
      <p>Modal footer</p>
    </footer>
  </div>
</div>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">       
  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-quarter">
    
      <div class="w3-white w3-text-grey w3-card-4">
        
          <div class="w3-display-container">            

                      <div class="w3-card-4" style="width:100%">
                          <img src="Images\Avatar.png" alt="Person" style="width:100%">
                   
                      </div>
                      
          <div class="w3-display-bottomright w3-container w3-text-white">
            <p><button onclick="document.getElementById('id01').style.display='block'" class="w3-button w3-green w3-round w3-medium w3-padding-small">Edit Profile</button></p>
              
              
          </div>
        </div>     
      </div>

        <br>

<div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
            <h2>
                <?php print $mk_managerfirst . " " . $mk_managerlast;?>
</h2> 
          <p><i class="fa fa-briefcase fa-fw w3-margin-right w3-large w3-text-teal"></i><?php print $mk_managercompany;?></p>
          <p><i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i><?php print $mk_managerstate . ", " . $mk_managercity;?></p>

          <p><i class="fa fa-linkedin w3-hover-opacity w3-large w3-text-teal"></i>
              <h7>&nbsp;</h7> 
             <i class="fa fa-twitter w3-hover-opacity w3-large w3-text-teal"></i></p>
              
          <!--<p><i class="fa fa-envelope fa-fw w3-margin-right w3-large w3-text-teal"></i>ex@mail.com</p>
          <p><i class="fa fa-phone fa-fw w3-margin-right w3-large w3-text-teal"></i>1224435534</p>-->
   
        </div>
    </div>

    <!-- End Left Column -->
    </div>

    <!-- Center Column -->
    <div class="w3-half">
   
<div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
            <div class="w3-container w3-padding">
               <p contenteditable="true" class="w3-border w3-padding w3-opacity ">Do we need a comments bar here?</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil "></i>  Post</button>
            </div>
          </div>
         </div>
           <br>

<div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
    
        
          <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-comments-o fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Comments By Others <hr> </h2>
        
          <h5 class="w3-opacity"><b>Posted on 03-22-2016</b></h5>
           <p><i class="fa fa-plus-square w3-text-Green" aria-hidden="true" ></i>
              Agreed with most comments here. Really great manager, knows his work, and works very well in silo</p>
          <p><i class="fa fa-minus-square w3-text-crimson" aria-hidden="true" ></i>
              For him to progress ahead, he should be more comfortable to delegate work to juniors under him.  I recommend, he should structure his thoughts before shipping work to someone else and be more comfortable acting in a reviewer capacity</p>
                           
          <hr>

           <h5 class="w3-opacity"><b>Posted on 02-07-2015</b></h5>
           <p><i class="fa fa-plus-square w3-text-Green" aria-hidden="true" ></i>
              He is a great guy. </p>
          <p><i class="fa fa-minus-square w3-text-crimson" aria-hidden="true" ></i>
              Needs to polish his communication, delegation skills.  Not a guy who like happy hours so you wont find him there, but this should not be take as a critisism</p>       
        
       
      </div>
      </div>
         </div>

      

    <!-- End Center Column -->

        <!-- Right Column -->
    <div class="w3-quarter">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
     <p class="w3-large w3-text-theme w3-center"><b>Review Score </b></p>
                    <!--<div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:90%">90%</div>
          </div>-->
          
            <div class="w3-container w3-center">
             <span class="w3-tag w3-jumbo w3-round-xlarge w3-teal"> 3.8<span class="w3-xlarge"></span>
          </div>
            

            <hr>
          <p class="w3-large w3-text-theme"><b><i class="fa fa-balance-scale fa-fw w3-margin-right w3-text-teal"></i>Score Breakdown </b></p>
          <p>Skills</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0</div>
          </div>
          <p>Ability</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">3.8</div>
          </div>
          <p>Flexibility</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:75%">3.8</div>
          </div>
           <p>Will you work for this manager again?</p>
          <div class="w3-light-grey w3-round-xlarge w3-small">
            <div class="w3-container w3-center w3-round-xlarge w3-teal" style="width:100%">5</div>
          </div>
          <br>
        </div>


      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
  <!-- End Page Container -->
</div>

<footer class="w3-container w3-teal w3-center w3-margin-top">
  <p>Find us on social media. &nbsp;
  <i class="fa fa-facebook-official w3-hover-opacity"></i>
  <i class="fa fa-instagram w3-hover-opacity"></i>
  <i class="fa fa-snapchat w3-hover-opacity"></i>
  <i class="fa fa-pinterest-p w3-hover-opacity"></i>
  <i class="fa fa-twitter w3-hover-opacity"></i>
  <i class="fa fa-linkedin w3-hover-opacity"></i>
  <p><a href="https://www.Saheb.com" target="_blank">Saheb.com</a></p>
</footer>

    <script type="text/javascript">(function(d, t, e, m){
    
    // Async Rating-Widget initialization.
    window.RW_Async_Init = function(){
            huid: "369217",
            uid: "3b1a75ed8a7f6b4e16f2d8
                
        RW.init({
                "isDummy": falsef353ceecab",
            source: "website",
            options: {
                "size": "medium",
                "style": "oxygen",
            } 
        });
        RW.render();
    };
        // Append Rating-Widget JavaScript library.
    var rw, s = d.getElementsByTagName(e)[0], id = "rw-js",
        l = d.location, ck = "Y" + t.getFullYear() + 
        "M" + t.getMonth() + "D" + t.getDate(), p = l.protocol,
        f = ((l.search.indexOf("DBG=") > -1) ? "" : ".min"),
        a = ("https:" == p ? "secure." + m + "js/" : "js." + m);
    if (d.getElementById(id)) return;              
    rw = d.createElement(e);
    rw.id = id; rw.async = true; rw.type = "text/javascript";
    rw.src = p + "//" + a + "external" + f + ".js?ck=" + ck;
    s.parentNode.insertBefore(rw, s);
    }(document, new Date(), "script", "rating-widget.com/"));</script>

</body>
</html>
