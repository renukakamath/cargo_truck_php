<?php include 'userheader.php' ;
$uid=$_SESSION['user_id'];
extract($_GET);
if (isset($_POST['complaint'])) {
	extract($_POST);

	$q="insert into Complaints values(null,'$uid','$comp','pending',curdate())";
	insert($q);
	alert(' Successfully');
	return redirect('user_sendcomplaint.php');
}





?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Send Complaints</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>complaint</th>
				<td  style="color: black"><input type="text" name="comp"></td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit" class="btn btn-success" name="complaint" value="submit"></th>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<center>
	<h1>View Complaint</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>User</th>
			<th>Complaint</th>
			<th>Reply</th>
			<th>Date time</th>
		</tr>
		<?php 
    $q="select * from complaints inner join users using(user_id) where user_id='$uid'";
    $res=select($q);
    $sino=1;
    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    		<td><?php echo $row['reply'] ?></td>
    		<td><?php echo $row['date_time'] ?></td>
    	</tr>
    <?php 
}




		 ?>
	</table>
</center>
<?php include 'footer.php' ?>