 <?php
 session_start();
			if($_SESSION['role'] == "superadmin")
			  {
				  $home="superadmin.php";
			  }
			else if($_SESSION['role'] == "admin")
			{
			  $home="admin.php";
			  $prf="profilead.php";
			}
			else if($_SESSION['role'] == "author")
			{
			   $home="author.php";
			   $prf="profileauth.php";
		    }
			else{
				session_destroy();
				 header("location:error.php");
			}
			error_reporting(0);
			
 ?>