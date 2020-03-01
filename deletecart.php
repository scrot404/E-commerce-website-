<?php
include_once("vars.php");
$cart=$_GET["cart"];
$conn=mysqli_connect(host,dbuser,dbpass,dbname) or die("error in connection".mysqli_connect_error);
		$q="delete from addtocart where srno='$cart'";
		mysqli_query($conn,$q) or die("error in query".mysqli_error($conn));
		$count=mysqli_affected_rows($conn);
		mysqli_close($conn);
		if($count==1)
		{
			header("location:cart.php");
		}
?>