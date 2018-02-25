<?php

include 'fb_index.php';


// Sets the default facebook access token so we don't have to pass it to each request
if(isset($_SESSION["fb_access_token"]))
{
	$fb->setDefaultAccessToken($_SESSION["fb_access_token"]);
}

//***********************USER NAME and ID********************//
$request = $fb->request('GET', '/me');
// Send the request to Graph
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();
$userid= $graphNode['id'];
//echo 'Logged in as: ' . $graphNode['name'];
//echo '<br/>User id: ' . $graphNode['id'].'<br/>';
//echo $graphNode;


//******************************* NEW POST ********************//
if(isset($_POST["newPost"]) && $_POST["newPost"]!=" ")
{
$request = $fb->request(
'POST',
  '/me/feed',
  array (
    'message' => ''.$_POST["newPost"],
  ));
  
  
  
try {
  $response = $fb->getClient()->sendRequest($request);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$graphNode = $response->getGraphNode();
die();
}


?>