<html>
 <head> 
 <title>Add New Record in MySQL Database Manager Table</title>
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
	die("Connection Failed".mysqli_error($conn));

mysqli_select_db($conn,'h_manage');
$usn=$_POST["usn"];
$name=$_POST["name"];
$pno=$_POST["p_no"];
$sql = "INSERT INTO lg_ph_no ".  
      "(usn,lg_name,ph_no) ". 
	  "VALUES ".   
	  "('$usn','$name','$pno')"; 
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
<br/><br/><h1>INSERTN INTO Local_Guardian Phone Numbers</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter Student Usn" class="form-control"> 
<br/>
 <input name="name" type="text" id="name" placeholder="Enter Local Guardian Name" class="form-control"> 
<br/>
 <input name="p_no" type="text" id="p_no" placeholder="Enter Local Guardian Phone Number" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 