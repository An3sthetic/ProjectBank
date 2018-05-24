<?php include 'redirect.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Member Validation</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:100,300,400">   
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">                
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      
    <link rel="stylesheet" href="css/templatemo-style.css">                                   

</head>
    <body id="top" class="page-2">

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

            <div class="row">
                <div class="tm-section" id="tm-section-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h3 class="blue-text">Member Validation</h3>
              
                        <table class="table table-striped tm-full-width-large-table">
							 <?php
  error_reporting(0);
include 'dbconnect.php';
				$id=$_POST['id'];
			$approval=$_POST['approval'];
			if(isset($id) && isset($approval)){
			
			$s = "UPDATE  `projectbank`.`user` SET  `validation` =  '$approval' WHERE  `user`.`id` ='$id';";
			$res = mysqli_query($link, $s);
			if(isset($res))
			{
				
				echo "Status successfully updated\n";
			}
		}
    $sql = "SELECT * FROM user where validation='pending';";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
			echo " <table id=\"example\" class=\"table table-striped tm-full-width-large-table\">";
			echo"<thead>"; 
			echo"<tr>";			
			echo"<th>Id</th>";  
			echo"<th>Name</th>";  
			echo"<th>Type</th>";
			echo"<th>Status</th>";			
			echo"</tr>";  
			echo"</thead>";
			echo"<tbody>";	
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
			
            echo"<tr>";
			echo"<th>".$row['id']."</th>";  
			echo"<th>".$row['name']."</th>";  
			echo"<th>".$row['type']."</th>"; 
			echo"<th>".'<form action="validate.php" method="post"enctype="multipart/form-data"><input type="hidden"  name="id" value="'.$row['id'].'"><select name="approval"><option value="approved">approve</option><option value="rejected">reject</option></select>  <input type="submit" class="btn tm-light-blue-bordered-btn pull-xs-right" value="Submit"></form>'."</th>"; 			
		    
			echo"</tr>";  
            }
			echo "</tbody>";
            echo "</table>";
            mysqli_free_result($result);
        } else{

            echo "\nNo User Registration request is pending.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
    mysqli_close($link);
	 ?>
                 </div>
                </div> <!-- tm-section -->        
            </div>
      

        <script src="js/jquery-1.11.3.min.js"></script>             
        <script src="https://www.atlasestateagents.co.uk/javascript/tether.min.js"></script> 
        <script src="js/bootstrap.min.js"></script>                
        <script src="js/jquery.singlePageNav.min.js"></script>     

        
        <script>     
         
            $(document).ready(function(){

                var mobileTopOffset = 54;
                var tabletTopOffset = 74;
                var desktopTopOffset = 79;
                var topOffset = desktopTopOffset;

                if($(window).width() <= 767) {
                    topOffset = mobileTopOffset;
                }
                else if($(window).width() <= 991) {
                    topOffset = tabletTopOffset;
                }
              
                /* Single page nav
                -----------------------------------------*/
                $('#tmNavbar').singlePageNav({
                    'currentClass' : "active",
                    offset : topOffset,
                    'filter': ':not(.external)'
                }); 

                if($(window).width() < 570) {
                    $('.tm-full-width-large-table').addClass('table-responsive');
                }
                else {
                    $('.tm-full-width-large-table').removeClass('table-responsive');   
                }
              

                /* Collapse menu after click 
                -----------------------------------------*/
                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');
                });

              
                /* Handle nav offset & table responsive upon window resize
                --------------------------------------------------------------*/
                $(window).resize(function(){
                    
                    if($(window).width() < 768) {
                        topOffset = mobileTopOffset;
                    } 
                    else if($(window).width() <= 991) {
                        topOffset = tabletTopOffset;
                    }
                    else {
                        topOffset = desktopTopOffset;
                    }

                    $('#tmNavbar').singlePageNav({
                        'currentClass' : "active",
                        offset : topOffset,
                        'filter': ':not(.external)'
                    });

                    if($(window).width() < 570) {
                        $('.tm-full-width-large-table').addClass('table-responsive');
                    }
                    else {
                        $('.tm-full-width-large-table').removeClass('table-responsive');   
                    }
                });
                          
            });

        </script>    
    </body>
</html>