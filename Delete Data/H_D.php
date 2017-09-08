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

$block=$_POST["block_no"];
$sql = "DELETE FROM Hostel     
    WHERE block_num='$block'"; 
$retval = mysqli_query($conn,$sql);

if(!$retval)
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
<form method="post" action="<?php $_PHP_SELF ?>" >
  <br/><br/>
 <h1>Hostel Block Table<h1>
 
 <input name="block_no" type="text" id="block_no" placeholder="Enter the block_number" class="form-control"> 
 <br/>



 <input name="add" type="submit" id="add" value="delete"  class="btn btn-success btn-lg"> 
 
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 