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

if(isset($_POST['21']))
{
	$x=$_POST["u10"];
	
$sql="select ph_no from student_ph_no where usn in (select  usn from student where room_num in(select room_num from student where usn in(select usn from student_ph_no where ph_no='$x')) and block_num in(select block_num from student where usn in(select usn from student_ph_no where ph_no='$x')))";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>ph_no</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['second']))
{
$id=$_POST["id"];
$sql = "(SELECT SUM(fees_paid) FROM student_transaction where usn in".
		"(SELECT usn FROM student where block_num in".
		"(select block_num FROM Manager where Mgr_id='$id'))".
		")";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
echo "<table border=\"1\" class=\"table table-bordered\"><tr><td>Total amount</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td> {$row[0]}  </td></tr> ";
 }
 echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['twlv']))
{
$sql="select s1.name,s1.room_num,s1.mess_id from student s1,student s2 where ((s1.room_num=s2.room_num) and (s1.mess_id=s2.mess_id) and (s1.block_num=s2.block_num) and s1.usn!=s2.usn)";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>name</td><td>room_num</td><td>Mess_id</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['16']))
{
	$x=$_POST["u3"];
$sql="select Mgr_name from Manager where Block_num in(select Block_num from student where usn in(select usn from lg_ph_no where ph_no='$x'))";

$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>lg name</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['seventh']))
{

$sql=	"(select * from (select * from (select * from (student natural join messs))as temp1 natural join manager)as temp2 natural join student_transaction); ";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td><td>Mess_name</td><td>Manager_id</td><td>Manager_Name</td><td>Reciept Number</td><td>Amount Paid</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}


else if(isset($_POST['first']))
{
$sql = "SELECT * FROM student where mess_id in".
		"(SELECT mess_id FROM messs where mess_name='North')";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\">";
	echo "<tr><td>usn</td><td>name</td><td>dept_name</td><td>mess_id</td><td>bock_num</td><td>Room_num</td></tr>";

 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}</td>   ".  
	"<td>{$row[1]}</td> ".
	"<td>{$row[2]}</td>".
	"<td>{$row[3]} </td>".
	"<td>{$row[4]}</td>".
	"<td> {$row[5]}</td>";
echo "</tr>";
 }
echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['third']))
{
	$pno=$_POST["pno"];
$sql = "SELECT * FROM student where usn in".
		"(SELECT usn FROM student_ph_no where ph_no='$pno')";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ".  
	"<td>{$row[1]} </td>".
	"<td>{$row[2]}</td>".
	"<td>{$row[3]} </td>".
	"<td>{$row[4]}</td>".
	"<td>{$row[5]}</td></tr> ";
 }
  echo "</table>";
 echo "Query Executed primaryfully\n";
}
else if(isset($_POST['fourth']))
{
$sql = "SELECT * FROM student where usn not in".
		"(SELECT usn FROM student_transaction GROUP BY usn Having SUM(fees_paid)>=100000)";  
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>usn :{$row[0]}  </td> ".  
	"<td>name: {$row[1]} </td>".
	"<td>dept_name: {$row[2]}</td>".
	"<td>mess_id: {$row[3]} </td>".
	"<td>block_num: {$row[4]}</td>".
	"<td>Room_num: {$row[5]}</td></tr>";
 }
  echo "</table>";
 echo "Query Executed primaryfully\n";
}
else if(isset($_POST['fifth']))
{
$sql="(select usn,(100000-fees_paid) from student_transaction where fees_paid in (select sum(fees_paid) as fees_paid from student_transaction group by usn having fees_paid<100000))";
#$sql=	"SELECT * FROM student Natural join(SELECT usn,SUM(fees_paid) as sum_f FROM student_transaction GROUP BY usn) as xyz";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>Balance Amount</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ".  
	"<td>{$row[1]}</td> </tr>";
 }
  echo "</table>";
 echo "Query Executed primaryfully\n";
}
else if(isset($_POST['sixth']))
{
$x=$_POST["u"];
$sql=	"select * from student where Room_num in (select Room_num from student where usn='$x')and usn!='$x' and block_num in(select Block_num from student where usn='$x')";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td></tr>";
 while($row = mysqli_fetch_array($retval)) 
 { 
 echo "<tr><td>{$row[0]}  </td> ".  
	"<td>{$row[1]} </td>".
	"<td>{$row[2]}</td>".
	"<td>{$row[3]} </td>".
	"<td>{$row[4]}</td>".
	"<td>{$row[5]}</td></tr>";
 }
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['eight']))
{
$usn=$_POST["u1"];
$sql=	"(select * from (select * from (select * from (student natural join messs))as temp1 natural join manager)as temp2 natural join student_transaction where usn='$usn'); ";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td><td>Mess_name</td><td>Manager_id</td><td>Manager_Name</td><td>Reciept Number</td><td>Amount Paid</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed succesffully\n";
}
else if(isset($_POST['nine']))
{
#$sql=	"(select usn from (select * from (select * from (select * from (student natural join messs))as temp1 natural join manager)as temp2 natural join student_transaction)as t where usn not exists(select usn form student_transaction) where usn in(select usn from student where usn not in (select usn from student_transaction))); ";
$sql="select usn from student where usn not in (select usn from student_transaction)";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	#echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>name</td><td>mess_id</td><td>block_num</td><td>room_num</td><td>Mess_name</td><td>Manager_id</td><td>Manager_Name</td><td>Reciept Number</td><td>Amount Paid</td></tr>";
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td></tr>";
	while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed successfully\n";
}
else if(isset($_POST['tenth']))
{
$x=$_POST["w"];
$retval = mysqli_query($conn,$x );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
echo "<table border=\"1\"class=\"table table-bordered\">";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
 echo "</table>";
 echo "Query Executed successfully\n";
}
else if(isset($_POST['eleven']))
{
$sql="select room_num,block_num from hostel_rooms where (room_num,block_num) not in (select room_num,block_num from student)";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>block_num</td><td>room_num</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['15']))
{
	$x=$_POST["u2"];
	$sql="select mess_name from messs where mess_id in(select mess_id from student where usn in (select usn  from student_transaction where reciept_num='$x'))";

$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>mess name</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['18']))
{
	$x=$_POST["u5"];
$sql="select name from student where block_num in(select block_num from manager where mgr_id='$x')";

$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>student name</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['19']))
{
	$x=$_POST["u6"];
	$y=$_POST["u7"];
$sql="select usn,name,dept_name from student where room_num='$x' and block_num='$y'"; 
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>name</td><td>dept</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else if(isset($_POST['20']))
{
	$x=$_POST["u8"];
	$y=$_POST["u9"];
$sql="select usn,ph_no from student_ph_no where usn in(select usn from student where mess_id in(select mess_id from messs where mess_name='$x'and block_num='$y'))";
$retval = mysqli_query($conn,$sql );
 if(! $retval )
	{
	  die('Could not get data: ' . mysqli_error($conn));
	}
	echo "<table border=\"1\"class=\"table table-bordered\"><tr><td>usn</td><td>ph_no</td></tr>";
while($row = mysqli_fetch_array($retval)) 
 { 
	echo "<tr>";
	$b=mysqli_num_fields($retval);
	$i=0;
while($i<$b){
	echo "<td>{$row[$i]}  </td>";
	$i=$i+1;}
echo	"</tr>";
}
  echo "</table>";
 echo "Query Executed primaryfully\n";
}

else
{
?>
<form method="post" action="<?php $_PHP_SELF ?>">



<h2><b>Given phone number find his roommates phone numbers</b></h2><br>
<input name="u10" type="text" class="form-control" placeholder="Phone numbers"/><br>
<input name="21" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>DISPLAY TOTAL FEES COLLECTED BY MANAGER WHOSE ID IS ::</b></h2><br>
<input name="id" type="text" class="form-control"/><br>
<input name="second" type="submit" id="add" value="query"class="btn btn-primary btn-lg"/><br><br>

<h2><b>Room numbers that has all students of that room in same mess:</b></h2><br>
<input name="twlv" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>Given guardian's phone number find which manager Name</b></h2><br>
<input name="u3" type="text" class="form-control"/><br>
<input name="16" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b> All details of mess,manager and transaction::</b></h2><br>
<input name="seventh" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>

<h2><b>DISPLAY ALL STUDENT'S DETAILS TAKEN NORTH MESS ALL THE BLOCKS::</b></h2><br><br>

<input name="first" type="submit" id="add" value="query"class="btn btn-primary btn-lg"/><br><br>


<h2><b>Identify the student ,given his phone number::</b></h2><br>

<input name="pno" type="text" class="form-control"/><br>
<input name="third" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>

<h2><b>DISPLAY THE STUDENTS who have not paid Complete Fees::</b></h2><br><br>

<input name="fourth" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>DISPLAY THE STUDENTS who have not paid Complete Fees with Balance amoount::</b></h2><br><br>

<input name="fifth" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>Given a usn find his room_mate::</b></h2><br>
<input type="text" name="u" class="form-control"/><br>
<input name="sixth" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>Given a USN List all details about him,his mess details,his manager,his transactions::</b></h2><br>

<input name="u1" type="text" class="form-control"/><br>
<input name="eight" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>
<h2>
<h2><b>Dispaly students who have not paid any amount::</b></h2><br>
<input name="nine" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>


<h2><b>List of Empty rooms With Corresponding Blocks::</b></h2><br>
<input name="eleven" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>



<h2><b>Given fee_reciept number find which mess he has taken</b></h2><br>
<input name="u2" type="text" class="form-control"/><br>
<input name="15" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>



<h2><b>Given Manager ID find all students under his control</b></h2><br>
<input name="u5" type="text" class="form-control" placeholder="Manager ID"/><br>
<input name="18" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>

<h2><b>Given Rook number and block Number find student details </b></h2><br>
<input name="u6" type="text" class="form-control" placeholder="Room_num"/><br>
<input name="u7" type="text" class="form-control" placeholder="Block_num"/><br>
<input name="19" type="submit" value="query" class="btn btn-primary btn-lg" /><br><br>


<h2><b>Given Mess nameand Block_number print all its usn and phone number </b></h2><br>
<input name="u8" type="text" class="form-control" placeholder="Mess ID"/><br>
<input name="u9" type="text" class="form-control" placeholder="Block_number"/><br>

<input name="20" type="submit" value="query" class="btn btn-primary btn-lg"/><br><br>



<h2>
<b>WRITE QUERY:</b></h2><br><br>
<input type="text" name="w" size="200" class="form-control"/> 
<input type="submit" name="tenth" value="check" class="btn btn-primary btn-lg"/><br><br> 
</form>


<?php
}
?>
</body>
</html>