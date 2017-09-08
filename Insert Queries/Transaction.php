<html>
 <head> 
 <title>Add New Record in MySQL Database Transaction Table</title>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>
 <?php

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
$r_no=$_POST["r_no"];
$fees=$_POST["fees"];
$sql = "INSERT INTO student_transaction ".  
      "(usn,reciept_num,fees_paid) ". 
	  "VALUES ".   
	  "('$usn','$r_no','$fees')"; 
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
<br/><br/><h1>INSERT INTO STUDENT TRANSACTION<h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter the Student Usn" class="form-control"> 
<br/>
 <input name="r_no" type="text" id="r_no" placeholder="Reciept Number" class="form-control"> 
<br/>
 <input name="fees" type="text" id="fees" placeholder="Fees Paid" class="form-control"> 
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