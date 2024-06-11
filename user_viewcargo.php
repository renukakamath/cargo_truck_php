<?php include 'userheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Cargo</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>category</th>
			
			<th>Name</th>
			<th>Image</th>
			<th>Description</th>
			
		</tr>
		<?php 

        $q="select * from cargo inner join cargo_category using(category_id)";
        $res=select($q);
        $sino=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $sino++; ?></td>
        		<td><?php echo $row['category_name'] ?></td>
        		<td><?php echo $row['name'] ?></td>
        		<td><img src="<?php echo $row['image'] ?>" width="100",height="100"></td>
        		<td><?php echo $row['description'] ?></td>
        		
        	</tr>
     <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>