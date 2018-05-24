<?php include 'redirect.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>delete notification</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      
    <link rel="stylesheet" href="css/magnific-popup.css">                                     
    <link rel="stylesheet" href="css/templatemo-style_pins.css">                                   


</head>

    <body id="top" class="home">
 
        <div class="container-fluid">
        <div class="tm-navbar-container tm-navbar-container-dark">
       
            <nav class="navbar navbar-full navbar-fixed-top bg-inverse">
                <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                    &#9776;
                </button>
                <div class="collapse navbar-toggleable-sm" id="tmNavbar">
                    <ul class="nav navbar-nav">
                        <li class="nav-item">
                            <a href="<?php echo $home;?>" class="nav-link external">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link external">Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>

            <div class="row gray-bg">
   
                <section id="tm-section-4" class="tm-section">
                    <div class="tm-container">
	<?php
error_reporting(0);
include 'dbconnect.php';

$p_id=$_SESSION['pid'];
if(isset($p_id)){
$sql = "DELETE FROM project WHERE p_id ='$p_id'";
$result = mysqli_query($link, $sql);
unlink($_SESSION['link']);
unset($_SESSION['pid']);
unset($_SESSION['link']);
if(isset($result))
{
	echo "<h2 class=\"blue-text tm-title text-xs-center\">Successfully Deleted</h2>";

}
}
else{
	
	echo "<h2 class=\"blue-text tm-title text-xs-center\">Encountered an error.Please try again</h2>";
}
?>
                    </div>                    
                </section>

            </div> 
           
        </div> 


</body>
</html>
