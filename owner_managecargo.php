<?php include 'ownerheader.php' ;
$oid=$_SESSION['owner_id'];
extract($_GET);
if (isset($_POST['carg'])) {
	extract($_POST);

	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		$q="insert into cargo values(null,'$car','$oid','$name','$target','$des','pending')";
	     insert($q);

	alert(' Successfully');
	return redirect('owner_managecargo.php');

	
	}
		else
		{
			echo "file uploading error occured";
		}
	
	

}

if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from cargo where cargo_id='$did'";
	delete($q);
	alert('Delete Successfully');
	return redirect('owner_managecargo.php');
}

if (isset($_GET['uid'])) {
	extract($_GET);
	$q="SELECT * FROM cargo INNER JOIN cargo_category USING(category_id) WHERE cargo_id='$uid'";
	$res=select($q);

}
if (isset($_POST['update'])) {
	extract($_POST);



	$dir = "image/";
	$file = basename($_FILES['imgg']['name']);
	$file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	$target = $dir.uniqid("image_").".".$file_type;
	if(move_uploaded_file($_FILES['imgg']['tmp_name'], $target))
	{
		$q="update cargo set category_id='$car',name='$name',image='$target',description='$des'  where cargo_id='$uid'";
	update($q);
	alert('Update Successfully');
	return redirect('owner_managecargo.php');
	
	}
		else
		{
			echo "file uploading error occured";
		}
	
	

}



?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Manage Cargo</h1>
	<form method="post" enctype="multipart/form-data">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>category</th>
				<td  style="color: black"><select name="car"  required="" class="form-control">
					<option value="<?php echo $res[0]['category_id'] ?>"><?php echo $res[0]['category_name'] ?></option>
					<option>Select</option>
					<?php 

                 $q="select * from cargo_category";
                 $r=select($q);
                 foreach ($r as $row) {
                 	?>
                 <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
              <?php   }


					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Name</th>
				<td  style="color: black"><input type="text" name="name"  class="form-control" required="" value="<?php echo $res[0]['name'] ?>"></td>
			</tr>
			<tr>
				<th>Image</th>
				<td  style="color: black"><input type="file"  class="form-control" required="" value="<?php echo $res[0]['image'] ?>" name="imgg"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td  style="color: black"><input type="text" name="des"  class="form-control" required="" value="<?php echo $res[0]['description'] ?>"></td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit" name="update"  class="btn btn-success"  value="submit"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px">
			<tr>
				<th>category</th>
				<td  style="color: black"><select name="car" class="form-control"  required="">
					<option>Select</option>
					<?php 

                 $q="select * from cargo_category";
                 $r=select($q);
                 foreach ($r as $row) {?>
                 <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name'] ?></option>
              <?php   }


					 ?>
				</select></td>
			</tr>
			<tr>
				<th>Name</th>
				<td  style="color: black"><input type="text" class="form-control"  required="" name="name"></td>
			</tr>
			<tr>
				<th>Image</th>
				<td  style="color: black"><input type="file"  class="form-control" required="" name="imgg"></td>
			</tr>
			<tr>
				<th>Description</th>
				<td  style="color: black"><input type="text"  class="form-control" required="" name="des"></td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit" name="carg"  class="btn btn-success"  value="submit"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
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
			<th>Status</th>
		</tr>
		<?php 

        $q="SELECT * FROM cargo INNER JOIN cargo_category USING(category_id) INNER JOIN `OWNERS` USING (owner_id) WHERE owner_id='$oid'";
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
        		<td><?php echo $row['status'] ?></td>
        		<td><a class="btn btn-success" href="?uid=<?php echo $row['cargo_id'] ?>">update</a></td>
        		<td><a class="btn btn-success" href="?did=<?php echo $row['cargo_id'] ?>">delete</a></td>
        	</tr>
     <?php 
       }


		 ?>
	</table>
</center>
<?php include 'footer.php' ?>