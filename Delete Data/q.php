 <html>
 <head> 
 <title>Delete a Record in MySQL Database Hostel Table</title>
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
mysqli_select_db($conn,'');
$sql=" ";
$retval3 = mysqli_query($conn,$sql);
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
DISPLAY ALL BLOCKS OF HOSTEL<br><br>

<input name="1" type="submit" id="add" value="show"/><br><br>


 </table>
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 