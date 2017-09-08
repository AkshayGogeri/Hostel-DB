<html>
 <head> 
 <title>Update New Record in MySQL Database Local_Guardian Table</title>
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
if(isset($_POST['name']))
{
	echo "hello1";
	$name=$_POST["name"];
	$sql="Update Local_Guardian set lg_name='$name' where usn='$usn'";
	$r=mysqli_query($conn,$sql);
}
if(isset($_POST["rel"]))
{

	echo "hello2";
	$rel=$_POST["rel"];
	$sql="Update Local_Guardian set relation='$rel' where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST['st']))
{
	echo "hello3";
	$street=$_POST["st"];
	$sql="Update Local_Guardian set street='$street' where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST['loc']))
{
	echo "hello4";
	$locality=$_POST["loc"];
	$sql="Update Local_Guardian set locality='$locality' where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST['cty']))
{
	echo "hello5";
	$city=$_POST["cty"];
	$sql="Update Local_Guardian set city='$city' where usn='$usn'";
	mysqli_query($conn,$sql);
}

echo "Update Successful";
header('Location:LG_U.php');
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>UPDATE INTO Local Guardian</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter the Student Usn" class="form-control" required> 
<br/>
 <input name="name" type="text" id="name" placeholder="Local  Guardian  new Name" class="form-control" required> 
<br/>
 <input name="rel" type="text" id="rel" placeholder="Enter new the Relation" class="form-control" required> 
<br/>
 <input name="st" type="text" id="st" placeholder="Enter  the new Street" class="form-control" required> 
<br/>
 <input name="loc" type="text" id="loc" placeholder="Enter the new location" class="form-control" required> 
<br/>
 <input name="cty" type="text" id="cty" placeholder="Enter the new City" class="form-control" required> 
<br/>
 <input name="add" type="submit" id="add" value="Update" class="btn btn-success btn-lg" required> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 