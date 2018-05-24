<?php include'redirect.php';
include'author_val.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Author</title>

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
                            <a href="<?php echo $prf;?>" class="nav-link external">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a href="p_insert.php" class="nav-link external">Insert Project</a>
                        </li>
                        <li class="nav-item">
                            <a href="authormodify.php" class="nav-link external">Modify Project</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link external">Log out</a>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    

        
            <div class="row">
                <div class="tm-section" id="tm-section-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h3 class="blue-text">All Project List</h3>
 <?php

include 'redirect.php';
include 'dbconnect.php';
    $sql = "SELECT * FROM `project`,`user_info` WHERE `project`.`type`=`user_info`.`c_id` AND `user_info`.`u_id`=".$_SESSION['id'].";";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){
			echo " <table class=\"table table-striped tm-full-width-large-table\" >";
			echo"<thead>"; 
			echo"<tr>";
			
			echo"<th>title</th>";  
			echo"<th>type</th>";  
			echo"<th>executive_summary</th>"; 
			echo"<th>author</th>"; 
			echo"<th>link</th>"; 
			echo"<th>supervisor</th>"; 			
		    echo"</tr>";  
		    echo"</thead>"; 
            echo "</tr>";

            while($row = mysqli_fetch_array($result)){

            echo"<tr>";
			
			echo"<th>".$row['title']."</th>";  
			echo"<th>".$row['type']."</th>";  
			echo"<th>".$row['executive_summary']."</th>";  
			echo"<th> ".$row['author']."</th>";
			echo"<th><a href=".$row['link'].">".$row['link']."</a></th>";			
			echo"<th> ".$row['supervisor']."</th>";	  
		    echo"</tr>";  
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }
  

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
              

                $('#tmNavbar a').click(function(){
                    $('#tmNavbar').collapse('hide');
                });

              

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