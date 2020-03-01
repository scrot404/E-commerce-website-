<!-- navigation -->
	<div class="ban-top">
		<div class="container">
			<div class="agileits-navi_search">
				<form action="showsubcat.php" method="post">
					<select id="agileinfo-nav_search" name="cat" required="">
					<option value="all">All Categories</option>
					<?php
					include_once("vars.php");
					$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from addcat";
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect
					mysqli_close($conn);
					if($count==0)
					{
						print"<option value=''>No category found</option>";
					}
					else
					{
						while($x=mysqli_fetch_array($res))
						{
							print"<option value='$x[catid]'>$x[catname]</option>";
						}
					}
					?>		
					</select>
					<input type="submit" name="s1" value="Go" class="btn btn-marron" />
				</form>
			</div>
			<div class="top_nav_left">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav menu__list">
								<li class="active">
									<a class="nav-stylehead" href="index.php">Home
										<span class="sr-only">(current)</span>
									</a>
								</li>
								<?php
								$conn=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q="select * from addcat limit 4";
					$res=mysqli_query($conn,$q) or die ("error in query".mysqli_error($conn));//for execute query
					$count=mysqli_affected_rows($conn);//for count data effect
					mysqli_close($conn);
					if($count>0)
					{
						while($x=mysqli_fetch_array($res))
						{
							print'<li class="dropdown">
								
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$x["catname"].'
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">';
												$conn1=mysqli_connect(host,dbuser,dbpass,dbname)or die("error in connection".mysqli_connect_error());//for connection of database
					$q1="select * from addsubcat where catid='$x[catid]'";
					$res1=mysqli_query($conn1,$q1) or die ("error in query".mysqli_error($conn1));//for execute query
					$count1=mysqli_affected_rows($conn1);//for count data effect
					mysqli_close($conn1);
					if($count1>0)
					{
						while($x1=mysqli_fetch_array($res1))
						{
							print"<li><a href='showproduct.php?catid=$x[catid]&subid=$x1[subcatid]'>$x1[subcatname]</a>
													</li>";
						}
					}
												
							print'
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>';
						}
					}
								
								?>
								
								<li class="">
									<a class="nav-stylehead" href="contact.php">Contact</a>
								</li>
								<li class="dropdown">
								
									<a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User
										<span class="caret"></span>
									</a>
									<ul class="dropdown-menu multi-column">
										<div class="agile_inner_drop_nav_info">
											<div class="col-sm-12 multi-gd-img">
												<ul class="multi-column-dropdown">
													<?php
														if(isset($_SESSION["email"]))
														{
															print'<li><a href="orderhistory.php">
																<span class="fa fa-history" aria-hidden="true"></span>Order History</a></li>
															<li><a href="logout.php">
																<span class="fa fa-unlock-alt" aria-hidden="true"></span> Logout </a></li>
															<li>
																<a href="changepass.php">
																	<span class="fa fa-pencil-square-o" aria-hidden="true"></span>Change Password </a>
															</li>';
														}
														else
														{
															print'<li><a href="login.php">
															<span class="fa fa-unlock-alt" aria-hidden="true"></span> Login </a></li>
															<li>
																<a href="signup.php">
																	<span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a>
															</li>';
														}
													?>
												</ul>
											</div>
											<div class="clearfix"></div>
										</div>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<!-- //navigation -->