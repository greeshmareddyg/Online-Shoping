<?php
session_start();

include('db.php');
?>
<!DOCTYPE HTML>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
		input.field { width:206px;padding:5px 5px 5px; }
		.details{
			border:1 px solid;
		}
		.details tr td{
			 padding: 8px;
			border-spacing: 10px;
			border-collapse: separate;
			
		}
	</style>

</head>
<body>
  <div class="wrap" style="min-height:450px;">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href="index.html"><img src="images/shwasa.jpg" alt="" height='100px' width='200px;'/></a>
			</div>
			</div>
			
			 <div class="cart">
			  	   
			  </div>
			<div class="clear"></div>
		</div>
		<div class="header_top">
			
			  <script type="text/javascript">
			function DropDown(el) {
				this.dd = el;
				this.initEvents();
			}
			DropDown.prototype = {
				initEvents : function() {
					var obj = this;

					obj.dd.on('click', function(event){
						$(this).toggleClass('active');
						event.stopPropagation();
					});	
				}
			}

			$(function() {

				var dd = new DropDown( $('#dd') );

				$(document).click(function() {
					// all dropdowns
					$('.wrapper-dropdown-2').removeClass('active');
				});

			});

		</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="Adminhome.php">Home</a></li>
			    	<li class="active"><a href="addproduct.php">Add Product</a></li>
			    	<li><a href="productlist.php">View Products</a></li>
			    	<li><a href="logout.php">Logout</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	     
	<!--<div class="header_slide">
			<div class="header_bottom_left">				
				<div class="categories">
				  <ul>
				  	<h3>Categories</h3>
				      <li><a href="#">Mobile Phones</a></li>
				      <li><a href="#">Laptop</a></li>
				      <li><a href="#">Accessories</a></li>
				  </ul>
				</div>					
	  	     </div>
					
		   <div class="clear"></div>
		</div>-->
   </div>
 <div class="main">
 <?php
 include('db.php');
 if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	$productname=$_POST['productname'];
	$price=$_POST['price'];
	@$filename=$_FILES['image']['tmp_name'];
	move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
	@$file="images/".$_FILES["image"]["name"];
	$insert=mysql_query("insert into products(productname,type,price,image)values('$productname','$type','$price','$file')");
	if($insert){  
                  echo "<script>alert('Added Successful')</script>";  
                }
				else
				{  
                    echo "<script>alert('Not Successful')</script>";  
                }  
}
?>
    <div class="content">
	<h3 style='color:blue'>Add Product</h3><br/>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<table class='details'><tr><td><select name='type' class='field' required>
				<option>Select Type</option>
				<option value="cosmetic">Cosmetics</option>
				
				<option value="accessories">Accessories</option>
			</select>
			</td></tr>
		
		
			<tr><td><input type='text' class="field" name='productname' placeholder='Product Name' required><td><tr>
		
		
			<tr><td><input type='text' class="field" name='price' placeholder='Price' required></td></tr>
		
		
			<tr><td><input type='file' class="field" name='image' required ></td></tr></table>
		
		<div>
			<input type="submit" name="submit" class="search-submit" value="Add Product">
		</div>
		</div>
	</form>
    </div>
 </div>
</div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>Company Name © All rights Reseverd | Design by </p>
		   </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>

