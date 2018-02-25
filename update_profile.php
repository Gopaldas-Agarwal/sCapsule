<?php

	include 'config.php';
	
	echo $sql="update user_info set first_name='".$_POST["fname_new"]."', middle_name='".$_POST["mname_new"]."', last_name='".$_POST["lname_new"]."', contact_no='".$_POST["contact_no_new"]."' where email_id='".$_POST["userid"]."' ;"; 
	echo "<br/>";
	if (mysqli_query($con, $sql)) 
	{
		echo "Record updated successfully";
	} 
	else 
	{
		echo "Error updating record: " . mysqli_error($con);
	}
	mysqli_error($con);
	
	header("Location:user_profile.php");

?>