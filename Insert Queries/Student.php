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
$name=$_POST["name"];
$dept=$_POST["dept"];
$id=$_POST["id"];
$block=$_POST["block_no"];
$room=$_POST["room_no"];
$sql = "INSERT INTO Student ".  
      "(usn,name,dept_name,mess_id,block_num,room_num) ". 
	  "VALUES ".   
	  "('$usn','$name','$dept','$id','$block','$room')"; 
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

<br/><br/><h1>INSERT INTO STUDENT</h1><br/>

 <input name="usn" type="text" id="usn" placeholder="Enter Student usn" class="form-control">
 <br/>
 <input name="name" type="text" id="name" placeholder="Enter Student Name" class="form-control"> 
<br/>
 <input name="dept" type="text" id="dept" placeholder="Enter the Dept Name" class="form-control"> 
<br/>
 <input name="id" type="text" id="id"placeholder="Enter the Mess ID Student has Taken" class="form-control"> 
<br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number the Student Is In" class="form-control"> 
</br>
 <input name="room_no" type="text" id="room_no" placeholder="Enter the Room Number the Student Is In" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add"class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 