
  <?php
  session_start();
  if(isset($_SESSION['role']))
  {
	  session_destroy();
  }
	include 'dbconnect.php';
    $sql = "SELECT * FROM project group by type;";

    if($result = mysqli_query($link, $sql)){

        if(mysqli_num_rows($result) > 0){

			echo " <table id=\"example\" class=\"table table-striped tm-full-width-large-table\" cellspacing=\"3\" width=\"100%\">";
			echo"<thead>"; 
			echo"<tr>";

			
  
			echo"</tr>";  
		   echo"</thead>"; 

                echo "</tr>";

            while($row = mysqli_fetch_array($result)){

               echo"<tr>";

			//echo"<th>".$row['type']."</th>";  
			 echo "<th><a href='p.php?type=".$row['type']."'>".$row['type']."</a></th>";
			

			
			  
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


    mysqli_close($link);

    ?>