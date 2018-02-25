<html>

    <head>
        <title>
            sCapsule: The home of sMedia 
        </title>
        <link href="css/index.css" rel="stylesheet"/>
        <link href="css/animate.css" rel="stylesheet"/>
        
        <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"/>
        <link href="css/font-awesome.css" />
        <link href="css/font-awesome.min.css"/-->
        
	</head>
	
    
	<img src="IndexImages/1.jpg" class="loadImages" />
    <img src="IndexImages/2.jpg" class="loadImages" />
    <img src="IndexImages/3.jpg" class="loadImages" />
    <img src="IndexImages/4.jpg" class="loadImages" />
    <img src="IndexImages/5.jpg" class="loadImages" />
    <img src="IndexImages/6.jpg" class="loadImages" />
    <img src="IndexImages/7.jpg" class="loadImages" />
    
    
	<div id="maindiv" >
		
        <img src="IndexImages/1.jpg" id="myBg1" class="myBg"/>
  		<img src="IndexImages/1.jpg" id="myBg2" class="myBg"/>
    
    	<div class="submaindiv">
    
            <div class="nav animated bounce bounceInDown">
                <ul>
                    <li><a href="signup.php">Sign up for free</a></li>
                    <li><a href="#">How it Works</a></li>
                    <li><a href="#">Help us improve</a></li>
                    <li><a href="login.php"><input type="button" value="Login"/></a></li>                    
                </ul>
            </div>
            
            <div class="text">
            	<div class="heading animated slideInLeft">welcome to sCapsule.</div><div/>
                <div class="tagline animated slideInRight">the home of social media.</div>
            </div>

    	</div>
        <div id="message" style="display:block;">

			<?php
                include 'message.php';        
            ?>
    
   		 </div>

    </div>
    
    
<script src="jquery/jquery-1.11.3.js" ></script>

<script type="">

$(document).ready(function()
	{
		$( "#message" ).fadeOut(7000);
		var x=2;
		var y=1;
		setInterval(function(){
			$("#myBg2").removeClass("animated slideInDown");
			setTimeout(function(){
				document.getElementById("myBg2").src="IndexImages/" + x + ".jpg";
				document.getElementById("myBg1").src="IndexImages/" + y + ".jpg";
				x++;
				y=x-1;
				if(x==8)
				{
					x=1;
				}
				if(y==0)
					y=1;
				$("#myBg2").addClass("animated slideInDown");
			},1000);
		},4000);
	});
	
	
	
	
	
	

</script>


<script>
	

//	changeBGImage();
	function changeBGImage()
	{
		$("#myBg2").removeClass("animated slideInDown");
		document.getElementById("myBg2").src="IndexImages/" + x + ".jpg";
		x++;
		if(x>=8)
		{
			x=1;
		}
		$("#myBg2").addClass("animated slideInDown");
		//setInterval(changeBGImage(),3000);

		setInterval(changeBGImage,5000);
		
	}
	
	
	
</script>


</html>