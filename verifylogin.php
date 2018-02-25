<html>
<body>

<?php
/*
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scapsule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$_SESSION["userid"]="".$_REQUEST["email"];
echo "<script>alert ('".$_SESSION["userid"]."');</script>";
*/


include 'config.php';

$sql = "SELECT * FROM user_info where email_id='".$_REQUEST["email"]."' and password='".md5($_REQUEST["password"])	."';";

$result = mysqli_query($con, $sql);

unset($_SESSION["loginStatus"]);
if (mysqli_num_rows($result) > 0)
{
  	echo "log in success";
	$_SESSION["loginStatus"]="1";
	$_SESSION["userid"]=$_REQUEST["email"];	
	
	while ($row = mysqli_fetch_array($result)) 
	{
		$username=$row["first_name"];
		$username=$username." ".$row["last_name"];
		
	}
	
	echo $_SESSION["username"]=$username;
	
	
	
}
else 
{
	echo "login fail";
	$_SESSION["loginStatus"]="0";
}

header("Location:login.php");
?>


</body>
</html>