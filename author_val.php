<?php
	if($_SESSION['role'] != "author")
			  {
				 header("location:error.php");
			  }
 ?>