<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project List</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   <!-- Google web font "Open Sans" -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                <!-- Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      <!-- Bootstrap style -->
    <link rel="stylesheet" href="css/magnific-popup.css">                                     <!-- Magnific pop up style -->
    <link rel="stylesheet" href="css/templatemo-style_p.css">                                   <!-- Templatemo style -->

</head>

    <body id="top" class="home">
       
        <div class="container-fluid">
            <div class="row">
              
                <div class="tm-navbar-container bg-inverse">
                

                <nav class="navbar navbar-full navbar-fixed-top">

                    <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
                        &#9776;
                    </button>
                        
                    <div class="collapse navbar-toggleable-sm" id="tmNavbar">                            

                        <ul class="nav navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link external" href="login.php">Login</a>
                            </li>
							<li class="nav-item">
                                <a class="nav-link external" href="registration.php">Registration</a>
                            </li>
                        </ul>

                    </div>
                  
                </nav>
  <?php
include 'dbconnect.php';
	$ty=$_GET['type'];
	?>
              </div>  
			<div class="row">
                <div class="tm-intro">                            
                  <h2 class="blue-text tm-title text-xs-center">Projects of <?php echo $ty;?></h2>
                </div>
            </div>  
			  
<div class="row gray-bg">
  <?php
    $sql = "SELECT title,type,executive_summary FROM project where type='$ty';";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
			
			echo" <div id=\"tm-section-2\" class=\"tm-section\">"; 
			echo"<div class=\"tm-container tm-container-wide\">";			
			echo"<div class=\"tm-news-item\">";  
			echo"<div class=\"col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-news-container flex-order-1\">";  
			echo"<h2 class=\"tm-news-title dark-gray-text\">Project Name:".$row['title']."</h2>"; 					  
			echo"<h4 class=\"tm-news-title dark-gray-text\">Course code:".$row['type']."</h4>";  
			echo"<p class=\"tm-news-text\">Executive Summary:".$row['executive_summary']."</p>"; 
            echo"</div>";
            echo"</div>";
			echo"</div>";  
			echo"</div>";  
					  

            }

            mysqli_free_result($result);
        } else{

            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);

    ?>
</div>
           
        </div> <!-- container-fluid -->
        
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