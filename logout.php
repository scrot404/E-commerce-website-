<?php
session_start();
session_destroy();
if(isset($_COOKIE["uname"]))
{
	setcookie("uname","",time());
}
header("location:index.php");

?>