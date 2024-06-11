<?php include 'ownerheader.php' ;

extract($_GET);


?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
    	</article>
    </div>
</div>

<center>
	<h1>View Payment</h1>
	<form>
	<table class="table" style="width: 500px">
		<tr>
			<th>sino</th>
			<th>bid</th>
			<th>amount</th>
			<th>date and time</th>
			
		</tr>
		<?php 

         $q="SELECT * FROM payments INNER JOIN bids USING (bid_id) INNER JOIN auctions USING(auction_id) where bid_id='$bid'";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         <tr>
         	<td><?php echo $sino++; ?></td>
         	<td><?php echo $row['bid_amount'] ?></td>
         	<td><?php echo $row['amount'] ?></td>
         	<td><?php echo $row['date_time'] ?></td>
         	
         </tr>
     <?php 
        }





		 ?>
	</table>
</form>
</center>
<?php include 'footer.php' ?>