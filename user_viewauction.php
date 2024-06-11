<?php include 'userheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
    	</article>
    </div>
</div>
<center>
	<h1>View Auction</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>Cargo</th>
			
			<th>Starting Time</th>
			<th>Starting Date</th>
			<th>Starting Amount</th>
			<th>Bid increment</th>
			<th>Deuration</th>
			<th>Auction Status</th>
		</tr>
		<?php 

        $q="SELECT * FROM auctions INNER JOIN cargo USING (cargo_id) INNER JOIN owners USING (owner_id)";
        $res=select($q);
        $sino=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $sino++; ?></td>
        		<td><?php echo $row['name'] ?></td>
        		<td><?php echo $row['starting_time'] ?></td>
        	<td><?php echo $row['starting_date'] ?></td>
        		<td><?php echo $row['starting_amount'] ?></td>
        		<td><?php echo $row['bid_increment'] ?></td>
        		<td><?php  echo $row['duration'] ?></td>
        	<?php 

             if ($row['auction_status']=="start") {
             	?>
             <td><a  class="btn btn-success"  href="user_makebids.php?aid=<?php echo $row['auction_id'] ?>">Make Bid</a></td>
        		<td><a  class="btn btn-danger"  href="user_chatwithowner.php?oid=<?php echo $row['login_id'] ?>"> chat with owner</a></td>
           <?php 
             }else{




        	 ?>
        		<td><?php echo $row['auction_status'] ?></td>
        		
        	</tr>
     <?php 
       }

}
		 ?>
	</table>
</center>
<?php include 'footer.php' ?>