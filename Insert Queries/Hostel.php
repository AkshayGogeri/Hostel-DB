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
$sql = "INSERT INTO Hostel (block_num) VALUES ('$block')"; 
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
<br/><br/><h1>INSERT INTO HOSTEL TABLE</h1><br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number" class="form-control" > 
<br/>
 <input name="add" type="submit" id="add" value="Add" class="btn btn-success btn-lg"> 
 </td>
 </tr>
 </table>
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 