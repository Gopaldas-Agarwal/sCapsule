<html>
    
    <head>
    	<?php include 'config.php'; ?>
    	<title><?php echo $_SESSION["username"]?></title>
        <link href="css/index.css" rel="stylesheet"/>
        <link href="css/headerfooter.css" rel="stylesheet"/>
        
        
    </head>
    
    <body>
    
    	<?php include 'user_home_nav.php';?>
    	
        
        <div id="container">
        	<?php
								
				$sql = "SELECT * FROM user_accounts where email_id='".$_SESSION["userid"]."' and account='facebook';";
				
				$result = mysqli_query($con, $sql);
				
				if (mysqli_num_rows($result) > 0)
				{
					echo "Facebook Acoount linked.";
					$_SESSION["facebook"]="1";
					while ($row = mysqli_fetch_array($result)) 
					{
						$_SESSION["fb_access_token"]=$row["data"];
					}
					echo "<br/><a href='remove_fb.php'>Remove Facebook account</a>";
					
				}
				else 
				{
					include 'fb_login.php';
	        		echo '<a href="' . $fb_loginUrl . '">Add Facebook Account</a>';
					
				}
				
        	?>
        </div>
        
        <?php include 'user_home_footer.php';?>
        
    </body>

</html>