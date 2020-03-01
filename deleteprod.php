<?php
include_once("vars.php");
	$pid=$_GET["id"];
	$conn=mysqli_connect(host,dbuser,dbpass,dbname);//for connection of database
	$q="delete from addproduct where prodid='$pid'";
	mysqli_query($conn,$q);//for execute query
	$count=mysqli_affected_rows($conn);//for count data effect
	if($count==1)
	{
		header("location:manageprod.php");
	}
?>
