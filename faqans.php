<?php
include('db.php');
session_start();
//@$email=$_SESSION['email'];
$qid=$_POST['ans'];
$sql=mysql_query("select * from questions where id='$qid'");
while($row=mysql_fetch_array($sql)){
	@$mail=$row['email'];
}

?>
  <!-- <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
	<script>
		$(document).ready(function(){
			$(document).on('click','#post',function(){
				var name=$('#name').val();
				var ans=$('#ans').text();
				var mail='<?php echo $mail;?>';
				var qid='<?php echo $qid;?>';
				alert(name);
				$.ajax({
					type:'POST',
					url:'faqanspost.php',
					data:'ans='+ans+'&name='+name+'&mail='+mail+'&qid='+qid,
						success:function(data)
						{
							alert(data);
						}
				})
			});
		});
	</script>-->

	<div class="content">
<?php		
?>
	<form method="post">
			<table class="details">
			<tr><td>Name</td><td><input type='text' class="field" id='name' name='name' placeholder='Name' value='' required><td><tr>
			<tr><td>Answer</td><td>
			<textarea rows='2' cols='30' id='ans' class="field" name='ans' placeholder='Answer' required></textarea>
			<!--<input type='text' name='ans' id='ans' required placeholder='Answer' class="field" style="width:205px; height:50px;overflow=scroll;"/>-->
			<td><tr>
		</table>
		<input type="hidden" value='<?php echo $qid;?>' name='qid'/>
		<input type="hidden" value='<?php echo $mail;?>' name='mail'/>
		<input type='submit' class='search-submit' id='post' name='submit' value='Post'>
		</form>
    </div>
	