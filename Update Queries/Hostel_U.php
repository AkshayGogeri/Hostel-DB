<html>
 <head> 
 <title>Update the record in MySQL Database Hostel Table</title>
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
$b=$_POST["new_b_no"];
$sql = "Update Hostel set ".  
      "block_num='$b' where block_num='$block'"; 
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
<br/><br/><h1>UPDATE FROM HOSTEL TABLE</h1><br/>
 <input name="block_no" type="text" id="block_no" placeholder="Enter the Block Number need to be changed" class="form-control" required> 
 <br/> <input name="new_b_no" type="text" id="new_b_no" placeholder="Enter the Block's new value" class="form-control" required> 

<br/>
 <input name="add" type="submit" id="add" value="Update" class="btn btn-info btn-lg"> 
 </td>
 </tr>
 </table>
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 