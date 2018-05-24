<?php include 'redirect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Update  Project</title>

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

                        <h2 class="blue-text tm-title text-xs-center">Project Updation Form</h2>
   <?php
  error_reporting(0);
include 'dbconnect.php';	
	
					$p_id=$_SESSION['p_id'];
					$title=$_POST['title'];
					$type=$_POST['type'];
					$e_sum=$_POST['e_sum'];
					$supervisor=$_POST['supervisor'];
					
					if($p_id==""or $title==""or $type==""or $e_sum==""or $supervisor=="")
					{
					}
					else
					{
					$sql="UPDATE  `projectbank`.`project` SET  `title` = '$title',`executive_summary` =  '$e_sum',`type` =  '$type',`supervisor` =  '$supervisor' WHERE  `project`.`p_id` ='$p_id' ";
					$result=mysqli_query($link, $sql);
						if(isset($result)){
						unset($_SESSION['p_id']);
						echo "Data Successfully Updated.";
						}
						else{
							echo "Error Occured.Please Try Again";
							
						}

					}
					
					?>
                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                            <form action="p_update.php" method="post" class="tm-contact-form"enctype="multipart/form-data">                                
                                <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-left">
                                   <p> <input type="text" id="title" name="title" class="form-control" placeholder="Title" value="<?php echo $_SESSION['title'];unset($_SESSION['title']);?>" required/> </p>

                                   <p> <input type="text" id="type" name="type" class="form-control" placeholder="Course Code" value="<?php echo $_SESSION['type'];unset($_SESSION['title'])?>" required/></p>

                                   <p> <input type="text" id="supervisor" name="supervisor" class="form-control" placeholder="Supervisor" value="<?php echo $_SESSION['supervisor'];unset($_SESSION['supervisor'])?>" required/></p>
									
                                   <p> <textarea id="e_sum" name="e_sum" class="form-control" rows="6" placeholder="Executive Summary" value="<?php echo $_SESSION['executive_summary'];unset($_SESSION['executive_summary'])?>" required></textarea></p>
                                <input type="submit" name="Submit" id="Submit" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Submit" />
								<input name="cancel" type="reset" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Reset" />
                                
								</div>								
                            </form>   
                        </div> 
                        

                    </div>                    
                </section>

                

            </div> 
           
        </div> 
        
        
        
        <script src="js/jquery-1.11.3.min.js"></script>             
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> 
        <script src="js/bootstrap.min.js"></script>                 
        <script src="js/jquery.singlePageNav.min.js"></script>      
        <script src="js/jquery.magnific-popup.min.js"></script>     
        
        
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