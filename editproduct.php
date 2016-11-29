<?php
include('db.php');
$id=$_POST['id'];

$sql=mysql_query("select * from products where id='$id'");
while($row=mysql_fetch_array($sql))
{
	$productname=$row['productname'];
	$price=$row['price'];
	$image=$row['image'];
	
	
}

?>
<div style='margin-left:20px;'>
<form method='post' enctype='multipart/form-data'>
		<div class="form-group">
			<input type="text" name='prodname' class="form-control" value='<?php echo $productname;?>'>
		</div>
		<div class="form-group">
			<input type="text" name='price' class="form-control" value='<?php echo $price;?>'>
		</div>
		<div class="form-group">
			<input type="file" name='image'>
		</div>
		<input type='hidden' name='id' value='<?php echo $id; ?>'>
		<input type='hidden' name='img' value='<?php echo $image; ?>'>
		<div>
			<input type="submit"  name='updateproduct' class="btn btn-primary" value="Update">
		</div><br/>

</form>
</div>
