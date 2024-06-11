<?php include 'adminheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');" >
  <div id="pageintro" class="hoc clear" > 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Users</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>First Name</th>
			<th>Last Name</th>
            <th>Adderss</th>
            <th>Place</th>
            <th>Pincode</th>
            <th>Gender</th>
            <th>Dob</th>
            <th>Phone</th>
            <th>Email</th>
		</tr>
		<?php 

        $q="select * from users";
        $res=select($q);
        $sino=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $sino++; ?></td>
        		<td><?php echo $row['first_name'] ?></td>
        		<td><?php echo $row['last_name'] ?></td>
                <td><?php echo $row['house_name'] ?></td>
                <td><?php echo $row['place'] ?></td>
                <td><?php echo $row['pincode'] ?></td>
                <td><?php echo $row['gender'] ?></td>
               <td><?php echo $row['dob'] ?></td>
                 <td><?php echo $row['phone'] ?></td>
               <td><?php echo $row['email'] ?></td>
               
        	</tr>
     <?php 
       
}

		 ?>
	</table>
</center>
<?php include 'footer.php' ?>