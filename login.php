<?php
session_start();
include('db.php');
@$id=$_REQUEST['id'];

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
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href="index.html"><img src="images/shwasa.jpg" alt="" height='100px' width='200px;'/></a>
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
						<li><a href="#">My Profile</a></li>
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
		<script>
	$(document).ready(function(){
		$('#email').on('change',function(){
			//$(".emailvalidation").hide();
			var email=$('#email').val();
			var hasError = false;
			var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;		
			if (filter.test(email))
			{
				$(".emailvalidation").hide();
				//return true;
				$.ajax({
					type:'POST',
					url:'emailvalid.php',
					data:'email='+email,
					success:function(data)
					{
						$('#emailtext').text(data);
					}
				})
			}
			else{
				$('#email').val('');
				$(".emailvalidation").text("Invalid email Address");
				hasError = true;		
			}
			if(hasError == true) { return false; }
		});	
	});
</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li class="active"><a href="index.php">Home</a></li>
			    	<li><a href="cosmetic.php">Cosmetics</a></li>
			    	
			    	<li><a href="accessories.php">Accessories</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	     
	
   </div>
 <div class="main" style='min-height:380px;'>
    <div class="content" >
	<h1 style='margin-left:90px;font-size:20px;'>Sign In</h1><br/>
	<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$pass=sha1($_POST['password']);
		$sql=mysql_query("select * from register where email='$email'");
		while($row=mysql_fetch_array($sql))
		{
			$passdb=$row['password'];
			$emaildb=$row['email'];
		}
		if($email==$emaildb)
		{
			if($pass==$passdb)
			{
				$_SESSION['email']=$email;
				header('Location:cosmetic.php');
				if($id!='')
				{
					header('Location:checkout.php?id='.$id);
				}
				else
				{
						header('Location:cosmetic.php');
				}
			}
			else
			{
				echo "Password is incorrect";
			}
		}
		else
		{
			echo "Email ID is incorrect";
		}
	}
	?>

    	<form method="post">
		<div class="form-group">
			<table class='details'>
				<tr><td><label>Email</label></td>
				<td><input type="text" class="field" name="email" id="email" required/></td><td class='emailvalidation' style='color:red'></td></tr>
				<tr><td><label>Password</label></td>
				<td><input type="password" class="field" name="password" id="password" required/></td></tr>
			</table>
		</div>
		<div style='margin-left:80px;'>
			<input type="submit" name='submit' class="search-submit" value="Submit">
		</div>
		</form>
				  
		<div class="section group">
				
				
			</div>
    </div>
	
 </div>
</div>
   <div class="footer">
   	  <div class="wrap">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Advanced Search</a></li>
						<li><a href="delivery.html">Orders and Returns</a></li>
						<li><a href="contact.html">Contact Us</a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="about.html">About Us</a></li>
						<li><a href="contact.html">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.html">Site Map</a></li>
						<li><a href="#">Search Terms</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="contact.html">Sign In</a></li>
							<li><a href="index.html">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="contact.html">Help</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>+91-123-456789</span></li>
							<li><span>+00-123-000000</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <li><a href="#" target="_blank"><img src="images/facebook.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/twitter.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"><img src="images/skype.png" alt="" /> </a></li>
							      <li><a href="#" target="_blank"> <img src="images/dribbble.png" alt="" /></a></li>
							      <li><a href="#" target="_blank"> <img src="images/linkedin.png" alt="" /></a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>			
        </div>
        <div class="copy_right">
				<p>Company Name © All rights Reseverd | Design by  Greesma </p>
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

