<?php
include('db.php');
session_start();
@$email=$_SESSION['email'];
		if(isset($_POST['submit'])){
			$mail=$_POST['mail'];
			$qid=$_POST['qid'];
			$name=$_POST['name'];
			$ques=$_POST['ans'];
			$insert=mysql_query("insert into answers(qid,qemail,name,answer)values('$qid','$mail','$name','$ques')");
			
			if($insert)
			{
				echo "Successfully submitted";
			}
			else{
				echo "Failed";
			}
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
<!--<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script> -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
	<!--<script type="text/javascript">
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

		</script>-->
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
		#data{
			width: 350px;
    padding-top: 8px;
    padding-bottom: 15px;
   // margin: -50 auto 20px auto;
    background: #DCDCDC;
	font-size:15px;
     border-radius: 15px;
    -moz-border-radius: 15px;
    -webkit-border-radius: 15px;
    color: maroon;
	line-height:50px;
		}
		#disp{
			width:500px;
			color:red;
			font-size:15px;
		}
		
	</style>
	<script>
		$(document).ready(function(){
			$(document).on('click','#reply',function(){
				
				//$('#ans').show();
				var $row=$(this).closest('div');
				var ans=$row.find('#qid').val();
				//alert(ans);
				$.ajax({
					type:'POST',
					url:'faqans.php',
					data:'ans='+ans,
						success:function(data)
						{
							//alert(data);
							//window.location.reload();
							$('#result').html(data);
							//$('#ans').show();
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
			    	<li class="active"><a href="cosmetic.php">Cosmetics</a></li>
			    	
			    	<li><a href="accessories.php">Accessories</a></li>
			    	<li><a href="faqs.php">Blog</a></li>
			    	<div class="clear"></div>
     			</ul>
	     	</div>
	     	
	     	<div class="clear"></div>
	     </div>	
		 
	
   </div>
 <div class="main" style='min-height:450px;'>
 <h3 style='margin-top:20px;'>FAQS</h3>
    <div class="content">
	<?php
			
			$sql=mysql_query("select * from questions order by id asc");
				while($row=mysql_fetch_array($sql))
				{
					$id=$row['id'];
					$name1=$row['name'];
					$question=$row['question'];
					?>
					<div id="disp"><input type='hidden' id='qid' value='<?php echo $id;?>' readonly />&nbsp;&nbsp;&nbsp;<span style="margin-left:40px;"><?php echo $name1;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><input type='text' id='ques' value='<?php echo $question;?>' readonly></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<br/><br/>
					<span>Answers:</span>
					<?php
					echo "<table id='data'><tr style='text-align:center;'><th>Name</th><th>Answer</th></tr>";
						$sql2=mysql_query("select * from answers where qid='$id'");
					while($row1=mysql_fetch_array($sql2))
					{
						@$name2=$row1['name'];
						$answer=$row1['answer'];
					echo"<tr style='text-align:center;'><td>$name2 -</td><td>$answer<td></tr><br/>";
			}
			echo"</table>";
					?>
					<div id='result'></div>
					<button id="reply" value='$id'>Reply</button></div>
					<span id='ans' style='display:none'><textarea rows='2' cols='30'></textarea></span><br/>
					
					<?php
				}
	
	?>
	
 
	<!--<form method='post'>
		<table class="details">
			<tr><td>Name</td><td><input type='text' class="field" name='name' placeholder='Name' required><td><tr>
			<tr><td>Question</td><td><textarea rows='2' cols='30' class="field" name='ques' placeholder='Question' required></textarea><td><tr>
		</table>
		<input type='submit' class='search-submit' name='submit' value='Submit'>
		</form>-->
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

