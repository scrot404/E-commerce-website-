<?php
if(isset($_POST["s1"]))
{
	include_once("vars.php");
	$name=$_POST["name"];
	$phn=$_POST["phone"];
	$email=$_POST["email"];
	$pass=$_POST["pass"];
	$pass2=$_POST["pass2"];
	$dob=$_POST["dob"];
	if(isset($_POST["gender"]))
	{
		$gen=$_POST["gender"];
	}
	else
	{
		$msg="please choose gender";
	}
	$utype="normal";
	if($pass==$pass2)
	{
			$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
			$q="insert into signup values('$name','$phn','$email','$pass','$dob','$gen','$utype')";
			mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
			$count=mysqli_affected_rows($conn);//for count data effect
			if($count==1)
			{
				$msg="thanks for Signup";
			}
			else
			{
				$msg="problem while connection,please try again";
			}

	}
	else
	{
		$msg="Your password does not match";
	}

}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Signup</title>
	<!--/tags -->
	<?php
		include_once("linkfiles.php");
	?>
</head>

<body>
	
	<?php
		include_once("header.php");
		include_once("navigation.php");
	?>
	
	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.php">Home</a>
						<i>|</i>
					</li>
					<li>Signup</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Signup
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="#" method="post">
							<div class="">
								<input class="form-control" type="text" name="name" placeholder="Name..." required="">
							</div>
							<div class="">
								<input class="form-control" type="text" name="phone" maxlength="10" minlength="10" placeholder="Mobile no..." required="">
							</div>
							<div class="">
								<input class="form-control" type="email" name="email" placeholder="Email..." required="">
							</div>
							<div class="">
								<input class="form-control" type="password" name="pass" placeholder="Password..." required=""><br>
							</div>
							<div class="">
								<input class="form-control" type="password" name="pass2" placeholder="RE	Enter Password..." required=""><br>
							</div>
							
							<div class="">
								Date of Birth
								<input class="form-control" type="date" name="dob" placeholder="DOB..." required=""><br>
							</div>
							<div class="">
							GENDER:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="gender" required="" value="female">Female</label>
								<label><input type="radio" name="gender" required="" value="male">Male</label><br><br>
							</div>
							<input type="submit" value="Submit" name="s1"><br><br>
							
							<?php
								if(isset($msg))
								{
									print $msg;
								}
							?>	
						</form>
					</div>
					
				</div>
			</div>
			<!-- //contact -->
		</div>
	</div>
	
	
	<?php
	include_once("footer.php");
	?>

</body>

</html>