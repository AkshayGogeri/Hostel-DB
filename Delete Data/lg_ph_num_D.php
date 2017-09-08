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
$n=$_POST["n"];
$pn=$_POST["pn"];
$sql1= "DELETE FROM lg_ph_no WHERE usn='$usn' and lg_name='$n' and ph_no='$pn'"; 
$retval1=mysqli_query($conn,$sql1);

if(!$retval1)
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
 <br/><br/><h1>Local Guardian Phone Number Table</h1>
 <br/>
 <input name="usn" type="text" id="usn" placeholder="Enter Student usn" class="form-control"> 
<br/>
 <input name="n" type="text" id="n" placeholder="Enter Local Guardian Name" class="form-control"> 
<br/>
 <input name="pn" type="text" id="pn" placeholder="Enter the Local Guardian number to be deleted" class="form-control"> 
 <br/>
 <input name="add" type="submit" id="add" value="delete" class="btn btn-success btn-lg"> 

 </form>
 <?php
 } 
 ?>
 </body>
 </html> 