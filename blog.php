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
					<li ><a href="blog.php">Blog</a></li>
			    	<li><a href="contact.php">Contact</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	
		 
	
   </div>
 <div class="main" style='min-height:450px;'>
 <?php
		$sql=mysql_query("select * from register where email='$email'");
		while($row=mysql_fetch_array($sql))
		{
			$fname=$row['firstname'];
			$lname=$row['lastname'];
			$fullname=$fname . $lname;
		}
		if(isset($_POST['submit'])){
			$name=$_POST['name'];
			$ques=$_POST['ques'];
			$insert=mysql_query("insert into questions(name,question,email)values('$name','$ques','$email')");
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
    <div class="content" '>
	<form method='post'>
		<table class="details">
			<tr><td>Name</td><td><input type='text' class="field" name='name' placeholder='Name' value='<?php echo $fullname;?>' required><td><tr>
			<tr><td>Messaage</td><td><textarea rows='2' cols='30' class="field" name='ques' placeholder='Message' required></textarea><td><tr>
		</table>
		<input type='submit' class='search-submit' name='submit' value='Submit'>
		</form>
    </div>
	
	<?php
 /*$sql=mysql_query("select * from questions order by id desc");
				while($row=mysql_fetch_array($sql))
				{
					$id=$row['id'];
					$name1=$row['name'];
					$question=$row['question'];
						echo "<table class='details'>
			<tr><td>Question</td><td>$question<td><tr>
		</table>";
		echo "<div style='margin-top:-20px;margin-left:350px;'>";
		echo "<h4 style='color:red'>Answer<h4>";
		echo "</div>";
					}*/
					$sql1=mysql_query("select * from questions where email='$email' order by id desc");
					while($row=mysql_fetch_array($sql1))
				{
					$id=$row['id'];
					$name1=$row['name'];
					$question=$row['question'];
						echo "<table class='form_caja' id='data'>
			<tr style='background-color:maroon;color:white'><td>Question</td><td>$name1 -</td><td>$question<td></tr>";
					//$sql2=mysql_fetch_array(mysql_query("select * from answers where qid='$id'"));
					//$name2=$sql2['name'];
				//	$answer=$sql2['answer'];
				echo "<tr style='color:green;'><td>Answer</td><td></td><td></td></tr>";
				$sql2=mysql_query("select * from answers where qid='$id'");
					while($row1=mysql_fetch_array($sql2))
					{
						@$name2=$row1['name'];
						$answer=$row1['answer'];
					echo"<tr id='3'><td></td><td>$name2 -</td><td>$answer<td></tr><br/>";
			}
					
			
		echo "</table>";
		echo "<div style='margin-top:-20px;margin-left:350px;'>";
		//echo "<h4 style='color:red'>Answer<h4>";
		echo "</div>";
					}
 ?>
 
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

