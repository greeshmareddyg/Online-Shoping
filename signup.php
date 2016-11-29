<?php
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
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/jquery-ui.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		dateFormat: "yy/m/d",
	});
  } );
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
		#gender{
			width:50px;
			
		}
	</style>
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
			//alert();	
			$('#register').on('click',function(){
				//alert();
				var fname=$('#fname').val();
				var lname=$('#lname').val();
				var email=$('#email').val();
				var pass=$('#pass').val();
				var cpass=$('#cpass').val();
				var dob=$('#datepicker').val();
				var gender=$('#gender').val();
				var phone=$('#phone').val();
				if(fname!='' && lname!='' && email!='' && pass!='' && cpass!='' &&dob!=''&& gender!='' && phone!='')
				{
				$.ajax({
					type:'POST',
					url:'registerdb.php',
					data:'fname='+fname+'&lname='+lname+'&email='+email+'&pass='+pass+'&cpass='+cpass+'&dob='+dob+'&gender='+gender+'&phone='+phone,
					success:function(data)
					{
						$('#res').text(data);
						$('#fname').val('');
						$('#lname').val('');
						$('#email').val('');
						$('#pass').val('');
						$('#cpass').val('');
						$('#datepicker').val('');
						$('#gender').val('');
						$('#phone').val('');
					}
				})
				}
				else
				{
					$('#all').text("Please fill All the Details");
				}
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
<script type = "text/javascript">
$(document).ready(function(){
   $('#fname').change(function (e) {
	   var hasError = false;
	   var name=$('#fname').val();
        var regex = new RegExp("^[a-zA-Z]+$");
        if (regex.test(name)) {
            $(".fanmeerror").hide();
				return true;
        }
        else
        {
        e.preventDefault();
		$('#fname').val('');
        $('.fnameerror').text('Please Enter Alphabates');
		
        return false;
        }
    });
	$('#lname').change(function (e) {
	   var hasError = false;
	   var name=$('#lname').val();
        var regex = new RegExp("^[a-zA-Z]+$");
        if (regex.test(name)) {
            $(".lanmeerror").hide();
				return true;
        }
        else
        {
        e.preventDefault();
		$('lfname').val('');
        $('.lnameerror').text('Please Enter Alphabates');
		
        return false;
        }
    });

	});
</script>
<script>
	$(document).ready(function(){
		$('#cpass').change(function(){
			var pass=$('#pass').val();
			var conpass=$('#cpass').val();
				if(pass==conpass)
				{
					
				}
				else{
					$('#pass').val('');
					$('#cpass').val('');
					$('#notmatch').text("Password not matched");
				}
			})
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
 <div id='res'></div>
	<div class="" style="margin-top:0px;"><br/>
	<div id='all' style='color:red'></div>
	<h1 style='margin-left:90px;font-size:20px;'>Sign Up</h1><br/>
	<span id='res' style='color:red;'></span>
		<div class="form-group">
			<table class='details'>
				<tr><td><label>First Name</label></td>
				<td><input type="text" class="field" name="fname" id="fname" required/></td><td class='fnameerror' style='color:red'></td></tr>
				<tr><td><label>Last Name</label></td>
				<td><input type="text" class="field" name="lname" id="lname" required/></td><td class='lnameerror' style='color:red'></td></tr>
				<tr><td><label>Email</label></td>
				<td><input type="text" class="field" name="email" id="email" required/></td><td class='emailvalidation' style='color:red'></td></tr>
				<tr><td><label>Date of Birth</label></td>
				<td><input type="text" class="field" name="dob" id="datepicker" required/></td></tr>
				<tr><td><label>Gender</label></td>
				<td><input type="radio" class="field" name="gender" id="gender" required/>Male<input type="radio" class="field" name="gender" id="gender" required/>Fe Male</td></tr>
				<tr><td><label>Phone</label></td>
				<td><input type="text" class="field" name="phone" id="phone" required/></td></tr>

				<tr><td><label>Password</label></td>
				<td><input type="password" class="field" name="pass" id="pass" required /></td></tr>
				<tr><td><label>Confirm Password</label></td>
				<td><input type="password" class="field" name="cpass" id="cpass" required/><td id='notmatch' style='color:red'></td></tr>
			</table>
		</div>
		<div style='margin-left:80px;'>
			<input type="submit" id='register' class="search-submit" value="Register">
		</div>
	</div>
</div>
   <div class="footer">
   	 
        <div class="copy_right">
				<p>© All rights Reseverd | Design by Greesma</a> </p>
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

