<?php

include 'fb_index.php';

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_likes','user_posts','publish_actions','user_photos'];
$fb_loginUrl = $helper->getLoginUrl('http://localhost/scapsule/fb_login-callback.php', $permissions);

?>