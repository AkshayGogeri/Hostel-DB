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
$pno=$_POST["pno"];
$sql = "INSERT INTO student_ph_no ".  
      "(usn,ph_no) ". 
	  "VALUES ".   
	  "('$usn','$pno')"; 
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
<br/><br/><h1>Enter Student Phone Numbers</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter Student usn"class="form-control"> 
<br/>
 <input name="pno" type="text" id="pno" placeholder="Enter Student Phone Numbers" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 