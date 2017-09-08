<html>
 <head> 
 <title>Add New Record in MySQL Database Student Table</title>
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

if(isset($_POST["name"]))
{
	$name=$_POST["name"];
	$sql = "Update Student set ".  
      "name='$name'where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST["dept"]))
{
	$dept=$_POST["dept"];
	$sql = "Update Student set ".  
      "dept='$dept'where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST["id"]))
{
	$id=$_POST["id"];
	$sql = "Update Student set ".  
      "mess_id='$id'where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST["block_no"]))
{
	$block=$_POST["block_no"];
	$sql = "Update Student set ".  
      "block_num='$block' where usn='$usn'";
	mysqli_query($conn,$sql);
}
if(isset($_POST["room_no"]))
{
	$room=$_POST["room_no"];
	$sql = "Update Student set ".  
      "room_num='$room' where usn='$usn'";
	mysqli_query($conn,$sql);
}
mysqli_close($conn);
echo	"UPDATE SUCCESSFUL";
header('Location:Student_U.php');

}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">

<br/><br/><h1>UPDATE INTO STUDENT</h1><br/>

 <input name="usn" type="text" id="usn" placeholder="Enter Student usn Whose Record Need To be Updated" class="form-control" required>
 <br/>
 <input name="name" type="text" id="name" placeholder="Enter new Student Name,if change" class="form-control"> 
<br/>
 <input name="dept" type="text" id="dept" placeholder="Enter the new Dept Name,if change" class="form-control"> 
<br/>
 <input name="id" type="text" id="id"placeholder="Enter the new Mess ID Student has Taken,if change" class="form-control"> 
<br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the new Block Number the Student Is In,if change" class="form-control"> 
</br>
 <input name="room_no" type="text" id="room_no" placeholder="Enter the new Room Number the Student Is In,if change" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Update"class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 