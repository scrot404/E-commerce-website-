<?php
	$id=$_GET["id"];
	include_once("vars.php");
	$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
	$q1="delete from addbrand where brandid='$id'";
	$res1=mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));//for execute query
	$count1=mysqli_affected_rows($conn);//for count data effect
	if($count1==1)
	{
		header("location:managebrand.php");
	}
?>