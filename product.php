<?php
session_start();
include_once("vars.php");
$pid=$_GET["pid"];
$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
$q="select catname,subcatname,price,prodpic,prodname,addcat.catid,addsubcat.subcatid,discount,stock,description from addcat,addsubcat,addproduct where prodid='$pid'";
$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
$count=mysqli_affected_rows($conn);//for count data effect
$x=mysqli_fetch_array($res);
$dis=($x["price"]*$x["discount"])/100;
$tdis=$x["price"]-$dis;
$y1=$x["prodpic"];
$y2=$x["prodname"];
$y3=$x["price"];
$y4=$x["catname"];
$y5=$x["subcatname"];
$stk=$x["stock"];
$desc=$x["description"];
$y2=mysqli_real_escape_string($conn,$y2);
$y6=$x["discount"];

if(isset($_POST["s1"]))
{
	$qty=$_POST["qty"];
	$tamt=$qty*$tdis;
	if(isset($_SESSION["email"]))
	{
		$email=$_SESSION["email"];
		$q1="insert into addtocart(prodname,price,qty,tamt,prodpic,username,prodid) values('$y2','$tdis','$qty','$tamt','$y1','$email','$pid')";
		$res1=mysqli_query($conn,$q1) or die ("error in query".mysqli_error($conn));//for execute query
		$count1=mysqli_affected_rows($conn);//for count data effect
		mysqli_close($conn);
		header("location:cart.php");
	}
	else
	{
		header("location:login.php?pid=$pid");
	}
	
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Grocery Shop </title>
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
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Product Details</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->
	
	
		<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
		<div class="container">
		<div class="col-sm-5">
			<div class="col-md-5 single-right-left ">
				<img src="userupload/<?php print $y1?>" width="350" alt="">
			</div>
		</div>
		<div class="col-sm-7">
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h2><?php print $y2?></h2>
			</div><br><br>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Category :-
					<span class="item_price"><?php print $y4?></span></h4><br>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Subcategory :- 
					<span class="item_price"><?php print $y5?></span></h4><br>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Price :- 
					<span class="item_price">Rs. <?php print $y3?></span></h4><br>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Discount :- 
					<span class="item_price">Rs. <?php print $dis?></span></h4><br>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Remaining Price :- 
					<span class="item_price">Rs. <?php print $tdis?></span></h4><br>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<h4>Discription :- 
					<span class="item_price"><?php print $desc?></span></h4><br>
			</div>
			
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				
				<p>
				<span class="item_price">
				<?php
				if($stk==0)
				{
					print"Out of stock<br>";
				}
				else
				{
					?>
					<form name="form1" method="post" class="col-sm-12" >
				<select name="qty" class="form-control" required>
				<?php
				if($stk>=10)
				{
					for($i=1;$i<=10;$i++)
					{
							print"<option value='$i'>$i</option>";
					}
				}
				else
				{
					for($i=1;$i<=$stk;$i++)
					{
							print"<option value='$i'>$i</option>";
					}
				}
				
				?>
			</select><br><br>
			<input type="submit" value="Add to Cart" class="btn btn-danger" name="s1">
			
				</form>
				<?php
				}
				?>
				</span>
				</p>

			</div>
		</div>
			
			
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //Single Page -->
	
	
	
	<?php
	include_once("footer.php");
	?>
	

</body>

</html>