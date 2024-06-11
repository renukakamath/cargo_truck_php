<?php include 'ownerheader.php' ;
$oid=$_SESSION['owner_id'];
extract($_GET);

if (isset($_POST['auction'])) {
	extract($_POST);

	echo$q="insert into auctions values(null,'$cid','$stime','$date','$amo','$inc','pending','$due')";
	$id=insert($q);
	echo$q="insert into bids values(null,'$id','0',now(),'$amo','pending')";
	insert($q);
	alert('Successfully');
	return redirect('owner_startauction.php');
}


if (isset($_GET['uid'])) {
   extract($_GET);

   $q="update auctions set auction_status='start' where auction_id='$uid'";
    update($q);
    $r="select * from auctions inner join cargo using (cargo_id)";
    $f=select($r);
    $cid=$f[0]['cargo_id'];
    $q1="update cargo set status='start' where cargo_id='$cid'";
    update($q1);



}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="update auctions set auction_status='stop' where auction_id='$did'";
    update($q);
    echo$r="SELECT *  FROM bids  INNER JOIN auctions USING (auction_id) INNER JOIN users USING (user_id)where auction_id='$did' ORDER BY bid_amount DESC";
    $m=select($r);
    $bid=$m[0]['bid_id'];
    $q="update bids status set bid_status='winner' where bid_id='$bid'";
    update($q);

}




?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Start Auction</h1>
	<form method="post">
	<table class="table" style="width: 500px">
		<tr>
			<th>Cargo</th>
			<td  style="color: black"><select name="cid"  class="form-control" required="">
				<option>select</option>
				<?php 

                $q="select * from cargo";
                $res=select($q);
                foreach ($res as $row) {
                	?>
                	<option value="<?php echo $row['cargo_id'] ?>"><?php echo $row['name'] ?></option>
               <?php 
                }



				 ?>
			</select></td>
		</tr>
		<tr>
			<th>Starting Time</th>
			<td  style="color: black"><input type="time"  class="form-control" required="" name="stime"></td>
		</tr>
		<tr>
			<th>Starting Date</th>
			<td  style="color: black"><input type="date"  class="form-control" required="" name="date"></td>
		</tr>
		<tr>
			<th>Starting Amount</th>
			<td  style="color: black"><input type="text"  class="form-control" required="" name="amo"></td>
		</tr>
		<tr>
			<th>Bid Increment</th>
			<td  style="color: black"><input type="text" class="form-control"  required="" name="inc"></td>
		</tr>
		<tr>
			<th>Duration</th>
			<td  style="color: black"><input type="text" class="form-control" required="" name="due"></td>
		</tr>
		<tr>
			<th  align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="auction" value="submit"></th>
		</tr>
	</table>
</form>
</center>
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
           
            <th>Duration</th>
             <th>Auction Status</th>
            
		</tr>
		<?php 

        $q="SELECT * FROM auctions INNER JOIN cargo USING (cargo_id) WHERE owner_id='$oid'";
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
                <td><?php echo $row['duration'] ?></td>
                 <?php 


               if ($row['auction_status']=="pending") {
                ?>

                  <td><a class="btn btn-success" href="?uid=<?php echo $row['auction_id'] ?>">start</a></td> 
                      <td><a  class="btn btn-primary"  href="owner_viewbids.php?aid=<?php echo $row['auction_id'] ?>">View Bids</a></td>
                
              <?php
               }else if ($row['auction_status']=="start") 
               {
                ?>

                <td><a class="btn btn-success" href="?did=<?php echo $row['auction_id'] ?>">Stop</a></td>

                <?php
               }else if ($row['auction_status']=="stop") 
               {
                ?>

                <td><a  class="btn btn-primary"  href="owner_viewbids.php?aid=<?php echo $row['auction_id'] ?>">View Bids</a></td>

                <?php
               }



               else{
               ?>

                  	  
                 <td><?php echo $row['auction_status'] ?></td>
                 <?php
             }
             ?>
               
        	</tr>
     <?php 
       
}
	 ?>
	</table>
</center>
<?php include 'footer.php' ?>