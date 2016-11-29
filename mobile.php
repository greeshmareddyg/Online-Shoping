<?php
include('db.php');
session_start();
@$email=$_SESSION['email'];

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
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href=""><img src="images/logo.jpg" alt="" height='100px' width='200px;'/></a>
			</div>
			</div>
			<div class="account_desc">
				<ul>
					<?php
						if(@$email=='')
						{
					?>
						<li><a href="signup.php">Register</a></li>
						<li><a href="login.php">Login</a></li>
						<?php
						}
						else
						{
						?>
						<li><a href="profile.php">My Profile</a></li>
						<li><a href="logout.php">Logout</a></li>	
						<?php
						}
						?>
					
					

				</ul>
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
			    	<li><a href="index.php">Home</a></li>
			    	<li class="active"><a href="">Mobiles</a></li>
			    	<li><a href="laptops.php">Laptops</a></li>
			    	<li><a href="accessories.php">Accessories</a></li>
			    	
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
    <div class="content">
		
		<?php
			include('db.php');
				$sql=mysql_query("select * from products where type='mobiles'");
				while($row=mysql_fetch_array($sql))
				{
					$id=$row['id'];
					$productname=$row['productname'];
					$image=$row['image'];
					$price=$row['price'];
		?>
					<div class="grid_1_of_4 images_1_of_4">
					<a href="viewdetails.php?id=<?php echo $id; ?>"><img src="<?php echo $image ?>"  alt="" /></a>
					 <h2><?php echo $productname; ?> </h2>
					<div class="price-details">
				       <div class="price-number">
							<p><span class="rupees">$<?php echo $price; ?>.00</span></p>
					    </div>
					       		<!--<div class="add-cart">								
									<h4><a href="preview.html">Add to Cart</a></h4>
							     </div>-->
							 <div class="clear"></div>
					</div>
					</div>
						<?php
				}
						?>
				
    		      <!--<div class="products">
				<div class="cl">&nbsp;</div>
				<ul>
				<?php
				/*include('db.php');
				$sql=mysql_query("select * from products where type='mobiles'");
				while($row=mysql_fetch_array($sql))
				{
					$id=$row['id'];
					$productname=$row['productname'];
					$image=$row['image'];
					$price=$row['price'];*/
					?>
					 <li>
				    	<a href="viewdetails.php?id=<?php //echo $id; ?>"><img src="<?php //echo $image; ?>" alt="" /></a>
						<div class="productname" >
							<span><?php //echo $productname; ?></span>
							<span style='float:right;'><font color='red'>$<?php //echo $price; ?>.00</font></span>
							
							
						</div>
				    	
						
			    	</li>
					
				<?php
				//}
				?>
			
				   
			    </ul>
				<div class="cl">&nbsp;</div>
			</div>-->
						<div class="section group">
				
				
			</div>
    </div>
 </div>
</div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>© All rights Reseverd | Design by Dheeraj</p>
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

