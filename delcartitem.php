<?php
include('db.php');
$id=$_POST['id'];
$delete=mysql_query("delete from cart where id='$id'");
if($delete)
{
	echo "Item was successfully deleted";
}

?>