<?php
include('db.php');
$sql=mysql_query("select * from cart");
$amount=mysql_fetch_array(mysql_query("select sum(price) as amt from cart"));
 $amt='$'.''.$amount['amt'];
$count=mysql_num_rows($sql);
$cid=$_POST['cid'];
while($row=mysql_fetch_array($sql))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$street=$_POST['street'];
	$city=$_POST['city'];
	$country=$_POST['country'];
	$zip=$_POST['zip'];
	$nameoncard=$_POST['nameoncard'];
	$cardnumber=$_POST['cardnumber'];
	$cvv=$_POST['cvv'];
	$productname=$row['productname'];
	$price=$row['price'];
	$image=$row['image'];
	$insert=mysql_query("insert into orders(firstname,lastname,email,phone,street,city,country,zip,cardnumber,nameoncard,cvv,productname,price,image)values('$fname','$lname','$email','$phone','$street','$city','$country','$zip','$cardnumber','$nameoncard','$cvv','$productname','$price','$image')");
}
if($insert)
{
	echo "Successfully order completed $amt deducted from $cardnumber";
	$update=mysql_query("delete from cart where id='$cid'");
}
else
{
	echo "Failed your order";
}

?>