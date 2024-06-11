<?php include 'adminheader.php' ;

if (isset($_POST['cat'])) {
	extract($_POST);

	$q="insert into cargo_category values(null,'$catname','$des')";
	insert($q);

	alert(' Successfully');
	return redirect('admin_managecategory.php');

}

if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from cargo_category where category_id='$did'";
	delete($q);
	alert(' Successfully');
	return redirect('admin_managecategory.php');
}

if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from cargo_category where category_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update cargo_category set category_name='$catname',category_description='$des' where category_id='$uid'";
	update($q);
	alert(' Successfully');
	return redirect('admin_managecategory.php');

}



?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Manage Category</h1>
	<form method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Category Name</th>
				<td style="color: black"><input type="text" name="catname" required="" class="form-control"  value="<?php echo $res[0]['category_name'] ?>"></td>
			</tr>
			<tr>
				<th>Category Description</th>
				<td style="color: black"><input type="text" name="des"  required="" class="form-control" value="<?php echo $res[0]['category_description'] ?>"></td>
			</tr>
			<tr>
				<th align="center" colspan="2" ><input type="submit" name="update"  class="btn btn-success"  value="submit"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>Category Name</th>
				<td style="color: black"><input type="text"  required="" class="form-control" name="catname"></td>
			</tr>
			<tr>
				<th>Category Description</th>
				<td style="color: black"><input type="text"  required="" class="form-control" name="des"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="cat" class="btn btn-success" value="submit"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
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
        		<td><a  class="btn btn-success"  href="?did=<?php echo $row['category_id'] ?>">Detete</a></td>
        		<td><a  class="btn btn-success"  href="?uid=<?php echo $row['category_id'] ?>">Update</a></td>
        	</tr>
     <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>