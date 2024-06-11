<?php include 'ownerheader.php' ;
extract($_GET);

if (isset($_POST['uid'])) {
	extract($_POST);
	$q="update bids set bid_status='winner' where bid_id='$uid'";
	update($q);

	
}




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

         $q="SELECT *  FROM bids  INNER JOIN auctions USING (auction_id) INNER JOIN users USING (user_id) WHERE auction_id='$aid' ORDER BY bid_amount DESC ";
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
            	<td><a class="btn btn-success" href="owner_viewpayment.php?bid=<?php echo $row['bid_id'] ?>">View Payment</a></td>
            	<td><a class="btn btn-success" href="owner_chatwithuser.php?uid=<?php echo $row['login_id'] ?>">Chat with User</a></td>
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