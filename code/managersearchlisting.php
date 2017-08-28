<?php
require_once("perpage.php");
require_once("dbcontroller.php");
$db_handle = new DBController();

$mk_managerfirst   = "";
$mk_managerlast    = "";
$mk_managercompany = "";
$mk_managerstate   = "";
$mk_managercity    = "";

$queryCondition = "";



if (!empty($_POST["search"])) {

    foreach ($_POST["search"] as $k => $v) {
        if (!empty($v)) {
            if (empty($_POST["search"])) {
   echo "Error";
}
            $queryCases = array(
                "mk_managerfirst",
                "mk_managerlast",
                "mk_managercompany",
                "mk_managerstate",
                "mk_managercity"
            );
            if (in_array($k, $queryCases)) {
                if (!empty($queryCondition)) {
                    $queryCondition .= " AND ";
                } else {
                    $queryCondition .= " WHERE ";
                }
            }
            switch ($k) {
                case "mk_managerfirst":
                    $code = $v;
                    $queryCondition .= "mk_managerfirst LIKE '" . $v . "%'";
                    break;
                case "mk_managerlast":
                    $code = $v;
                    $queryCondition .= "mk_managerlast LIKE '" . $v . "%'";
                    break;
                case "mk_managercompany":
                    $code = $v;
                    $queryCondition .= "mk_managercompany LIKE '" . $v . "%'";
                    break;
                case "mk_managertitle":
                    $code = $v;
                    $queryCondition .= "mk_managertitle LIKE '" . $v . "%'";
                    break;
                case "mk_managerstate":
                    $code = $v;
                    $queryCondition .= "mk_managerstate LIKE '" . $v . "%'";
                    break;
                case "mk_managercity":
                    $code = $v;
                    $queryCondition .= "mk_managercity LIKE '" . $v . "%'";
                    break;
                
            }
        }
    }
}

$orderby = " ORDER BY mk_id desc";
$sql     = "SELECT * FROM manager " . $queryCondition;
$href    = 'managersearchlisting.php';

$perPage = 3;
$page    = 1;
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
$start = ($page - 1) * $perPage;
if ($start < 0)
    $start = 0;

$query  = $sql . $orderby . " limit " . $start . "," . $perPage;
$result = $db_handle->runQuery($query);

if (!empty($result)) {
    $result["perpage"] = showperpage($sql, $perPage, $href);
}



?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="Styles/w3.css">
<link rel="stylesheet" href="Styles/Teal.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Roboto'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="Pagenationstyle.css" type="text/css">
<style>
html,body,h1,h2,h3,h4,h5,h6 {font-family: "Roboto", sans-serif}


</style>
<body class="w3-light-grey">


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



<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">       
  <!-- The Grid -->
  <div class="w3-row-padding">
  
    <!-- Left Column -->
    <div class="w3-quarter">
    
<div class="w3-white w3-text-grey w3-card-4">
        <!--<div class="w3-container">
           
 <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-comments-o fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>Placeholder For Search Filter<hr> </h2>
               
   
        </div>-->
    </div>

    <!-- End Left Column -->
    </div>

    <!-- Center Column -->
    <div class="w3-threequarter">
   
<!--<div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">
            <div class="w3-container w3-padding">
               <p contenteditable="true" class="w3-border w3-padding w3-opacity ">Search</p>
              <button type="button" class="w3-button w3-theme"><i class="fa fa-pencil "></i>  Post</button>
            </div>
          </div>
         </div>
           <br>-->

<div class="w3-white w3-text-grey w3-card-4">
        <div class="w3-container">                
          <p class="w3-text w3-padding-16"><b>Results for your search</b></p>
 


<form name="frmSearch" method="post" action="managersearchlisting.php">
<?php
foreach ($result as $k => $v) {
    if (is_numeric($k)) {
?>
          
<li class="w3-bar">
  
<a href="/managerprofile.php?mk_id= <?php echo $result[$k]["mk_id"];?>" class="w3-button w3-green w3-round w3-medium w3-padding-small w3-right">View Profile</a>

<a href="/managerprofile.php?mk_id= <?php echo $result[$k]["mk_id"];?>"</a><img src="Images/Avatar4.png" class="w3-bar-item w3-circle" style="width:110px">

  <div class="w3-bar-item">
    <span class="w3-large w3-text-theme"><b><?php echo $result[$k]["mk_managerfirst"];?> <?php echo $result[$k]["mk_managerlast"];?></b>
    </span><br>
    <span><?php echo $result[$k]["mk_managercompany"];?></span><br>
    <span><?php echo $result[$k]["mk_managertitle"];?></span><br>
    <span><?php echo $result[$k]["mk_managerstate"];?>, <?php echo $result[$k]["mk_managercity"];?>
    </span><br>
   
  </div>
</li>
            
<hr>  
 <p><a href="#" target="_blank"></a></p>
					
					<?php
    }   
}
if (isset($result["perpage"])) {
?>
<br>
<br>
<style>.center {text-align: center;}</style>
<div class="center">
<?php    echo $result["perpage"];?>
<br>
<br>
</div>

<?php

}
?>
         
       
      </div>
      </div>
      </div>
</form>
      

    <!-- End Center Column -->

        <!-- Right Column -->
    <div class="w3-quarter">
    
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
     <p class="w3-text w3-padding-16"><b>Narrow your results</b></p>
          
                   

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
</body>
</html>
