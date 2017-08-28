 
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}

/*form {
    border: 3px solid #f1f1f1;
}*/

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.login {
    text-align: center;
    margin: 24px 0 12px 0;
    font-weight: bold;
    
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
    
    
}

{
    height: 100%;
    margin: 0;
}

.bg {
    /* The image used */
    background-image: Images/Office.jpeg;

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

</style>
<body class="w3-light-grey">
    <div id="fb-root"></div>

<!-- Navbar -->
<div class="w3-top">
 <div class="w3-bar w3-theme-d2 w3-left-align">
  <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-hover-white w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  <a href="managerhome.php" class="w3-bar-item w3-button w3-teal"><i class="fa fa-home w3-margin-right"></i>Saheb</a>
  
  <!--<a href="#Claim_Your Profile" class="w3-bar-item w3-button #009688">Claim Your Profile</a>-->
  
  <a href="managersignup.php" class="w3-right w3-bar-item w3-button #009688">Sign Up</a>
  <a class="w3-right w3-bar-item w3-button #009688"> <h7>&nbsp;</h7></a>      
  <a class="w3-right w3-bar-item w3-button #009688"> <h7>&nbsp;</h7></a>  
  <a href="managerforgotpassword.php" class="w3-right w3-bar-item w3-button #009688">Forgot Password?</a>
  <a href="managerprofile.php" class="w3-right w3-bar-item w3-button #009688">Sign In</a>
  <a><input class=" w3-bar-item w3-input w3-padding-small w3-right w3-round-large" type="password" placeholder="Password"></a>
  <a class="w3-right w3-bar-item w3-button #009688"> <h7>&nbsp;</h7></a> 
  <a><input class=" w3-bar-item w3-input w3-padding-small w3-right w3-round-large" type="text" placeholder="Email"></a>

 
  <!--  <div class="w3-dropdown-hover w3-hide-small">
    <button class="w3-button" title="Notifications">Dropdown <i class="fa fa-caret-down"></i></button>     
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Link</a>
      <a href="#" class="w3-bar-item w3-button">Link</a>
      <a href="#" class="w3-bar-item w3-button">Link</a>-->
   
      </div>
 </div>



<style>
body, html {
    height: 100%;
    margin: 0;
}

.hero-image {
    /* The image used */
    background-image: url("Images/Office.jpeg");

    /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-size: cover;
    position: relative;
    filter: opacity(99%);
}
    
    /* Place text in the middle of the image */
.hero-text {
    text-align: center;
    font-weight:bold;
    position: absolute;
    top: 10%;
    left: 50%;
    transform: translate(-50%, -10%);
    color: #000;
    
}
    


</style>


</head>
<body>

<div class="hero-image ">
  <div class="hero-text font-weight:bold">
    <h1 style="font-size:50px; font-weight:bold; font-family: Rockwell; color: DarkSlateGrey;">Your Boss a Hero or a Zombie</h1>
    <h1 style="font-size:20px; font-weight:bold; font-family: Rockwell; color: DarkSlateGrey;">Anonymously share and review sentiment!</h>
    
    <!--<button>Hire me</button>-->
   
 
    <form name="frmSearch" method="post" action="managersearchlisting.php">
        <style>
            input[type=searchtext] {
            width: 500px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('searchicon.png');
            background-position: 10px 10px; 
            background-repeat: no-repeat;
            padding: 12px 20px 12px 20px;
           -webkit-transition: width 0.4s ease-in-out;
           transition: width 0.4s ease-in-out;
           text-align: center;
        }

         input[type=searchtext]:focus {
         width: 100%;
        }
        </style>

      <input type="searchtext" placeholder="Boss's First Name" name="search[mk_managerfirst]" value="<?php echo $mk_managerfirst; ?>"	/>
      <input type="searchtext" placeholder="Boss's Last Name" name="search[mk_managerlast]" value="<?php echo $mk_managerlast; ?>"	/>
      <input type="searchtext" placeholder="Boss's Company" name="search[mk_managercompany]" value="<?php echo $mk_managercompany; ?>"	/>
      <input type="searchtext" placeholder="Boss's Work Location (State)" name="search[mk_managerstate]" value="<?php echo $mk_managerstate; ?>"	/>
      <input type="searchtext" placeholder="Boss's Work Location (City)" name="search[mk_managercity]" value="<?php echo $mk_managercity; ?>"	/>
       <p> </p>
       
         <input type="submit" name="go" class="w3-button w3-green w3-round" value="Search">
        <input type="reset" class="w3-button w3-green w3-round" value="Reset" onclick="window.location='managerhome.php'">
    </form>
  
   
  </div>
</div>

     
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>





<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px"> 
        
 

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

  

</body>
</html>