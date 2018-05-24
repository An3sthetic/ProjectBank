<?php include 'redirect.php' ?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Member Validation</title>
	<link href="style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="jquery.dataTables.min.css">

</head>
<body>

<div class="header"> <img class="logo"  src="images/main.png" />
  <table class="table" width="200" border="0">
    <tr>
	    <th scope="col">

        <a href="<?php echo $home;?>">
        <input type="button" class="button"  value="Home">
        </a>
        </th>
      <th scope="col">
        <input type="button" class="button"  value="back" onclick="history.back(-1)">
        </th>
	<th scope="col"><a href="login.php">
        <input type="button" class="button"  value="Log out">
		
        </a></th>
    </tr>

  </table>
  </div>
	<div style="width:1000px; height:500px; margin:0 auto; border:1px solid #000; background-color:#CCC;">
      <h1 style=" margin-left:350px;">Member Validation</h1>
      <hr/>

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
			echo " <table id=\"example\" class=\"display\" cellspacing=\"3\" width=\"100%\">";
			echo"<thead>"; 
			echo"<tr>";			
			echo"<th>Id</th>";  
			echo"<th>Name</th>";  
			echo"<th>Type</th>";
			echo"<th>Status</th>";			
			echo"</tr>";  
			echo"</thead>"; 
            echo "</tr>";
            while($row = mysqli_fetch_array($result)){
			
            echo"<tr>";
			echo"<th>".$row['id']."</th>";  
			echo"<th>".$row['name']."</th>";  
			echo"<th>".$row['type']."</th>"; 
			echo"<th>".'<form action="validate.php" method="post"enctype="multipart/form-data"><input type="hidden"  name="id" value="'.$row['id'].'"><select name="approval"><option value="approved">approved</option><option value="rejected">rejected</option></select><input type="submit" value="Submit"></form>'."</th>"; 			
		    
			echo"</tr>";  
            }
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
  <script type="text/javascript" charset="utf8" src="jquery.dataTables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="jquery-1.8.2.min.js"></script>
  <script>
  $(function(){
    $("#example").dataTable();
  })
  </script>
					
		</div>	

</body>


</html>