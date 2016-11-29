<?php
session_start();
@$email=$_SESSION['email'];
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
				<a href="index.php"><img src="images/shwasa.jpg" alt="" height='100px' width='200px;'/></a>
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
		<script>
			$(document).ready(function(){
				$('#search-submit').click(function(){
					var id=$(this).val();
					//alert(id);
					$.ajax({
						type:'POST',
						url:'delcartitem.php',
						data:'id='+id,
						success:function(data)
						{
							$('#res1').html(data);
							window.location.reload();
						}
					})
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
    <div id='content'><br/>
		<h3 style='margin-left:120px;'>My Profile</h3>
		
		<?php
			$sql=mysql_query("select * from register where email='$email'");
			while($row=mysql_fetch_array($sql))
			{
				$fname=$row['firstname'];
				$lname=$row['lastname'];
				$email=$row['email'];
				$dob=$row['dob'];
				$phone=$row['phone'];
			}
		?>
		
		<table class="details"><tr><td>First Name</td><td><input type='text' class='field' value='<?php echo $fname; ?>' readonly></td></tr>
		<tr><td>Last Name</td><td><input type='text' class='field' value='<?php echo $lname; ?>' readonly></td></tr>
		<tr><td>Email</td><td><input type='text' class='field' value='<?php echo $email; ?>' readonly></td></tr>
		<tr><td>Date of Birth</td><td><input type='text' class='field' value='<?php echo $dob; ?>' readonly></td></tr>
		<tr><td>Phone</td><td><input type='text' class='field' value='<?php echo $phone; ?>' readonly></td></tr>
		</table>
	
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

