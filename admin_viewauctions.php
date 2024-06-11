<?php include 'adminheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');" >
  <div id="pageintro" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Auctions</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>cargo</th>
			<th>Starting Time</th>
            <th>Starting Date</th>
            <th>Starting Amount</th>
            <th>bid Increment</th>
           
            
		</tr>
		<?php 

        $q="select * from auctions inner join cargo using (cargo_id)";
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
          
            
                <td><a  class="btn btn-success"  href="admin_viewpayment.php?aid=<?php echo $row ['auction_id'] ?>">View payment</a></td>
             
               
        	</tr>
     <?php 
       
}


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>