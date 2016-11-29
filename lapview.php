<?php
include('db.php');
session_start();
@$email=$_SESSION['email'];
@$id=$_REQUEST['id'];
$sql=mysql_query("select * from cart");
$count=mysql_num_rows($sql);
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
<script>
	$(document).ready(function(){
		$('#cart').click(function(){
			var id="<?php echo $id; ?>";
			$.ajax({
				type:'POST',
				url:'cart.php',
				data:'id='+id,
				success:function(data)
				{
					$('#count').html(data);
					window.location.reload();
				}
			})
		});
	});
</script>
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href="index.php"><img src="images/logo.jpg" alt="" height='100px' width='200px;'/></a>
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
					<li><a href='cartview.php?id=<?php echo $id; ?>'><span id='count'></span><span><?php echo $count; ?><img src='images/shopping-cart.png'><span>Cart Item</a></li>
					
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
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="mobile.php">Mobiles</a></li>
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
 <div class="main" style='min-height:380px;'>
    <div class="content" style='margin-left:450px;width:40%;'>
	<?php
		$sql=mysql_query("select * from products where id='$id'");
		while($row=mysql_fetch_array($sql))
		{
			$productname=$row['productname'];
			$price=$row['price'];
			
		}
	
	?>
    	<h1 style='font-size:20px;color:blue;'><?php echo $productname; ?></h1><br/>	     				  
			<h3 style='font-size: 28px;
vertical-align: sub;'>$<?php echo $price; ?>.00</h3><br/><br/>

<span style='font-size: 22px;'>Features</span><br/><br/>
<div>
<ul>
	<li>Intel Intel Core i3 (5th Gen) Processor</li>
	<li>4 GB DDR3 RAM</li>
	<li>Free DOS Operating System</li>
	<li>1 TB HDD</li>
	<li>15.6 inch Display</li>
	
</ul><br/>
<span style='font-size: 22px;'>Desription</span><br/><br/>
<p > From gaming and watching videos to browsing the Internet and listening to songs, the ASUS A555LF notebook lets you carry your dose of entertainment wherever you go. Its powerful processor and ample RAM make computing smooth and fast. In addition to that, the sleek finish along with the award-winning design is the cherry on the top.
</p>
</div>
	  
		<div class="section group">
				
				
			</div>
    </div>
	<div id='sidebar' style='float:left;margin-top:-320px;'>
		 <?php
				  $sql=mysql_query("select * from products where id='$id'");
				  while($row=mysql_fetch_array($sql))
				  {
					  $image=$row['image'];
				  }
				  ?>
				  <img src="<?php echo $image; ?>">	
				  <input type='submit' class='search-submit' id='cart' value='ADD TO CART'>
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

