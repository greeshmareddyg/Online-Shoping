<?php
session_start();
include('db.php');
$cartzero=mysql_query("delete from cart");

if(session_destroy())
{
	header('location:index.php');
}

?>