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
$name=$_POST["name"];
$block=$_POST["block_no"];
$sql = "INSERT INTO Manager ".  
      "(mgr_id,Mgr_name,block_num) ". 
	  "VALUES ".   
	  "('$id','$name','$block')"; 
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
<br/><br/><h1>INSERT INTO THE MANAGER TABLE</h1></br>
 <input name="id" type="text" id="id" placeholder="Enter Manager ID" class="form-control"> 
<br/>
 <input name="name" type="text" id="name" placeholder="Enter Manager Name" class="form-control"> 
<br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number he is manager for" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 