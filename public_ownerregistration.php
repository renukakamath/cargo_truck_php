<?php include 'publicheader.php' ;

if (isset($_POST['ownreg'])) {
	extract($_POST);
     $q2="select * from login where username='$uname' and password='$pwd'";
     $r=select($q2);
     if (sizeof($r)>0) {
     	alert('already exist');
     }else{
	$q="insert into login values(null,'$uname','$pwd','pending')";
	$id=insert($q);

	$q1="insert into owners values(null,'$id','$name','$place','$str','$lm','$number','$email','pending')";
	insert($q1);
		alert(' Successfully');
	return redirect('public_ownerregistration.php');
}

}

?>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
    
     <center>
	<h1>Owner Registration</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th> Name</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="name"></td>
			</tr>
			
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="place"></td>
			</tr>
			<tr>
				<th>Street</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="str"></td>
			</tr>
			
			<tr>
				<th>Land Mark</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="lm"></td>
			</tr>
              <tr>
              	<th>Phone No</th>
              	<td style="color: black"><input type="text" class="form-control" required="" pattern="[0-9]{10}" name="number"></td>
              </tr>
              <tr>
              	<th>Email</th>
              	<td style="color: black"><input type="email" class="form-control"  required="" name="email"></td>
              </tr>
              <tr>
				<th>User Name</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td style="color: black"><input type="password" class="form-control"  required="" name="pwd"></td>
			</tr>
              <tr>
              	<th  align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="ownreg" value="submit"></th>
              </tr>
		</table>
	</form>
</center>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>

<?php include 'footer.php' ?>