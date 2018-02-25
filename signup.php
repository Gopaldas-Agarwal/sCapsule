<html>

	<head>
    	<title>sCapsule:Signup</title>
    
    	<link href="css/signup.css" rel="stylesheet"/>
        <link href="css/animate.css" rel="stylesheet"/>
        
    </head>


	<div id="leftdiv" style="background-image:url(signupImages/login1.jpg);" class="animated slideInRight">
    
    	<div class="submaindiv">

	        <div class="text">
            	<div id="heading" style="display:none;">sCapsule</div>
                <div id="tagline" style="display:none;">the home of social media.</div>
            </div>
        
        
        </div>
    
    </div>
    
    
    <!--
    Form 1
    First Name
    Middle Name
    Last Name
    Gender
    DOB
    Mobile no
    Email Id
    
    Form 2
    Usename
    Password 
    Confirm pass
    -->
    
    
    <div id="rightdiv" class="animated slideInLeft">
    	<div class="form-signup" id="form1">
        	<h1>SIGN UP</h1>
            <ul>
            <li>
                <label for="name">First Name</label>
                <input type="text" name="fname" id="fname" placeholder="" maxlength="100">
                <span>Enter your first name here</span>
            </li>
            <li>
                <label for="name">Middle Name</label>
                <input type="text" name="mname" id="mname" placeholder="" maxlength="100">
                <span>Enter middle name here</span>
            </li>
            <li>
                <label for="name">Last Name</label>
                <input type="text" name="lname" id="lname" placeholder="" maxlength="100">
                <span>Enter your last name here</span>
            </li>
            <li>
                <label for="name">Gender</label>
                    <span style="width:100%; margin:auto; font-size:14px;">
                    <input type="radio" id="gendermale" name="gender" value="male" style="border:5px solid black; "/>
                    <font color="#CCFFFF">Male</font>
                    <input type="radio" id="genderfemale" name="gender" value="female"/>
                    <font color="#CCFFFF">Female</font>
					</span>                    
                    
                <span id="genderspan">Select your Gender </span>
                
            </li>
            <li>
                <label for="Date">Date of Birth</label>
                <input type="date" name="dob" id="dob">
                <span>Enter date of birth here</span>
            </li>
            <li>
                <label for="number">Mobile No.</label>
                <input type="text" name="contact" id="contactno" placeholder="" maxlength="10"/>
                <span>Enter a valid contact number</span>
            </li>
           
            <li>
                <input type="button" value="NEXT" onClick="nextForm();">
            </li>
            
            </ul>
            
             <div style="margin-left:45%; color:#CCFFFF">
            
            	<div id="step1" class="step" style="background-color:;"></div>
                <div id="step2" class="step" style="background-color:transparent;"></div>
            
            </div>
            
        </div>
        
        
        
        <div class="form-signup" id="form2" name="form2" style="display:block; opacity:0;">
            <h1>SIGN UP</h1>
            <ul>
            <li>
                <label for="email">Email ID</label>
                <input type="email" name="email" id="emailid" placeholder="abc@xyz.com" maxlength="100">
                <span>Enter a valid email-id here(this will be your username)</span>
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" id="password" name="pass1" maxlength="100">
                <span>Enter your password here</span>
            </li>
            <li>
                <label for="password">Confirm Password</label>
                <input type="password" id="re_password" name="pass2" maxlength="100">
                <span>Retype your password</span>
                
            </li>
            <span id="passworderror" class="wrongInfo passwordMatch"> Password don't match</span>
            <li>
                <input type="button" value="SUBMIT" onClick="verifyAccountinfo();">
            </li>
            
            </ul>
            <div style="margin-left:165px; color:#CCFFFF">
            
            	<div id="step1" class="step" style="background-color:transparent;"></div>
                <div id="step2" class="step" style="background-color:;"></div>
            
            </div>
        </div>
          
      
        <div id="nav">
        	<a href="index.php"><img src="signupImages/home.png" height="30px;"/></a>
        </div> 
       
    </div>
	
    
    <script src="jquery/jquery-1.11.3.js" ></script>
    <script>
		
		var x=1;
		var imgName=document.getElementById("leftdiv").style.backgroundImage;
		changeBGImage();
		function changeBGImage()
		{
			
			document.getElementById("leftdiv").style.backgroundImage="url(signupImages/login" + x + ".jpg)";
			if(x==1)
			{
				document.getElementById("heading").style.display="block";
				document.getElementById("tagline").style.display="none";
			}
			else if(x==2)
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
	
	
	
	
		function nextForm()
		{	
		
		/**/
			if(validatePersonalInfo())
			{
				$( "#form1" ).animate({
					opacity: 0,
				
				}, 1000,function(){
				
					document.getElementById("form1").style.display="none";
					
					$( "#form2" ).animate({
					opacity: 1,
					
					}, 1000);
				
				});
			}
			
		}
	
		function validatePersonalInfo()
		{

			
			nextTab=1;
			var letters = /^[A-Za-z]+$/; 
			
			$("#fname").next().removeClass("wrongInfo");
			$("#lname").next().removeClass("wrongInfo");
			$("#genderspan").removeClass("wrongInfo");
			$("#dob").next().removeClass("wrongInfo");
			$("#contactno").next().removeClass("wrongInfo");
			
			
			if(document.getElementById("fname").value.length < 3 || !document.getElementById("fname").value.match(letters) )
			{
				$("#fname").next().addClass("wrongInfo");
				nextTab=0;
				
			}
			if(document.getElementById("lname").value.length < 3 || !document.getElementById("lname").value.match(letters) )
			{
				$("#lname").next().addClass("wrongInfo");
				nextTab=0;
				
			}
			
			if(!document.getElementById("gendermale").checked)
			{
				if(!document.getElementById("genderfemale").checked)
				{
					$("#genderspan").addClass("wrongInfo");
					nexttab=0;
				}
			}
			
			
			
			if(!document.getElementById("dob").value)
			{
				$("#dob").next().addClass("wrongInfo");
				nextTab=0;
			}
				
			
			if ( isNaN(document.getElementById("contactno").value) || document.getElementById("contactno").value.length!=10)
			{
				$("#contactno").next().addClass("wrongInfo");
				nextTab=0;
				
			}
			
			if(nextTab)
				return true;
	
			return false;
			
		}
	
	
		function verifyAccountinfo()
		{
			nextTab=1;
			createuser=0;
			
			var email=document.getElementById("emailid").value;
			var atposition=email.indexOf("@");  
			var dotposition=email.lastIndexOf("."); 
			var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
			
			$("#passworderror").add("passwordMatch");	
			$("#emailid").next().removeClass("wrongInfo");
			$("#password").next().removeClass("wrongInfo");
			$("#re_password").next().removeClass("wrongInfo");
			
			if( document.getElementById("emailid").value=="" || !document.getElementById("emailid").value.match(mailformat) || atposition<1 || dotposition<atposition+2 || dotposition+2>=email.length) 
			{
				$("#emailid").next().addClass("wrongInfo");
				nextTab=0;
			}
			if(document.getElementById("password").value.length==0)
			{
				nexttab=0;
				$("#password").next().addClass("wrongInfo");
				
			}
			if( document.getElementById("re_password").value.length==0 )
			{
				nexttab=0;
				$("#re_password").next().addClass("wrongInfo");
			}
			if( (document.getElementById("password").value).localeCompare(document.getElementById("re_password").value)!=0 )
			{
				nextTab=0;
				$("#passworderror").removeClass("passwordMatch");	
			}
			
			
			if(nextTab)
			{
				createuser=1;
				
			}
			
			
			if(createuser)
			{
				var str="?";
				var fname=document.getElementById("fname").value;
				var mname=document.getElementById("mname").value;
				var lname=document.getElementById("lname").value;
				var gender;
				if(document.getElementById("gendermale").checked)
				{
					gender="m";
				}
				else if(document.getElementById("genderfemale").checked)
				{
					gender="f";
				}
				var dob=document.getElementById("dob").value;
				var contactno= parseInt( document.getElementById("contactno").value );
				var email=document.getElementById("emailid").value;
				var password=document.getElementById("password").value;
				
				
				str+="fname="+fname+"&mname="+mname+"&lname="+lname+"&gender="+gender;
				str+="&dob="+dob+"&contact="+contactno+"&email="+email+"&pass="+password;
				window.location="register.php" + str;
			}
		
		
		}
		
		
	
	
	
	
	</script>

</html>