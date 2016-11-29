<?php
session_start();
include('db.php');
?>
<!DOCTYPE HTML>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/startstop-slider.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
  <div class="wrap" style="min-height:450px;">
	<div class="header">
		<div class="headertop_desc">
			<div class="call">
				 <div class="logo">
				<a href=""><img src="images/shwasa.jpg" alt="" height='100px' width='200px;'/></a>
			</div>
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
		$(document).on('click','#edit',function(e){
		
			e.preventDefault();
			var id=$(this).val();
			
			$.ajax({
				type:'POST',
				url:'editproduct.php',
				data:'id='+id,
				success:function(data)
				{
					//alert(data);
					//$(".modal-body").modal('toggle');
					$(".modal-career").html(data);
					//$('#your-modal').modal('toggle');
					 $("#editfee").modal('show');


				}
			})
		});
	});
</script>
<script>
	$(document).ready(function(){
		$(document).on('click','#delete',function(){
			var id=$(this).val();
			$.ajax({
				type:'POST',
				url:'deleteitem.php',
				data:'id='+id,
				success:function(data)
				{
					$('#res1').html(data);
					window.location.reload();
				}
			})
		});
	})
</script>
	 <div class="clear"></div>
  </div>
	<div class="header_bottom">
	     	<div class="menu">
	     		<ul>
			    	<li><a href="Adminhome.php">Home</a></li>
			    	<li><a href="addproduct.php">Add Product</a></li>
			    	<li class="active"><a href="productlist.php">View Products</a></li>
			    	<li><a href="logout.php">Logout</a><li>
			    	
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
	
	<div class="section group">
	<div id='res1' color='green'></div>
	<?php
		if(isset($_POST['updateproduct']))
			{
				$prodname=$_POST['prodname'];
				$pri=$_POST['price'];
				$ids=$_POST['id'];
				$img=$_POST['img'];
				@$filename=$_FILES['image']['tmp_name'];
				move_uploaded_file($_FILES["image"]["tmp_name"],"images/" . $_FILES["image"]["name"]);
				//@$file="images/".$_FILES["image"]["name"];
				if(@$filename=='')
				{
					@$file=$img;
					$update=mysql_query("update products set productname='$prodname',price='$pri',image='$file' where id='$ids'");
					if($update)
					{
						echo "<font color='green'>Item has been Successfully Updated</font>";
					}
					else
					{
						echo "Failed to Update";
					}
				}
				else
				{
					@$file="images/".$_FILES["image"]["name"];
					$update=mysql_query("update products set productname='$prodname',price='$pri',image='$file' where id='$ids'");
					if($update)
					{
						echo "<font color='green'>Item has been Successfully Updated</font>";
					}
					else
					{
						echo "Failed to Update";
					}
				}
				
			}
	?>
			<h3 style='color:blue'>Product list</h3>
	
		  	   
				 <div style='float:left;'>
					
					<?php
					$sql=mysql_query("select * from products");
echo "<table class='table table-bordered'><thead 
style='background-color:black;color:#fff;'><tr><th>S.No</th><th>Id</th><th>type</th><th>productname</th><th>Price</th><th>Image
</th><th>Edit</th><th>Delete</th></tr></thead>";
$i=0;
while($row=mysql_fetch_array($sql))
{
	$i++;
	$id=$row['id'];
	$prname=$row['productname'];
	$type=$row['type'];
	$price=$row['price'];
	$image=$row['image'];
	echo "<tr><td>$i</td><td>$id</td><td>$type</td><td>$prname</td><td>$price</td><td><img src='$image' width='50px' height='50px;'></td><td><button id='edit' class='btn btn-primary' 
data-toggle='modal' data-target='#editfee' 
value='$id'>EDIT</button></td><td><button class='btn btn-warning' value='$id' id='delete'>DELETE</button></td></tr>";
	
}
echo "</table>";
?>
					 
</div>	
	<div class="modal fade" id="editfee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">

				</div>
				<div class="modal-career">

				</div>
			</div>
		</div>
	</div>
				
			</div>
    </div>
 </div>
</div>
   <div class="footer">
   	  
        <div class="copy_right">
				<p>© All rights Reseverd | Design by  Greesma</p>
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

