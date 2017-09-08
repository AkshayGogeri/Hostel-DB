<html>
 <head> 
 <title>Add New Record in MySQL Database Local_Guardian Table</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <?php

if(isset($_POST['add']))
{ 
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername, $username, $password);
if(!$conn)
	die("Connection Failed".mysqli_error());

mysqli_select_db($conn,'h_manage');
$usn=$_POST["usn"];
$name=$_POST["name"];
$rel=$_POST["rel"];
$street=$_POST["st"];
$locality=$_POST["loc"];
$city=$_POST["cty"];
$sql = "INSERT INTO Local_Guardian ".  
      "(usn,lg_name,relation,street,locality,city) ". 
	  "VALUES ".   
	  "('$usn','$name','$rel','$street','$locality','$city')"; 
$retval = mysqli_query($conn,$sql);
if(!$retval)
	die("could not enter data".mysqli_error($conn));
else
	echo "Entered data successfully\n";
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>INSERT INTO Local Guardian</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter the Student Usn" class="form-control"> 
<br/>
 <input name="name" type="text" id="name" placeholder="Local Guardian Name" class="form-control"> 
<br/>
 <input name="rel" type="text" id="rel" placeholder="Enter the Relation" class="form-control"> 
<br/>
 <input name="st" type="text" id="st" placeholder="Enter the Street" class="form-control"> 
<br/>
 <input name="loc" type="text" id="loc" placeholder="Enter the location" class="form-control"> 
<br/>
 <input name="cty" type="text" id="cty" placeholder="Enter the City" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 