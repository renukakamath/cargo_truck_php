<?php include 'adminheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');" >
  <div id="pageintro" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Complaints</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>User</th>
			<th>Complaint</th>
			
			<th>Date time</th>
			<th>Reply</th>
		</tr>
		<?php 
    $q="select * from complaints inner join users using(user_id)";
    $res=select($q);
    $sino=1;
    foreach ($res as $row) {
    	?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['complaint'] ?></td>
    
    		<td><?php echo $row['date_time'] ?></td>
    		<?php 
            if ($row['reply']=='pending') {
            	?>
            <td><a  class="btn btn-success"  href="admin_sendreply.php?cid=<?php echo $row['complaint_id'] ?>">send Reply</a></td>
          <?php 
            }else{


    		 ?>
    	    <td><?php echo $row['reply'] ?></td>
    	</tr>
    <?php 
}
}



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>