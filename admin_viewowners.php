<?php include 'adminheader.php';
extract($_GET);
if (isset($_GET['uid'])) {
   extract($_GET);

   $q="update login set user_type='owner' where login_id='$uid'";

   update($q);
   $q2="update owners set status='owner' where login_id='$uid'";
   update($q2);
     $r="select * from owners";
    $f=select($r);
    $oid=$f[0]['owner_id'];
    $q1="update owners set status='accept' where owner_id='$oid'";
    update($q1);
}
if (isset($_GET['did'])) {
    extract($_GET);

    $q="update login set user_type='block' where login_id='$did'";
    update($q);
    $q2="update ownersset status='block' where login_id='$uid'";
    update($q2);
    $r="select * from owners";
    $f=select($r);
    $oid=$f[0]['owner_id'];
    $q1="update owners set status='block' where login_id='$oid'";
    update($q1);
}



 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');" >
  <div id="pageintro" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Owners</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>Name</th>
			<th>Place</th>
            <th>Street</th>
            <th>Land Mark</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
		</tr>
		<?php 

        $q="select * from owners inner join login using(login_id) ";
        $res=select($q);
        $sino=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $sino++; ?></td>
        		<td><?php echo $row['name'] ?></td>
        		<td><?php echo $row['place'] ?></td>
                <td><?php echo $row['street'] ?></td>
                <td><?php echo $row['landmark'] ?></td>
                <td><?php echo $row['phone'] ?></td>
                <td><?php echo $row['email'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <?php 

                 if ($row['user_type']=="pending") {
                    ?>
                     <td><a  class="btn btn-success"  href="?uid=<?php echo $row['login_id'] ?>">accept</a></td>
                     <td><a  class="btn btn-success"  href="?did=<?php echo $row['login_id'] ?>">reject</a></td>
              <?php
               }


                 ?>
     </tr>
 <?php } ?>
	</table>
</center>
<?php include 'footer.php' ?>