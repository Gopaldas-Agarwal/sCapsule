<html>

	<head>
    	<title>sCapsule: Login</title>
    
    	<link href="css/signup.css" rel="stylesheet"/>
        <link href="css/login.css" rel="stylesheet"/>
    </head>

    
    <div id="leftdiv">
    
     <form class="form-signup" id="form1">
        	<h1>LOG IN</h1>
            
            <ul>
            
                <li>
                    <label for="email">Email ID</label>
                    <input type="email" name="email" id="emailid" placeholder="abc@xyz.com" maxlength="100">
                    <span>Your email id(username)</span>
                </li>
                <li>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" maxlength="100">
                    <span>Enter your password here</span>
                </li>
               
				<li id="login_status" style="display:none;">
                	Incorrect ID or Passowrd.Please try again.
                </li>
               
                <li>
                    <input type="button" value="SUBMIT" onClick="loginverify()">
                </li>
            
            </ul>
           
        </form>
        
        
        <div id="nav">
        	<a href="index.php"><img src="signupImages/home.png" height="30px;"/></a>
        </div> 
        
      
       
    </div>
    
	<div id="rightdiv" style="background-image:url(signupImages/login1.jpg);">
    
    	<div class="submaindiv">

	        <div class="text">
            	<div id="heading" style="display:none;">sCapsule</div>
                <div id="tagline" style="display:none;">the home of social media.</div>
            </div>
        
        
        </div>
    
    </div>
	
    
    
    <script>
	
		var x=2;
		var imgName=document.getElementById("rightdiv").style.backgroundImage;
		changeBGImage();
		function changeBGImage()
		{
			
			document.getElementById("rightdiv").style.backgroundImage="url(signupImages/login" + x + ".jpg)";
			if(x==2)
			{
				document.getElementById("heading").style.display="block";
				document.getElementById("tagline").style.display="none";
			}
			else if(x==1)
			{
				document.getElementById("heading").style.display="none";
				document.getElementById("tagline").style.display="block";
			}
			x++;
			if(x>=3)
			{
				x=1;
			}
			//setInterval(changeBGImage(),3000);
	
			setTimeout(changeBGImage,5000);
			
		}
		
		
		function loginverify()
		{
			var str="?";
			str+="email=";
			str+=document.getElementById("emailid").value;
			str+="&password=";
			str+=document.getElementById("password").value;
			
			window.location.assign("verifylogin.php"+str);
			
		}
		
		
		<?php
			include 'config.php';
			if(isset($_SESSION["loginStatus"]))
			{
			
				if(isset($_SESSION["userid"]))
				{
					header("location:user_home.php");
				}
				else
				{
					?>
						<script>
							document.getElementById("login_status").style.display="block";
						</script>
					
					
					<?php
				}
			}
		
		?>
		
		
	
	</script>

</html>