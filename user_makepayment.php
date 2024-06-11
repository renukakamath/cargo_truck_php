<?php include 'userheader.php';
extract($_GET);
if (isset($_POST['payment'])) {
	extract($_POST);

	$q="insert into payments  values(null,'$bid','$aid',curdate())";
	insert($q);
	
	alert('successfully');
	return redirect('user_viewbids.php');
}






 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Make Payment</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>Card Number</th>
				<td  style="color: black"><input type="text"  required="" class="form-control" name="cad"></td>
			</tr>
			<tr>
				<th>Cvv</th>
				<td  style="color: black"><input type="text"  required="" class="form-control" name="cvv"></td>
			</tr>
			<tr>
				<th>amount</th>
				<td  style="color: black"><input type="text"  required="" class="form-control" value="<?php echo $aid ?>" name="amount"></td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="payment" value="submit"></th>
			</tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<?php include 'footer.php' ?>