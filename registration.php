 <?php
  error_reporting(0);
include 'dbconnect.php';

					$id=$_POST['id'];
					$name=$_POST['name'];
					$type=$_POST['type'];;
					$password=$_POST['password'];		
					if($id==""or $name==""or $type==""or $password=="")
					{
					}					
					else
					{

					$sql="INSERT INTO `projectbank`.`user` VALUES ('$id', '$name', '$type', '$password','pending');";
					$result=mysqli_query($link, $sql);
					if(isset($result)){

						echo "Data Successfully Saved.";
						}
					else
					{
						echo "Error.";
						
					}
					}
					
					?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Registration</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">               
    <link rel="stylesheet" href="css/bootstrap.min _registration.css">                         
    <link rel="stylesheet" href="css/magnific-popup.css">                                     
    <link rel="stylesheet" href="css/templatemo-style_form_registration.css">                                   


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
                                <a class="nav-link external" href="login.php">Login</a>
                            </li>
                        </ul>

                    </div>
                  
                </nav>

              </div>  

           </div>
           <div class="row">
                <div class="tm-intro">


                            
                        <h2 class="blue-text tm-title text-xs-center">Registration Form</h2>
                      
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form action="registration.php" method="post" class="tm-contact-form">    
									 
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-left">
								
                                    <p><input type="text" id="id" name="id" class="form-control" placeholder="User ID"  required/></p>

                                   <p> <input type="text" id="name" name="name" class="form-control" placeholder="Name"  required/></p>

                                    <p><input type="Password" id="password" name="password" class="form-control" placeholder="Password"  required/></p>
                                
								
								<p>
									<div class="form-type">
									<select name="type" >
									<option value="">Select...</option>
									<option value="admin">admin</option>
									<option value="author">author</option>
									< required/select>
									</div>
									</p>
									
								  </div>
                                <input type="submit" name="submit"  class="btn tm-light-blue-bordered-btn pull-xs-right" value="Submit"/>   
								<input name="cancel" type="reset" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Reset" />
								
                            </form>   
                        </div>


                </div>
            </div>

            
        
        <!-- load JS files -->
        
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="js/jquery.magnific-popup.min.js"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
        
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