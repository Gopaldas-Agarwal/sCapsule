<?php

include 'fb_index.php';
include 'config.php';

$helper = $fb->getRedirectLoginHelper();
try 
{
	$accessToken = $helper->getAccessToken();
} 
catch(Facebook\Exceptions\FacebookResponseException $e) 
{
	
	// When Graph returns an error
	echo 'Graph returned an error: ' . $e->getMessage();
	exit;
} 
catch(Facebook\Exceptions\FacebookSDKException $e) 
{
	// When validation fails or other local issues
	echo 'Facebook SDK returned an error: ' . $e->getMessage();
	exit;
}



//add user access token to the database
if (isset($accessToken)) 
{
	// Logged in!
	$_SESSION['facebook_access_token'] = (string) $accessToken;
	
	// Now you can redirect to another page and use the
	// access token from $_SESSION['facebook_access_token']
	echo "Access Token:<br/>".$_SESSION['facebook_access_token'];
	// OAuth 2.0 client handler
	$oAuth2Client = $fb->getOAuth2Client();
	echo "<br/>";
	// Exchanges a short-lived access token for a long-lived one
	$longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);



	echo "Long Live Access Token:<br/>".$longLivedAccessToken;
	echo "<br/>";
	echo $sql="insert into user_accounts values('".$_SESSION["userid"]."','facebook','".$longLivedAccessToken."');"; 
	echo "<br/>";
	$check=mysqli_query($con,$sql);	//execute query on the connection id 
	mysqli_error($con);
	echo "Account added";
	if($check===false)
	{
		$_SESSION["message"]="Failed to add account";
		mysqli_error($con);
	}
}

echo '<br/><a href="user_accounts.php">Accounts</a>';

//header("Location:user_accounts.php");



?>


