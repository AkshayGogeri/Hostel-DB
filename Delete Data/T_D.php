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
$rp=$_POST["rp"];


$sql2 = "DELETE FROM student_transaction WHERE usn='$usn' and reciept_num='$rp'"; 
$retval2 = mysqli_query($conn,$sql2);
if(!$retval2)
	die("could not delete data".mysqli_error($conn));
else if(mysqli_num_rows($retval)==0)
	echo "NO such data in the database";
else
	echo "Deleted data successfully\n";
mysqli_close($conn);

}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<br/><br/><h1>Student Transaction Table</h1>
 <br/>
 <input name="usn" type="text" id="usn" placeholder="Enetr the Student Usn" class="form-control"> 
<br>
 <input name="rp" type="text" id="rp" placeholder="Enter the reciept number" class="form-control"> 
<br/>
 <input name="add" type="submit" id="add" value="delete" class="btn btn-success btn-lg"> 
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 