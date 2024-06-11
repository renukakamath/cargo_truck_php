<?php include 'ownerheader.php' ?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
        </article>
    </div>
</div>
<center>
	<h1>View Category</h1>
	<table class="table" style="width: 500px">
		<tr>
			<th>Sino</th>
			<th>Category Name</th>
			<th>Category Description</th>
		</tr>
		<?php 

        $q="select * from cargo_category";
        $res=select($q);
        $sino=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $sino++; ?></td>
        		<td><?php echo $row['category_name'] ?></td>
        		<td><?php echo $row['category_description'] ?></td>
        		
        	</tr>
     <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>