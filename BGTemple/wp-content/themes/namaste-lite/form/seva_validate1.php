<?php
	$dbhost = 'localhost';
	$dbuser = 'sample_wordpress_admin';
	$dbpass = 'BGTemple@561208';
	$conn = mysql_connect($dbhost, $dbuser, $dbpass);
	if(!$conn)
	{
	die('Could not connect: ' . mysql_error());
	}
if(isset($_POST['Name']) and ($_POST['Name']!='') ){ $Name/*variable name*/ = $_POST['Name'];/*form name*/
if(isset($_POST['Email']) and ($_POST['Email']!='') ) $Email = $_POST['Email'];
if(isset($_POST['Mobile']) and ($_POST['Mobile']!='') ) $Mobile = $_POST['Mobile'];
if(isset($_POST['Gender']) and ($_POST['Gender']!='') ) $Gender = $_POST['Gender'];
if(isset($_POST['Date']) and ($_POST['Date']!='') ) $Date = $_POST['Date'];
if(isset($_POST['Seva']) and ($_POST['Seva']!='') ) $Seva = $_POST['Seva'];
if(isset($_POST['Amount']) and ($_POST['Amount']!='') ) $Amount = $_POST['Amount'];
if(isset($_POST['Address']) and ($_POST['Address']!='') ) $Address = $_POST['Address'];
if(isset($_POST['City']) and ($_POST['City']!='') ) $City = $_POST['City'];
if(isset($_POST['State']) and ($_POST['State']!='') ) $State = $_POST['State'];
if(isset($_POST['Zip']) and ($_POST['Zip']!='') ) $Zip = $_POST['Zip'];
	if(!preg_match('/^[a-zA-Z ]*$/', $Name) ){
		echo '<script>alert("Enter valid Name")</script>';
	}
	else if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/',$Email)){
		echo '<script>alert("Enter valid Email")</script>';
	}
	else if(!preg_match('/^[7-9]{1}[0-9]{9}$/',$Mobile)){
		echo '<script>alert("Enter valid Mobile")</script>';
	}
	else if(!preg_match('/^[1-9]{1}[0-9]{5}$/',$Zip)){
		echo '<script>alert("Enter valid Postal Code")</script>';
	}
else
{
$sql = "INSERT INTO Sevas (Name,Email,Mobile,Gender,Date,Seva,Amount,Address,City,State,Zip)
VALUES('$Name','$Email','$Mobile','$Gender','$Date','$Seva','$Amount','$Address','$City','$State','$Zip')";
	
$sql1= "INSERT INTO Seva_Members (Name,Mobile,Gender,Date,Seva)
VALUES('$Name','$Mobile','$Gender','$Date','$Seva')";

mysql_select_db('BG_Temple');
$retval = mysql_query( $sql, $conn);
$retval = mysql_query( $sql1, $conn);

echo '<script>alert("Entered data successfully");</script>';
echo '<script>window.location="http://localhost/BGTemple/online_seva";</script>'; 
date_default_timezone_set('Etc/UTC');
require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;
//Tell PHPMailer to use SMTP

$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages

$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output

$mail->Debugoutput = 'html';
//Set the hostname of the mail server

$mail->Host = 'smtp.gmail.com'; 
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission

$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls

$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "kalyan.aruru1@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "kalyan@1761";
//Set who the message is to be sent from
$mail->setFrom('kalyan.aruru1@gmail.com', 'Hemanth Kalyan');

//Set who the message is to be sent to
$mail->addAddress("kalyan.aruru@gmail.com",'Kalyan Aruru');
$mail->addAddress("Sudhindra@tekvity.com", ' ');
$mail->addAddress("Shree@tekvity.com", ' ');
//Set the subject line
$mail->Subject = 'You have a New Seva Registration';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//Replace the plain text body with one created manually
$mail->Body = " Seva Details :

Name		: $Name
Email		: $Email
Mobile		: $Mobile
Gender		: $Gender
Date		: $Date
Seva		: $Seva";

//Attach an image file
//send the message, check for errorsemail
if (!$mail->send()) {
echo "Mailer Error:".$mail->ErrorInfo;
} else {
echo "Please Check Your Email To Reset Password !";
}
}
echo '<script>alert("Data not entered.....Please fill all the fields correctly!!!");</script>';
echo '<script>window.location="http://localhost/BGTemple/online_seva";</script>';
mysql_close($conn);
}
?>

<!--eregi('/^[A-Za-z]$/', $Name) && eregi('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+.([a-zA-Z]{2,4})$/',$Email) && eregi('/^[7-9]{1}[0-9]{9}$/',$Mobile) && eregi('/^[1-9]{1}[0-9]{5}$/',$Zip) 
echo '<script>window.location="testseva.html";</script>'; -->		