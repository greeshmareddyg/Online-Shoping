<?php
include('db.php');
session_start();
@$email=$_SESSION['email'];
@$cid=$_REQUEST['id'];
if(@$email!='')
{
	
}
else
{
	header('Location:login.php?id='.$cid);
}

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
			$('#submit').on('click',function(){
				var fname=$('#fname').val();
				
				var lname=$('#lname').val();
				
				var email=$('#email').val();
				var phone=$('#phone').val();
				var street=$('#street').val();
				var city=$('#city').val();
				var country=$('#country').val();
				var zip=$('#zip').val();
				var nameoncard=$('#nameoncard').val();
				var cardnumber=$('#cardnumber').val();
				var cvv=$('#cvv').val();
				var cid="<?php echo $cid; ?>?";
				if(fname!=''&&lname!=''&& email!=''&& phone!='' && street!='' && city!='' && country!='' && zip!=''&& cardnumber!='' && cvv!='')
				{
				$.ajax({
					type:'POST',
					url:'pay.php',
					data:'fname='+fname+'&lname='+lname+'&email='+email+'&phone='+phone+'&street='+street+'&city='+city+'&country='+country+'&zip='+zip+'&nameoncard='+nameoncard+'&cardnumber='+cardnumber+'&cvv='+cvv+'&cid='+cid,
					success:function(data)
					{
						//alert(data);
						$('#res').text(data);
						$('#email').val('');
						$('#fname').val('');
						$('#lname').val('');
						$('#phone').val('');
						$('#street').val('');
						$('#city').val('');
						$('#country').val('');
						$('#zip').val('');
						$('#nameoncard').val('');
						$('#cardnumber').val('');
						$('#expmonth').val('');
						$('#year').val('');
						$('#cvv').val('');
					}
				})
				}
				else{
					$('#all').text('Please fill all the fields');
				}
		});
		});
	  </script>
	  <script>
		function valid_credit_card(value) {

	// get the last number
	var cardLastNum 	= parseInt(value.substr(value.length - 1));
	// remove the last number
	var cardNumMin 		= value.slice(0,-1)
	// reverse
	var cardNumReverse 	= cardNumMin.split("").reverse().join("");
	// set to array
	var cardNumArray 	= cardNumReverse.split("");
 
	// for each odd number multiply
	var a = 2;
	var cardNumOdsMultiplied = [];
	for (var i = 0; i < cardNumArray.length; i++) {
		if (a%2 == 0){
			var temp = cardNumArray[i]*2;
			// if the number is greater than 9 substract by 9
			if (temp > 9){
				var temp = (temp -9);
			}
			cardNumOdsMultiplied.push(temp);
		}else{
			cardNumOdsMultiplied.push(parseInt(cardNumArray[i]));
		}
 
		a++;
	}
 
	var cardNumTelly = 0;
	for (var i = 0; i < cardNumOdsMultiplied.length; i++) {
    cardNumTelly += cardNumOdsMultiplied[i];
	}
 
	cardNumTelly = cardNumTelly + cardLastNum;
 
	if (cardNumTelly%10 == 0){
		// number is a valid card number
		$(".card").text("Valid");
		
	}else{
		// number is not valid
		$(".card").text("Not Valid");
	}
}
	</script>
	<script type = "text/javascript">
$(document).ready(function(){
   $('#fname').change(function (e) {
	   var hasError = false;
	   var fname=$('#fname').val();
        var regex = new RegExp("^[a-zA-Z]+$");
        if (regex.test(fname)) {
            $(".fnameerror").hide();
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
	   var fname=$('#lname').val();
        var regex = new RegExp("^[a-zA-Z]+$");
        if (regex.test(fname)) {
            $(".lnameerror").hide();
				return true;
        }
        else
        {
        e.preventDefault();
		$('#lname').val('');
        $('.lnameerror').text('Please Enter Alphabates');
		
        return false;
        }
    });

	$('#zip').change(function (e) {
	   var hasError = false;
	   var zip=$('#zip').val();
	   var zlen=zip.length;
        var regex = new RegExp("^[0-9]+$");
        if (regex.test(zip))
		{
			//$(".nameerror").hide();
			//return true;
			if(zlen=='5')
			{
				$(".ziperror").hide();
				return true;
			}
			else
			{
				e.preventDefault();
				$('#zip').val('');
				$('.ziperror').text('Please Enter valid ZIP');

			}
        }
        else
        {
        e.preventDefault();
		$('#zip').val('');
        $('.ziperror').text('Please Enter valid ZIP');
		
        return false;
        }
    });

 $('#cvv').change(function (e) {
	   var hasError = false;
	   var cvv=$('#cvv').val();
	   var cvvlen=cvv.length;
        var regex = new RegExp("^[0-9]+$");
        if (regex.test(cvv))
		{
			//$(".nameerror").hide();
			//return true;
			if(cvvlen=='3')
			{
				$(".cvverror").hide();
				return true;
			}
			else
			{
				e.preventDefault();
				$('#cvv').val('');
				$('.cvverror').text('Please Enter valid CVV');

			}
        }
        else
        {
        e.preventDefault();
		$('#cvv').val('');
        $('.cvverror').text('Please Enter valid CVV');
		
        return false;
        }
    });

});
</script>
<script>
$(document).ready(function(){
   $('#phone').change(function (e) {
	   var hasError = false;
	   var phone=$('#phone').val();
	   var len=phone.length;
	   
        if (len=='10') {
            $(".phoneerror").hide();
				return true;
        }
        else
        {
        e.preventDefault();
		$('#phone').val('');
        $('.phoneerror').text('Enter valid phone number');
		
        return false;
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
				$(".emailerror").hide();
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
				$(".emailerror").text("Invalid email Address");
				hasError = true;		
			}
			if(hasError == true) { return false; }
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
			    	<li><a href="cosmetic.php">Cosmetics</a></li>
			    	
			    	<li><a href="accessories.php">Accessories</a></li>
			    	
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	     
	
   </div>
 <div class="main" style='min-height:380px;'><br/>
 <div id='res' style='color:green'></div>
 <div id='all' style='color:red'></div>
    <div class="content" style='margin-left:250px;width:80%;'>
	
			<div class="form-group">
			<legend style='color:red'><b>Shipping Address Information</b></legend>
			<table class='details'><tr><td class='fnameerror' style='color:red'></td><tr><td class='lnameerror' style='color:red'></td></tr><tr><td><label>First Name</label></td>
			<td><input type="text" class="field" name="fname" id="fname" /></td>
			<td><label>Last Name</label></td>
			<td><input type="text" class="field" name="lname" id="lname"/></td></tr>
			<tr><td class='emailerror' style='color:red'></td><td class='phoneerror' style='color:red'></td></tr>
			<tr><td><label>Email</label></td>
			<td><input type="text" class="field" name="email" id="email"/></td>
			<td><label>Phone</label></td>
			<td><input type="text" class="field" name="phone" id="phone"/></td></tr>
			<td><label>Street</label></td>
			<td><input type="text" class="field" name="street" id="street"/></td>
			<td><label>Country</label></td>
			<td><select id='country' class="field"><option></option>
				<option value="USA">United States of America</option>
				<option value="Afganistan">Afganistan</option>
				<option value="Albania">Albania</option>
				<option value="Australia">Australia</option>
				<option value="Belzium">Belzium</option>
				<option value="canada">canada</option>
				<option value="Denmark">Denmark</option>
			</select></td></tr>
			<tr><td>City</td>
			<td><input type="text" class="field" name="city" id="city"/></td>
			<td>Zipcode</td>
			<td><input type="text" class="field" name="zip" id="zip"/></td><td class='ziperror' style='color:red'></td></tr></table>
			<fieldset>
					<legend style='color:red'><b>CREDIT CARD INFO</b></legend>
					<table class='details'><tr><td>Name on the Card</td><td><input type="text" class="field" name="nameoncard" id="nameoncard"/></td></tr>
					<tr><td>Card Number</td><td><input type="text" class="field" name="cardnumber" id="cardnumber" onblur="valid_credit_card(value)"></td><td class='card' style='margin-left:10px;color:green'></td></tr>
					<tr><td>Expiration Date</td><td><select class="field" id="expmonth">
					<option>Month</option>
					<option value='01'>01</option>
					<option value='02'>02</option>
					<option value='03'>03</option>
					<option value='04'>04</option>
					<option value='05'>05</option>
					<option value='06'>06</option>
					<option value='07'>07</option>
					<option value='08'>08</option>
					<option value='09'>09</option>
					<option value='10'>10</option>
					<option value='11'>11</option>
					<option value='12'>12</option>
					</select>
					</td><td><select class="field" id="year">
					<option>Year</option>
					<?php
					for($i='2016';$i<=2030;$i++)
					{
						echo "<option value='$i'>$i</option>";
					}
					?>
					</select></td></tr>
					<tr><td>CVV</td><td><input type="text" class="field" id="cvv"></td><td class='cvverror' style='color:red'></td></tr>
					</table>
					<fieldset>
					<input type="submit" id="submit" class="search-submit" value="Submit">
		</div>
		
		
		</div><br/>
		
    </div>
	
 </div>
</div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>© All rights Reseverd | Design by Greesma</p>
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

