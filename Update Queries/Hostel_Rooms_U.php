<html>
 <head> 
 <title>Add New Record in MySQL Database Hostel Table</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <?php
extract( $_POST );
if(isset($_POST['add']))
{ 
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername, $username, $password);
if(!$conn)
	die("Connection Failed".mysqli_error($conn));
mysqli_select_db($conn,'h_manage');

$block=$_POST["block_no"];
$room=$_POST["room_no"];

$new_room=$_POST["new_r"];
$sql = "Update hostel_rooms set room_num='$new_room' where block_num='$block' and room_num='$room' ";
$retval = mysqli_query($conn,$sql);
if(!$retval)
	die("could not enter data ".mysqli_error($conn));
else
	echo "Entered data successfully\n";
mysqli_close($conn);
}

?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>Update INTO HOSTEL ROOMS TABLE</h1><br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number in the Hostel" class="form-control" required> 
<br/>
 <input name="room_no" type="text" id="room_no" placeholder="Enter the Room Numbers in this block" class="form-control" required> 
<br/>
<input name="new_r" type="text" id="room_no" placeholder="Enter the new Room Number which should be set" class="form-control"required> 
<br/>
 <input name="add" type="submit" id="add" value="Update"class="btn btn-info btn-lg"> 
 </td>
 </table>
 </form>
 
 </body>
 </html> 