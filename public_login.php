<?php include 'publicheader.php';

if (isset($_POST['login'])) {
	extract($_POST);

	$q="select * from login where username='$uname' and password='$pwd'";
	$res=select($q);
	if (sizeof($res)>0) {
		$_SESSION['login_id']=$res[0]['login_id'];
		$lid=$_SESSION['login_id'];
		if ($res[0]['user_type']=="admin") {
			return redirect('admin_home.php');

		}elseif ($res[0]['user_type']=="owner") {
			$q="select * from owners where login_id='$lid'";
			$res=select($q);
                 if ($res>0) {
                 $_SESSION['owner_id']=$res[0]['owner_id'];
                 $oid=$_SESSION['owner_id'];
                 }
			
			return redirect('owner_home.php');
		}elseif ($res[0]['user_type']=="user") {
			$q="select * from users where login_id='$lid'";
			$res=select($q);
			if ($res>0) {
				$_SESSION['user_id']=$res[0]['user_id'];
				$uid=$_SESSION['user_id'];
			}

			return redirect('user_home.php');
		}
	}else{
		alert('invalid username and password');
	      }

}




 ?>
  <div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/fAcTDB.webp');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
<center>
	<h1>Login</h1>
	<form method="post">
		<table class="table" style="width: 500px">
			<tr>
				<th>User Name</th>
				<td style="color: black"><input type="text" class="form-control"  required="" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td style="color: black"><input type="password"  class="form-control" required="" name="pwd"></td>
			</tr>
			<tr>
				<th  align="center" colspan="2"><input type="submit"  class="btn btn-success"  name="login"></th>
			</tr>
		</table>
	</form>
</center>
</article>
</div></div>
<?php include 'footer.php' ?>