<?php include 'userheader.php' ;
$uid=$_SESSION['user_id'];
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
	<h1>View Bids</h1>
	<form>
	<table class="table" style="width: 500px">
		<tr>
			<th>auction</th>
			<th>user</th>
			<th>Date & time</th>
			<th>Bid Amount</th>
			<th>bid Status</th>
		</tr>
		<?php 

         $q="select * from bids inner join auctions using (auction_id) inner join users using (user_id) where user_id='$uid'";
         $res=select($q);
         foreach ($res as $row) {
         	?>
         <tr>
         	<td><?php echo $row['starting_amount'] ?></td>
         	<td><?php echo $row['first_name'] ?></td>
         	<td><?php echo $row['date_time'] ?></td>
         	<td><?php echo $row['bid_amount'] ?></td>
         	<?php 

            if ($row['bid_status']=="winner") {
            	?>
            		<td><a  class="btn btn-success"  href="user_makepayment.php?bid=<?php echo $row['bid_id'] ?>& aid=<?php echo $row['bid_amount'] ?>">Make Payment</a></td>
         <?php 
            }else{




         	 ?>
         	<td><?php echo $row['bid_status'] ?></td>
         
         </tr>
     <?php 
        }
}




		 ?>
	</table>
</form>
</center>
<?php include 'footer.php' ?>