<?php
include('db.php');
$name=$_POST['name'];
$cnum=$_POST['cnum'];
$expmon=$_POST['expmon'];
$year=$_POST['year'];
$cvv=$_POST['cvv'];
$sql=mysql_query("insert into carddetails(cardnumber,expmon,year,cvv,nameoncard)values('$cnum','$expmon','$year','$cvv','$name')");
if($sql)
{
	echo "Card details are saved";
}
else
{
	echo "Card details are not saved";
}
?>