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
	.form_caja {
    width: 400px;
    padding-top: 8px;
    padding-bottom: 15px;
    margin: -50 auto 20px auto;
    background: #DCDCDC;
	font-size:15px;
     border-radius: 15px;
    -moz-border-radius: 20px;
    -webkit-border-radius: 15px;
    color: maroon;
	line-height:50px;
}
	</style>
	

		
</head>
<body>
  <div class="wrap">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href=""><img src="images/shwasa.jpg" alt="" height='100px' width='200px;'/></a>
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
		
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="index.php">Home</a></li>
			    	<li class="active"><a href="">Cosmetics</a></li>
			    	
			    	<li><a href="accessories.php">Accessories</a></li>
			    	<li><a href="blog.php">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	
		 
	
   </div>
   <?php
	if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$msg=$_POST['msg'];
			$insert=mysql_query("insert into contact(name,message)values('$name','$msg')");
			//$insert=mysql_query("insert into answers(qid,qemail)values('$uniqid','$email')");
			
			if($insert)
			{
				echo "Successfully submitted";
			}
			else{
				echo "Failed";
			}
	}
   ?>
 <div class="main" style='min-height:650px;'>
	<div class="content">
	
	<form method='post'>
	
		<table class="details">
			<tr><td>Name</td><td><input type='text' class="field" name='name' placeholder='Name' required><td><tr>
			<tr><td>Messaage</td><td><textarea rows='2' cols='30' class="field" name='msg' placeholder='Message' required></textarea><td><tr>
		</table>
		<input type='submit' class='search-submit' name='submit' value='Submit'>
		</form>
    </div>
	<div style='float:right;margin-top:-150px;margin-right:550px;'>
	<h1 style='font-size:20px;'>Contact Us</h1><br/>
	<div style='font-size:15px;'>
		<p'>#00122</p>
		<p>Huntsville, AL 35842</p>
		<p>Madison , USA</p>
	</div>
	
 </div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>© All rights Reseverd | Design by Greeshma</p>
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

