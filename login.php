<?php
session_start();
if(isset($_POST["s1"]))
{
	require_once("vars.php");
	$un=$_POST["email"];
	$pass=$_POST["pass"];
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q="select * from signup where email='$un' and password='$pass'";
	$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		$x=mysqli_fetch_array($res);
		
		$_SESSION["email"]=$x["email"];
		$_SESSION["n"]=$x["name"];//global variabe
		$_SESSION["utype"]=$x["utype"];
		
		if(isset($_GET["pid"]))
		{
			$pid=$_GET["pid"];
			header("location:product.php?pid=$pid");
		}
		else if($x["utype"]=="admin")
		{
			header("location:adminindex.php");
		}
		else
		{
		
			header("location:index.php");
		}
	}
	else
	{
		$msg="Incorrect Username/Password";
	}
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shop : Login</title>
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
					<li>Login</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	<!-- contact page -->
	<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Login
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
						<form name="form1" method="post">
							<div class="">
								<input class="form-control" type="email" name="email" placeholder="Email..." required="">
							</div>
							<div class="">
								<input class="form-control" type="password" name="pass" placeholder="Password..." required=""><br>
							</div>
								
							<?php
								if(isset($msg))
								{
									print $msg;
								}
							?>	
							<br><input type="submit" value="Submit" name="s1">
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