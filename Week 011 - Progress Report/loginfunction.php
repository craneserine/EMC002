<?php

session_start ();
// include("config.php"); 

if(isset($_REQUEST['submit']))
{
$a = $_REQUEST['username'];
$b = $_REQUEST['password'];

echo $a;

$con = mysqli_connect('localhost', 'root', '','birdcage');

$res = mysqli_query($con,"select* from users where username='$a'and password='$b'");
$result=mysqli_fetch_array($res);
if($result)
{
	
	$_SESSION["login"]="1";
	header("location:index.php");
}
else	
{
	header("location:login.php?err=1");
	
}
}
?>