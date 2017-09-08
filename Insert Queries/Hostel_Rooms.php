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
$sql = "INSERT INTO Hostel_Rooms ".  
      "(block_num,room_num) ". 
	  "VALUES ".   
	  "('$block','$room')"; 
$retval = mysqli_query($conn,$sql);
if(!$retval)
	die("could not enter data ".mysqli_error($conn));
else
	echo "Entered data successfully\n";
mysqli_close($conn);
}

?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>INSERT INTO HOSTEL ROOMS TABLE</h1><br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number in the Hostel" class="form-control"> 
<br/>
 <input name="room_no" type="text" id="room_no" placeholder="Enter the Room Numbers in this block" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="Add"class="btn btn-success btn-lg"> 
 </td>
 </table>
 </form>
 
 </body>
 </html> 