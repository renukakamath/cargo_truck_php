<?php include 'publicheader.php';

if (isset($_POST['userreg'])) {
	extract($_POST);
   $q2="select * from login where username='$uname' and password='$pwd'";
     $r=select($q2);
     if (sizeof($r)>0) {
     	alert('already exist');
     }else{

     $q1="insert into login values(null,'$uname','$pwd','user')";
    $id=insert($q1);
	$q2="insert into users values(null,'$id','$fname','$lname','$add','$place','$pin','$gen','$date','$number','$email') ";
	insert($q2);
	alert(' Successfully');
	return redirect('public_userregistration.php');

}

}



 ?>
 <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>User Registration</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>First Name</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="fname"></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td style="color: black"><input type="text"class="form-control"  required="" name="lname"></td>
			</tr>
			<tr>
				<th>Address</th>
				<td style="color: black"><textarea name="add" class="form-control"></textarea></td>
			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="place"></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td style="color: black"><input type="text"  class="form-control" required="" pattern="[0-9]{6}" name="pin"></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td style="color: black"><input type="radio"  name="gen"  required="" value="female">Female
					<input type="radio" name="gen"  required="" value="male">male</td>
			</tr>
			<tr>
				<th>DOB</th>
				<td style="color: black"><input type="date" class="form-control" required="" name="date"></td>
			</tr>
              <tr>
              	<th>Phone No</th>
              	<td style="color: black"><input type="text" class="form-control"  required="" pattern="[0-9]{10}" name="number"></td>
              </tr>
              <tr>
              	<th>Email</th>
              	<td style="color: black"><input type="email" class="form-control" required="" name="email"></td>
              </tr>
              <tr>
				<th>User Name</th>
				<td style="color: black"><input type="text"class="form-control"  required="" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td style="color: black"><input type="password" class="form-control" required="" name="pwd"></td>
			</tr>
              <tr>
              	<th align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="userreg" value="submit"></th>
              </tr>
		</table>
	</form>
</center>
</article>
</div>
</div>
<?php include 'footer.php' ?>