<html>
 <head> 
 <title>Delete a Record in MySQL Database Hostel Table</title>
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

$usn=$_POST["usn"];
$sql = "DELETE FROM Student 
    WHERE usn='$usn'"; 
$retval = mysqli_query($conn,$sql);
if(!$retval)
	die("could not delete data".mysqli_error($conn));
else
	echo "Deleted data successfully\n";
$sql1 = "DELETE FROM student_ph_no 
    WHERE usn='$usn'"; 
$retval1 = mysqli_query($conn,$sql1);
if(!$retval1)
	die("could not delete data".mysqli_error($conn));
else
	echo "Deleted data successfully\n";

$sql2 = "DELETE FROM student_transaction
    WHERE usn='$usn'"; 
$retval2 = mysqli_query($conn,$sql2);
if(!$retval2)
	die("could not delete data".mysqli_error($conn));
else
	echo "Deleted data successfully\n";

$sql3 = "DELETE FROM laundry 
    WHERE usn='$usn'"; 
$retval3 = mysqli_query($conn,$sql3);
if(!$retval3)
	die("could not delete data".mysqli_error($conn));
else
	echo "Deleted data successfully\n";
mysqli_close($conn);
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>Student Table</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter the Student usn to be deleted" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="delete" class="btn btn-success btn-lg"> 
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 