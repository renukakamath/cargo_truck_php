<?php include 'userheader.php';
$uid=$_SESSION['user_id'];
extract($_GET);
if (isset($_POST['bids'])) {
	extract($_POST);
	 $q="insert into bids values(null,'$aid','$uid',now(),'$bamo','pending')";
	insert($q);
	alert(' Successfully');
	return redirect('user_viewauction.php');

}



 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');" >
  <div id="pageintro" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <article>
      
 <script type="text/javascript">
 	
 	var check = function() {
 		
  if (parseInt(document.getElementById('elm').value) >= parseInt(document.getElementById('elms').value)) {
    document.getElementById('message').style.color = 'red';
    document.getElementById('bids').style.visibility = "hidden";
    document.getElementById('message').innerHTML = 'Please enter value greater than above amount';
  }
  else{
  	document.getElementById('message').style.color = 'green';
  	document.getElementById('bids').style.visibility = "visible";
    document.getElementById('message').innerHTML = 'ok';
  }
}


 </script>

<center>
	<h1>Make Bids</h1>
	<form method="post">
		<table class="table" style="width: 500px">
		<?php
			$m="select * from bids where auction_id='$aid' order by bid_id desc";
      		$y=select($m);
		?>
		<tr>
			<th>Base/ Last Amount</th>
			<td style="color: black"><input type="text" class="form-control" value="<?php echo $y[0]['bid_amount'] ?>" id="elm" name="bamo"></td>
		</tr>
		<tr>
			<th>Bid Amount</th>
			<td style="color: black"><input type="text" class="form-control" name="bamo" id="elms" onchange ='check();'><span id='message'></span></td>
		</tr>
		<tr>
			<th align="center" colspan="2"><input type="submit" style="visibility: hidden;" name="bids" id="bids" class="btn btn-success" value="submit"></th>
		</tr>
	</table>
		
	</form>
</center>
  </article>
    </div>
</div>
<?php include 'footer.php' ?>