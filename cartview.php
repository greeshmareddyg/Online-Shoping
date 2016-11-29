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
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
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
				
				$('.search-submit1').on('click',function(){
					//alert();
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
	
   </div>
   <div id='res1'></div>
 <div class="main" style='min-height:380px;'>
    <div class="content" style='margin-left:20px;width:80%;'>
		<table class='table table-hover'>
		
		<tr><th>S.No</th><th>Product Name</th><th>Quantity</th><th>Price</th><th>Item</th><th>Delete</th></tr>
		<?php
			$sql=mysql_query("select * from cart ");
			$i=0;
			while($row=mysql_fetch_array($sql))
			{
				$i++;
				$cid=$row['id'];
				$productname=$row['productname'];
				$price=$row['price'];
				$image=$row['image'];
				//$cnt=$row['cnt'];
				//$pric='$'.$cnt*$price.'.'.'00';
				echo "<tr><td>$i</td><td>$productname</td><td></td><td>$price</td><td><img src='$image' width='100px;' height='100px;'></td><td><button id='delete' class='search-submit1' value='$cid'>Delete</button></td></tr>";
			}
					
		?>
		</table>
		<div><br/><br/>
			<?php
				$sql=mysql_fetch_array(mysql_query("select sum(price) as amount from cart"));
				$amount=$sql['amount'];
			?>
			<h1 style='font-size:20px;'>Total Amount : $<?php echo $amount; ?>.00</h1>
		</div><br/>
		<div>
			<a href='checkout.php?id=<?php echo $cid; ?>'><input type='submit' class='search-submit' id='check' value='Check Out'></a>
		</div>
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

