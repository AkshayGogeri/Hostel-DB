<html>
<head>
<title>QUERIES</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
 $dbhost = 'localhost'; 
 $dbuser = 'root';
 $dbpass = ''; 
 $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
 if(! $conn )
 { 
 die('Could not connect: ' . mysqli_error()); 
 } 

mysqli_select_db($conn,'h_manage'); 
if(isset($_POST['1']))
{
$sql = "SELECT * FROM Hostel";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"  class=\"table table-bordered\"><tr><td>Hostel Block Num</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td></tr> ";
 }
 echo "</table>";
 echo "Fetched data successfully\n";
}
else if(isset($_POST['2']))
{
	$sql = "SELECT * FROM hostel_rooms";  
	$retval = mysqli_query($conn,$sql );
	if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"  class=\"table table-bordered\"><tr><td>Hostel Block Num</td><td>Room Num</td></tr>";
	while($row = mysqli_fetch_array($retval)) 
	{ 
	echo "<tr><td>{$row[0]}  </td> ".  
	"<td>Room num :{$row[1]}  </td></tr> ";
	}
	echo "</table>";
	echo "Fetched data successfully\n";
}
else if(isset($_POST['3']))
{
	$sql = "SELECT * FROM messs";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"  class=\"table table-bordered\"><tr><td>Mess_id</td><td>Mess Name</td><td>Block Num</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ". 
"<td>{$row[1]}  </td> " .
"<td>{$row[2]} </td></tr>";
 }
 echo "</table>";
 echo "Fetched data successfully\n";
}
else if(isset($_POST['4']))
{
	$sql = "SELECT * FROM Manager";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\" class=\"table table-bordered\"><tr><td>Manager ID number</td><td>Manager Name</td><td>Manager for Block Num</td><td colspan=\"4\">Phone numbers</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ". 
	"<td>{$row[1]} </td>".
	"<td> {$row[2]} </td>";

$temp="SELECT ph_no FROM manager_ph_num WHERE Mgr_id='$row[0]'";
 $temp1=mysqli_query($conn,$temp);
  if(! $temp1 )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
 //echo "<table border=\"1\"><tr><td>PH_no's are:</td></tr>";
 while($r=mysqli_fetch_array($temp1))
 {
	 echo "<td>$r[0] </td>";
 }
 //echo "</table>";
 	 }
	 echo "</tr></table>";
 echo "Fetched data successfully\n";
}
else if(isset($_POST['5']))
{
	$sql = "SELECT * FROM Student";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
echo "<table border=\"1\" class=\"table table-bordered\"><tr><td>usn</td><td>Student Name</td><td>Dept Name</td><td>mess_id</td><td>Block_num</td><td>Room_num</td><td colspan=\"3\">Phone numbers</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]} </td> ".   
 "<td>{$row[1]}</td> ".
 "<td>{$row[2]}  </td>".
 "<td>{$row[3]}  </td> ".
 "<td>{$row[4]} </td> ".
 "<td>{$row[5]} </td>";
 
 $temp="SELECT ph_no FROM student_ph_no WHERE usn='$row[0]'";
 $temp1=mysqli_query($conn,$temp);
  if(! $temp1 )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
// echo "<table border=\"1\"><tr><td>PH_no's are</td></tr>";
 while($r=mysqli_fetch_array($temp1))
 {
	 echo "<td>$r[0] </td>";
 }
 
 echo "</tr>";
 }
 echo "</table>";
 echo "Fetched data successfully\n";
}
else if(isset($_POST['6']))
{
	$sql = "SELECT * FROM student_transaction";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
echo "<table border=\"1\" class=\"table table-bordered\"><tr><td>usn</td><td>reciept_num</td><td>fees_paid</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ".  
	"<td>{$row[1]} </td>".
	"<td>{$row[2]}  </td></tr>";
 }
 echo "</table>Fetched data successfully\n";
}
else if(isset($_POST['7']))
{
	$sql = "SELECT * FROM local_guardian";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\" class=\"table table-bordered\"><tr><td>usn</td><td>Local Guardian name</td><td>relation</td><td>street</td><td>locality</td><td>city</td><td colspan=\"1\">Phone numbers</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ".   
 "<td>{$row[1]}  </td> ".
 "<td>{$row[2]}  </td> ".
 "<td>{$row[3]}  </td> ".
 "<td>{$row[4]}  </td> ".
 "<td>{$row[5]}  </td>";
 
 $temp="SELECT ph_no FROM lg_ph_no WHERE usn='$row[0]' and lg_name='$row[1]'";
 $temp1=mysqli_query($conn,$temp);
  if(! $temp1 )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
 //echo "<table border=\"1\"><tr><td>PH_no's are:</td></tr>";
 while($r=mysqli_fetch_array($temp1))
 {
	 echo "<td>$r[0] </td>";
 }
 
 echo "</tr>";
 }
 echo "</table>Fetched data successfully\n";
}
else if(isset($_POST['8']))
{
	header("Location:Complex_Q.php");
}
else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">
<div><h3><b>DISPLAY ALL BLOCKS OF HOSTEL</b></h3>

<input name="1" type="submit" id="add" value="show"  class="btn btn-primary btn-lg"/></div><br><br>

<div><h3><b>DISPLAY ALL ROOMS WITH RESPECTIVE BLOCKS</B></h3>
<input name="2" type="submit" id="add" value="show" class="btn btn-info btn-lg"/></div><br><br>

<div><h3><b>DISPLAY ALL MESSES</b></h3>

<input name="3" type="submit" value="show"  class="btn btn-success btn-lg"/></div><br><br>

<div><h3><b>DISPLAY ALL MANAGERS WITH DETAILS</b><h3>

<input name="4" type="submit" value="show"  class="btn btn-danger btn-lg"/></div><br><br>


<div><h3><b>DISPLAY THE STUDENTS WITH DETAILS</b><h3>

<input name="5" type="submit" value="show"class="btn btn-primary btn-lg"/></div><br><br>


<div><h3><b>DISPLAY ALL TRANSACTIONNS</b><h3>
<input name="6" type="submit" value="show" class="btn btn-info btn-lg"/></div><br><br>

<div><h3><b>LIST ALL LOCAL_GUARDIAN OF STUDENTS</b><h3>
<input type="submit" name="7" value="show" class="btn btn-success btn-lg"/>  </div><br><br>

<br/><br/>
<div><h3><b>Some Complex Queries</b><h3>
<input type="submit" name="8" value="show" class="btn btn-Danger btn-lg"/>  </div><br><br>
</form>


<?php
}
?>
</body>
</html>