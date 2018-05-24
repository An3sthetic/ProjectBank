<?php
	if($_SESSION['role'] != "admin")
			  {
				 header("location:error.php");
			  }
 ?>