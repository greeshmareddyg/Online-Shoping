<?php
include('db.php');
$id=$_POST['id'];
$sql=mysql_query("select * from products where id='$id'");
while($row=mysql_fetch_array($sql))
{
	$prodname=$row['productname'];
	$image=$row['image'];
	$price=$row['price'];
	
}
$insertcart=mysql_query("insert into cart(productname,price,image)values('$prodname','$price','$image')");
$sql1=mysql_query("select * from cart");
echo $count=mysql_num_rows($sql1);

?>