<html>

<body>

<?php
	
	include 'config.php';
	$sql="insert into user_info values('".$_REQUEST["fname"]."','".$_REQUEST["mname"]."','".$_REQUEST["lname"]."','".$_REQUEST["gender"]."','".$_REQUEST["dob"]."','".$_REQUEST["contact"]."','".$_REQUEST["email"]."','".md5($_REQUEST["pass"])."','0');"; 
	
	$check=mysqli_query($con,$sql);	//execute query on the connection id 
	$_SESSION["message"]="You have been succesfully registered as:".$_REQUEST["email"].".";
	
	if($check===false)
	{
		$_SESSION["message"]="Sign up Failed! Please try again.";
		
	}
	header("Location:index.php");

?>


</body>



</html>