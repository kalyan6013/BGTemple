<?php
	$dbhost = 'localhost';
	$dbuser = 'sample_wordpress_admin';
	$dbpass = 'BGTemple@561208';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
if(isset($_POST['Name'])){
$Name=$_POST['Name'];
$Email=$_POST['Email'];
$Mobile=$_POST['Mobile'];
$Enquiry=$_POST['Enquiry'];
if(!preg_match('/^[a-zA-Z ]*$/', $Name) ){
		echo '<script>alert("Enter valid Name")</script>';
	}
	else if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/',$Email)){
		echo '<script>alert("Enter valid Email")</script>';
	}
	else if(!preg_match('/^[7-9]{1}[0-9]{9}$/',$Mobile)){
		echo '<script>alert("Enter valid Mobile")</script>';
	}
	else{
$sql="INSERT INTO Devotee_Enquiry(Name,Email,Mobile,Enquiry) VALUES ('$Name','$Email','$Mobile','$Enquiry')";

mysql_select_db('BG_Temple');
$retval=mysql_query($sql,$conn);
if(!$retval)
{
die('could not enter data:'.mysql_error());
}
echo '<script>alert("Enqiry received")</script>';
echo '<script>window.location="http://localhost/BGTemple/contact/";</script>';
}
echo '<script>alert("Data not entered.....Please fill all the fields correctly");</script>';
echo '<script>window.location="http://localhost/BGTemple/contact/";</script>';
}
mysql_close($conn);
?>