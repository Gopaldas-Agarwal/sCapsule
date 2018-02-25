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

//************************** USER PROFILE PIC ***************//


function getFacebookImageFromURL($url)
{
  $headers = get_headers($url, 1);
  if (isset($headers['Location']))
  {
    return $headers['Location'];
  }
}

$url = 'https://graph.facebook.com/'.$userid.'/picture?type=large';
$profileImageURL = getFacebookImageFromURL($url);
echo '<br/><img src='.$profileImageURL.' />';


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

//******************************* USER FEEDS ********************//

$request = $fb->request('GET', '/me?fields=feed');
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

echo '<br/><br/>Your feeds<br/><br/>';
$graphNode = $response->getGraphNode();
//echo $graphNode;

$feeds=$graphNode['feed'];
//echo '<br/><br/>user feed messages:';
foreach ($feeds as $indfeed)
{
	 $feed_json_decoded=json_decode($indfeed);
	//print_r($feed_json_decoded);
	
	
	//******************************* FEED INFO ********************//	
	/*
	$request = $fb->request('GET', '/'.$feed_json_decoded->{'id'});
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
	echo $graphNode;
	*/
	
	
	if (array_key_exists('message', $feed_json_decoded))
	{ 
		echo "message: ".$feed_json_decoded->{'message'};
	}
	else if (array_key_exists('story', $feed_json_decoded))
	{ 
		echo "story:".$feed_json_decoded->{'story'};
	}
	//echo ' Post ID: '.$feed_json_decoded->{'id'};
	echo '<br/><br/>';
}






?>