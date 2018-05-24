<?php
	if($_SESSION['role'] != "superadmin")
			  {
				 header("location:error.php");
			  }
 ?>