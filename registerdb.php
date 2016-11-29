<?php
include('db.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$pass=sha1($_POST['pass']);
$cpass=sha1($_POST['cpass']);
$dob=$_POST['dob'];
$gender=$_POST['gender'];
$phone=$_POST['phone'];
$sql=mysql_query("insert into register(firstname,lastname,email,dob,gender,phone,password,confirmpassword)values('$fname','$lname','$email','$dob','$gender','$phone','$pass','$cpass')");

if($sql)
{
	echo "Successfully Registered";
}
else
{
	echo "Registration was Failed";
}

?>