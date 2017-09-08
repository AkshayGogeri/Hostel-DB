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
if(isset($_POST["name"]))
{
	$name=$_POST["name"];
	$sql="Update Manager set Mgr_name='$name' where mgr_id='$id'";
	mysqli_query($conn,$sql);
}
if(isset($_POST["block_no"]))
{
	$block=$_POST["block_no"];
	$sql="Update Manager set block_num='$block' where mgr_id='$id'";
	mysqli_query($conn,$sql);
}
echo "Update Successful";
header('Location:Manager_U.php');
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>Update INTO THE MANAGER TABLE</h1></br>
 <input name="id" type="text" id="id" placeholder="Enter Manager ID need to be updated" class="form-control" required/> 
<br/>
 <input name="name" type="text" id="name" placeholder="Enter new Manager Name,if change" class="form-control"/> 
<br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the new Block Number he is manager for,if change" class="form-control"/> 
<br/>
 <input name="add" type="submit" id="add" value="Update" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 