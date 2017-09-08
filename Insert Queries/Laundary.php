<html>
 <head> 
 <title>Add New Record in MySQL Database Laundary Table</title>
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
$b_no=$_POST["b_no"];
$num=$_POST["num"];
$sql = "INSERT INTO Laundry ".  
      "(usn,book_num,no_of_clothes) ". 
	  "VALUES ".   
	  "('$usn','$b_no','$num')"; 
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
<br/><br/><h1>INSERT INTO LAUNDRY TABLE</h1><br/>
 <input name="usn" type="text" id="usn" placeholder="Enter Student USN" class="form-control"> 
<br/>
 <input name="b_no" type="text" id="b_no" placeholder="Laundry Book number" class="form-control"> 
<br/>
 <input name="num" type="text" id="num" placeholder="Enter Number of clothes given for laundry" class="form-control"> 
 <br/>
 <input name="add" type="submit" id="add" value="Add"class="btn btn-success btn-lg"> 
 </td>
 </tr>
 </table>
 </form>
 <?php
 } 
 ?>
 </body>
 </html> 