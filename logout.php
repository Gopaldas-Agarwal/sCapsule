<?php
include 'config.php';
include 'message.php';
$_SESSION["message"]="You have been successfully logged out: ".$_SESSION["username"];
unset($_SESSION["userid"]);
unset($_SESSION["loginStatus"]);

header("Location:index.php");
?>