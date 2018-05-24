<?php

include 'dbconnect.php';

if(isset($_POST['submit']))
{
	$uname=$_POST['txtname'];
	$pwd=$_POST['pwd'];


$sql="SELECT * FROM user WHERE id='$uname' and password='$pwd'";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){



            while($row = mysqli_fetch_array($result)){

              if($row['type']=="superadmin")
			  {
				  session_start();

				  $_SESSION['role'] = "superadmin";
				  $_SESSION['user'] = $row['name'];
				  $_SESSION['id'] =  $row['id'];
				  header("location:superadmin.php");
				  
			  }
			  else if($row['validation']=="pending")
			  {
				  echo "Your account is not approved yet";
			  }
			  else if($row['validation']=="rejected")
			  {
				  echo "Your account application is Rejected";
			  }
			else if($row['type']=="admin" && $row['validation']=="approved" )
			{
				session_start();

			  $_SESSION['role'] = "admin";
			  $_SESSION['user'] = $row['name'];
			  $_SESSION['id'] =  $row['id'];
			  header("location:admin.php");
			  exit();
			}
			else if($row['type']=="author" && $row['validation']=="approved")
			{
				session_start();

			  $_SESSION['role'] = "author";
			  $_SESSION['user'] = $row['name'];
			  $_SESSION['id'] =  $row['id'];
			  header("location:author.php");
			  exit();
		  }
        } 
    } 
	 else{
			 echo "Invalid Username and Password";
 
            }


    mysqli_close($link);
	
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                     <!-- Magnific pop up style -->
    <link rel="stylesheet" href="css/templatemo-style_form_login.css">                                   <!-- Templatemo style -->


</head>

    <body id="top" class="home">
       
        <div class="container-fluid">
            <div class="row">
              
                <div class="tm-navbar-container bg-inverse">
                
                <!-- navbar   -->
                <nav class="navbar navbar-full navbar-fixed-top">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                        &#9776;
                    </button>
                        
                    <div class="collapse navbar-toggleable-sm" id="tmNavbar">                            

                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link external" href="index.php">Home</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link external" href="registration.php">Registration</a>
                            </li>
                        </ul>

                    </div>
                  
                </nav>

              </div>  

           </div>

           <div class="row">
                <div class="tm-intro">

                                         
                       
                            
                        <h2 class="blue-text tm-title text-xs-center">Login Form</h2>
                      
                        
                            <form action="login.php" method="post" class="tm-contact-form">                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-left">
                                  <p>  <input type="text" id="txtname" name="txtname" class="form-control" placeholder="User ID"  required/> </p>

                                  <p>  <input type="Password" id="pwd" name="pwd" class="form-control" placeholder="Password"  required/> </p>
                                
                            
                               <p> <input type="submit" name="submit"  class="btn tm-light-blue-bordered-btn pull-xs-right" value="Login"/>     </p> 
								</div>								
                            </form>   

                                                                    
                   

                </div>
            </div>

            
        
        <!-- load JS files -->
        
        <script src="js/jquery-1.11.3.min.js"></script>            
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> 
        <script src="js/bootstrap.min.js"></script>                
        <script src="js/jquery.singlePageNav.min.js"></script>      
        <script src="js/jquery.magnific-popup.min.js"></script>    
        <!-- Templatemo scripts -->
        <script>     
       
            $(document).ready(function(){

                var mobileTopOffset = 54;
                var desktopTopOffset = 80;
                var topOffset = desktopTopOffset;

                if($(window).width() <= 767) {
                    topOffset = mobileTopOffset;
                }
                
                /* Single page nav
                -----------------------------------------*/
                $('#tmNavbar').singlePageNav({
                   'currentClass' : "active",
                    offset : topOffset,
                    'filter': ':not(.external)'
                }); 

                /* Handle nav offset upon window resize
                -----------------------------------------*/
                $(window).resize(function(){
                    if($(window).width() <= 767) {
                        topOffset = mobileTopOffset;
                    } 
                    else {
                        topOffset = desktopTopOffset;
                    }

                    $('#tmNavbar').singlePageNav({
                        'currentClass' : "active",
                        offset : topOffset,
                        'filter': ':not(.external)'
                    });
                });
                

                /* Collapse menu after click 
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');
                });

                /* Turn navbar background to solid color starting at section 2
                ---------------------------------------------------------------*/
                var target = $("#tm-section-2").offset().top - topOffset;

                if($(window).scrollTop() >= target) {
                    $(".tm-navbar-container").addClass("bg-inverse");
                }
                else {
                    $(".tm-navbar-container").removeClass("bg-inverse");
                }

                $(window).scroll(function(){
                   
                    if($(this).scrollTop() >= target) {
                        $(".tm-navbar-container").addClass("bg-inverse");
                    }
                    else {
                        $(".tm-navbar-container").removeClass("bg-inverse");
                    }
                });


                /* Smooth Scrolling
                 * https://css-tricks.com/snippets/jquery/smooth-scrolling/
                --------------------------------------------------------------*/
                $('a[href*="#"]:not([href="#"])').click(function() {
                    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') 
                        && location.hostname == this.hostname) {
                        
                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                        
                        if (target.length) {
                            
                            $('html, body').animate({
                                scrollTop: target.offset().top - topOffset
                            }, 1000);
                            return false;
                        }
                    }
                }); 

              
                /* Magnific pop up
                ------------------------- */
                $('.tm-img-grid').magnificPopup({
                    delegate: 'a', // child items selector, by clicking on it popup will open
                    type: 'image',
                    gallery: {enabled:true}            
                });            
            });

        </script>             

</body>
</html>