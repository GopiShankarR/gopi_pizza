<?php

$un=$_POST['username'];
$ps=$_POST['password'];


$con =mysqli_connect("localhost", "root", "", "gopi");

$s=mysqli_query($con,"select * from pizza where Username='$un' and Password='$ps'");

if ($r = mysqli_fetch_array($s)) 
{
	echo "valid username or password";
}

else
{
	echo "plz enter valid username or password";
	include "login.html";
}

?>