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
$l=$_POST["l"];

$sql3 = "DELETE FROM laundry WHERE usn='$usn' and book_num='$l'"; 
$retval3 = mysqli_query($conn,$sql3);

if(!$retval3)
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
<br/><br/>
<h1>Laundry Table</h1>

 <input name="usn" type="text" id="usn" placeholder="Enter Student usn" class="form-control"> 
 <br/>
 <input name="l" type="text" id="l" placeholder="Enter Laundry Book Number" class="form-control"> 
 
<br/>

 <input name="add" type="submit" id="add" value="delete" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 