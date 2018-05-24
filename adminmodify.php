<?php include 'redirect.php'; 
include 'admin_val.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modify Project(admin)</title>

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
<?php
include 'dbconnect.php';
			$sql="SELECT * FROM `project` WHERE `author`='".$_SESSION['user']."' or `supervisor`='".$_SESSION['user']."';";
			
			$result = mysqli_query($link, $sql);
			if (!$result) {
			die('Invalid query: ' . mysqli_error());
			}

			?>
            <div class="row">
                <div class="tm-section" id="tm-section-5">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h3 class="blue-text">All Project List</h3>
              
                        <table class="table table-striped tm-full-width-large-table">
                            <thead>
                                <tr>
									<th>Action</th>
                                    <th>Title</th>
                                    <th>Course code</th>
                                    <th>Execuive Summery</th>
                                    <th>Author</th>
									<th>Supervisor</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php

			while($row = mysqli_fetch_array($result))
			{
			
			?>
			
				<tr>
				<td><a href="p_update.php<?php $_SESSION['p_id']=$row['p_id'];$_SESSION['title']=$row['title'];$_SESSION['type']=$row['type'];$_SESSION['executive_summary']=$row['executive_summary'];$_SESSION['author']=$row['author'];$_SESSION['supervisor']=$row['supervisor']; ?>">Edit</a> | <a href="delete.php<?php $_SESSION['pid']=$row['p_id'];$_SESSION['link']=$row['link'];?>">Delete</a></td>
				<td><?php echo $row['title'] ?></td>
				<td><?php echo $row['type'] ?></td>
				<td><?php echo $row['executive_summary'] ?></td>
				<td><?php echo $row['author'] ?></td>
				<td><?php echo $row['supervisor'] ?></td>
				</tr>
			<?php
			}
			?>
                            </tbody>        
                        </table>
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