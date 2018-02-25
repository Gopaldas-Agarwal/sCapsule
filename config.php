<?php
	session_start();
	$con = mysqli_connect("localhost","root",""); //connect to mysql and save connection id
	mysqli_select_db($con, "scapsule");	//connect to datababase
?>