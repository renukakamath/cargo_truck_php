<?php include 'userheader.php';
	$uid=$_SESSION['login_id'];
extract($_GET);
if (isset($_POST['message'])) {
	extract($_POST);

	$q="insert into message values(null,'$uid','$oid','user','owner','$msg',curdate())";
	insert($q);


}

 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Chat With Owner</h1>
	<form method="post">
	<table class="table" style="width: 500px">
		<tr>
			<th>Message</th>
			<td  style="color: black"><input type="text"  required="" class="form-control" name="msg"></td>
		</tr>
		<tr>
			<th  align="center" colspan="2"><input type="submit" name="message"  class="btn btn-success"  value="submit"></th>
		</tr>
	</table>
</form>
</center>
</article>
</div>
</div>

<center>
	<h1>View Chat</h1>
	<form>
		<table class="table" style="width: 400px">
			
			<?php 
      $q="SELECT * FROM message WHERE (`sender_id`='$uid' AND `receiver_id`='$oid') OR (`sender_id`='$oid' AND `receiver_id`='$uid')";
       $res=select($q);

      foreach ($res as $row) {
      	?>

      	<tr>
		<?php 
      	if($row['sender_id']==$uid)
      	{
      	 ?>      		
      	
      	<td align="right"><?php echo $row['message'] ?></td>
      	<?php 
      }
      	else
      		{
      			?>

      	<td align="left"><?php echo $row['message'] ?></td>

      	<?php
      	 }
      	 ?>      	</tr>
      <?php }


			 ?>
		</table>
	</form>
</center>
<?php include 'footer.php' ?>