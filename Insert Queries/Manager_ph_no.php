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
$id=$_POST["id"];
$pno=$_POST["pno"];
$sql = "INSERT INTO manager_ph_num".  
      "(Mgr_id,ph_no) ". 
	  "VALUES ".   
	  "('$id','$pno')"; 
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
 <br/><br/><h1>Insert INTO Manager Table</h1><br/>
 <input name="id" type="text" id="id" placeholder="Enter Manager ID" class="form-control"> 
<br/>
 <input name="pno" type="text" id="pno" placeholder=" Enter Manager Phone Number" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 