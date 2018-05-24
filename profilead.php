<?php include 'redirect.php';
include 'admin_val.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Profile</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      
    <link rel="stylesheet" href="css/magnific-popup.css">                                     
    <link rel="stylesheet" href="css/templatemo-style.css">                                   


</head>

    <body id="top" class="home">
       
        <div class="container-fluid">
            <div class="row">
              
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
                            <a href="index.php" class="nav-link external">Log Out</a>
                        </li>
                        </ul>

                    </div>
                  
                </nav>

              </div>  

           </div>
 <div class="row gray-bg">
              <div id="tm-section-1" class="tm-section">
                
                    <h1 class="text-xs-center blue-text tm-page-2-title">Profile Info</h1>           
                
              </div>                
            </div>


            <div class="row gray-bg">
                
                <div id="tm-section-2" class="tm-section">
                    <div class="tm-container tm-container-wide">
                        <div class="tm-news-item">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-news-item-img-container">
 <?php
 include 'dbconnect.php';
					$c_id=$_POST['crs'];
					$u_id= $_SESSION['id'];
					$crs_num=0;
					if( $c_id==""or $u_id=="")
					{
					

					}
					
					else
					{
						$sql4="SELECT COUNT(c_id) FROM `user_info` WHERE u_id='$u_id'";
						$result4=mysqli_query($link, $sql4);
						        if(mysqli_num_rows($result4) > 0){
							while($row4 = mysqli_fetch_array($result4)){
								$crs_num=$row4['COUNT(c_id)'];
						}
            
						mysqli_free_result($result);
						} 
						
						if($crs_num==0){
						$sql1="INSERT INTO `user_info` VALUES ('$u_id', '$c_id');";
						$result1=mysqli_query($link, $sql1);
						if(isset($result1)){
						echo "Course Successfully Inserted.";
						}
						}
						else{
						$sql1="UPDATE `user_info` SET `c_id`='$c_id' WHERE  `u_id`='$u_id'";
						$result1=mysqli_query($link, $sql1);
						if(isset($result1)){
						echo "Course Successfully Updated.";
						}
						}
							
						}

					
					
 
 
 
    $sql = "SELECT * FROM user where id=".$_SESSION['id'].";";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){

            
			
			echo"<p>ID:".$row['id']."</p>";  
			echo"<p>Name:".$row['name']."</p>";   
			echo"<p>Type:".$row['type']."</p>";   
			echo"<p>Password:".$row['password']."</p>";  
		    echo"Courses:";
            }
            
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    
	$sql2 = "SELECT * FROM user_info where u_id=".$_SESSION['id'].";";

    if($result2 = mysqli_query($link, $sql2)){

        if(mysqli_num_rows($result2) > 0){

            while($row2 = mysqli_fetch_array($result2)){

			echo $row2['c_id'];
		    
            }
            
            mysqli_free_result($result2);
        } else{
            echo "You have not taken any course yet.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
    }

    ?>  
    </div>
                            
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-news-container">
    <form action="profilead.php" method="post" class="tm-contact-form">                                
    <div class="form-group col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 tm-form-group-left">
	<h5 class="tm-news-title dark-gray-text">Select Courses:</h5>
	<select class="form-control" name="crs">
    <?php 
	$sql3 = "SELECT * FROM course";
    if($result3 = mysqli_query($link, $sql3)){
        if(mysqli_num_rows($result3) > 0){

            while($row3 = mysqli_fetch_array($result3)){
				echo '<option value="'.$row3['course_id'].'">'.$row3['course_id'].'('.$row3['course_name'].')</option>'; 			
		    
            }
            mysqli_free_result($result3);
        } else{

            echo "\nNo Eligible Courses Found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
    }
    
	?>
    </div>
	<p> <input type="submit" name="submit"  class="btn tm-light-blue-bordered-btn pull-xs-right" value="Submit"/>     </p>                        
    </form>  
    </div>
    </div>
	</div>                    
    </div>

           </div>
        </div> 
        
        <script src="js/jquery-1.11.3.min.js"></script>             <!-- jQuery (https://jquery.com/download/) -->
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> <!-- Tether for Bootstrap, http://stackoverflow.com/questions/34567939/how-to-fix-the-error-error-bootstrap-tooltips-require-tether-http-github-h --> 
        <script src="js/bootstrap.min.js"></script>                 <!-- Bootstrap (http://v4-alpha.getbootstrap.com/) -->
        <script src="js/jquery.singlePageNav.min.js"></script>      <!-- Single Page Nav (https://github.com/ChrisWojcik/single-page-nav) -->
        <script src="js/jquery.magnific-popup.min.js"></script>     <!-- Magnific pop-up (http://dimsemenov.com/plugins/magnific-popup/) -->
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