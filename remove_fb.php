<?php
include 'config.php';
echo $sql="delete from user_accounts where email_id='".$_SESSION["userid"]."' and account='facebook';"; 
echo "<br/>";
$check=mysqli_query($con,$sql);
mysqli_error($con);
echo "Account removed";
unset($_SESSION["facebook"]);
unset($_SESSION["fb_access_token"]);
if($check===false)
{
	$_SESSION["message"]="Failed to remove account";
	mysqli_error($con);
}

echo '<br/><a href="user_accounts.php">Accounts</a>';

?>