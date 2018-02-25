<html>
    
    <head>
    	<?php include 'config.php'; ?>
    	<title><?php echo $_SESSION["username"]?> : profile</title>
        <link href="css/index.css" rel="stylesheet"/>
        <link href="css/home.css" rel="stylesheet"/>
        
        
    </head>
    
    <body>
    
    	<?php include 'user_home_nav.php';?>
    	
        
        
        <?php
		
			$sql = "SELECT * FROM user_info where email_id='".$_SESSION["userid"]."';";
			$result = mysqli_query($con, $sql);
			while ($row = mysqli_fetch_array($result)) 
			{
				$fname=$row["first_name"];
				$mname=$row["middle_name"];
				$lname=$row["last_name"];
				$dob=$row["date_of_birth"];
				$gender=$row["gender"];
				$contactno=$row["contact_no"];
				$image=$row["profile_picture"];
			}
		
		?>
        
        
        <div id="container">
        
        
        	<div id="user_profile_pic">
            
            <?php
				if($image=="0")
				{
					echo '<img src="Images/camera_icon.png" height="198"/>';
				}
				else
				{
					
					echo '<img src="User_Profile_Pictures/'.$image.'" height="198" width="198"/>';
				}
			?>
            	
            
            <form action="image_upload.php" method="post" enctype="multipart/form-data">
                <br/>
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input class="customButton" type="submit" value="Upload New Image" name="submit">
				<input type="hidden" name="username" value="<?php echo $_SESSION["userid"];?>" />
       		</form>
            
                
            </div>
        
        	<div id="table_div_noedit" class="table_div" style="display:block;">
                <table class="table_profile" width="280px" height="300" >
                
                    <tr>
                        <td width="200">First Name:</td>
                        <td align="center"><?php echo $fname; ?></td>
                    </tr>
                    
                    <tr>
                        <td>Middle Name:</td>
                        <td align="center"><?php echo $mname;?></td>                   
                    </tr>
                    
                    <tr>
                        <td>Last Name:</td>
                        <td align="center"><?php echo $lname;?></td>                   
                    </tr>
                    
                    <tr>
                        <td>Date of Birth:</td>
                        <td align="center"><?php echo $dob;?></td>               
                    </tr>
                    
                    <tr>
                        <td>Gender:</td>
                        <td align="center"><?php echo $gender;?></td>               
                    </tr>
                    
                    <tr>
                        <td>Contact No.</td>
                        <td align="center"><?php echo $contactno;?></td>               
                    </tr>
                    
                    <tr >
                    	<td style="border-top:2px solid #ccc;" colspan="2" align="center">
                        	<button class="customButton" onClick="edit()">
                            	EDIT INFO <img src="Images/edit.png" height="18"/>
                            </button>
                        </td>
                    </tr>
                
                </table>
            </div>
            
            <div id="table_div_edit" class="table_div" style="display:none;" >
               <form method="post" action="update_profile.php">
                <table class="table_profile" width="280px" height="250" border="0">
                
                    <tr>
                        <td width="200">First Name:</td>
                        <td align="center"><input type="text" name="fname_new" value="<?php echo $fname; ?>" /></td>
                    </tr>
                    
                    <tr>
                        <td>Middle Name:</td>
                        <td align="center"><input type="text" name="mname_new" value="<?php echo $mname; ?>" /></td>                   
                    </tr>
                    
                    <tr>
                        <td>Last Name:</td>
                        <td align="center"><input type="text" name="lname_new" value="<?php echo $lname; ?>" /></td>                   
                    </tr>
                    
                    <tr>
                        <td>Date of Birth:</td>
                        <td align="center"><?php echo $dob;?></td>               
                    </tr>
                    
                    <tr>
                        <td>Gender:</td>
                        <td align="center"><?php echo $gender;?></td>               
                    </tr>
                    
                    <tr>
                        <td>Contact No.</td>
                        <td align="center"><input type="text" name="contact_no_new" value="<?php echo $contactno;?>" /></td>               
                    </tr>
                    
                    <tr >
                    	<td style="border-top:2px solid #ccc;" colspan="2" align="center">
                        <input type="hidden" name="userid" value="<?php echo $_SESSION["userid"];?>" />
                        	<button class="customButton">
                            	SUBMIT <img src="Images/edit.png" height="18"/>
                            </button>
                        </td>
                    </tr>
                
                </table>
                </form>
            </div>
        
        </div>
        
        <?php include 'user_home_footer.php';?>
        
    </body>
    
    
    <script type="text/javascript">
	
		function edit()
		{
			document.getElementById("table_div_noedit").style.display="none";
			document.getElementById("table_div_edit").style.display="block";
			
		}
		
	</script>
    

</html>