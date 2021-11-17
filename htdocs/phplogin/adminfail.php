<!DOCTYPE html>
<html>
    <style>
* {
  	box-sizing: border-box;
  	font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
  	font-size: 16px;
  	-webkit-font-smoothing: antialiased;
  	-moz-osx-font-smoothing: grayscale;
}
@media only screen and (max-width:550px)
{
    .login
    {
        width:90%;
        margin:140px auto;
    }
}
@media only screen and (max-width:423px)
{
    .login
    {
        width:100%;
        margin-top:140px;
            margin-left: -9px;
    }
}
@media only screen and (max-width:378px)
{
    .f
    {
        display:none;
    }
    .rr
    {
display:none;
    }
    .rr2
    {
display:none;
    }
    .rrf
    {
        margin-top:30px;
    }
}
@media only screen and (min-width:378px)
{
   .rrf
{
    margin-top:70px;
}
    .rrf2
{
    margin-top:5px;
}
    .f
    {
        display:flex;
    }
    .rr
    {
display:flex;
    }
    .rr2
    {
display:flex;
    }
}
@media only screen and (min-width:551px)
{
    .login
    {
        width:500px;
  	margin:140px auto;
    }
}
body {
background-image:url('https://colorlib.com/etc/lf/Login_v4/images/bg-01.jpg');
background-repeat:no-repeat;
background-size:cover;
width:100%;
height:1000px;
}
.login {
    height:581px;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
}
.login h1 {
  	text-align: center;
  	color: #5b6574;
  	font-size: 39px;
  	padding: 60px 0 20px 0;
  	
}
.login form {
  	display: flex;
  	flex-wrap: wrap;
  	justify-content: center;
  	padding-top: 0px;
}
.login form label {
    
  	justify-content: center;
  	align-items: center;
  	width: 50px;
  	height: 50px;
  	color: #adadad;
}
.rr
{
    margin-left:-360px;
    margin-top:70px;
}

.rrf
{	width: 310px;
  	height: 50px;
  	border: 1px solid #fff;
    border-bottom: 1px solid #adadad;
  	margin-bottom: 20px;
  	padding: 0 15px;
          /* font-family: Poppins-Medium; */
     font-size: 16px; 
    color: #333;
    line-height: 1.2;
    display: block;
    background: transparent;
     
}
.rrf2
{	width: 310px;
  	height: 50px;
  	border: 1px solid #fff;
    border-bottom: 1px solid #adadad;
  	margin-bottom: 20px;
  	padding: 0 15px;
          /* font-family: Poppins-Medium; */
     font-size: 16px; 
    color: #333;
    line-height: 1.2;
    display: block;
    background: transparent;
     
}
.login form input[type="password"], .login form input[type="text"] {
  	width: 310px;
  	height: 50px;
  	border: 1px solid #fff;
    border-bottom: 1px solid #adadad;
  	margin-bottom: 20px;
  	padding: 0 15px;
          /* font-family: Poppins-Medium; */
     font-size: 16px; 
    color: #333;
    line-height: 1.2;
    display: block;
    background: transparent;
      
}



.login form input[type="submit"] {
  	width: 70%;
  	padding: 15px;
 	margin-top: 20px; 
     background: #0041C2;
  	border: 0;
  	cursor: pointer;
  	font-weight: bold;
  	color: #ffffff;
      border-radius:25px;
  	transition: background-color 0.2s;
}
.login form input[type="submit"]:hover {
	background-color: #2868c7;
  	transition: background-color 0.2s;
}
        </style>
	<head>
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body>
		<div class="login">
			<h1>insert student</h1>
			<form action="insert.php" method="post">
				<label class="f" for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Type your Username" id="username" required>
				<label class="rr" for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input minlength="6" class="rrf" type="password" name="password" placeholder="Type your Password" id="password" required>
                <label class="rr2" for="password">
				
				</label>
                
				<input maxlength="2" class="rrf2" type="password" name="Grade" placeholder="Type your Grade" id="password" required>
				<input type="submit" value="LOGIN">
                <br>
 <div style="height:50px;width: 70%;padding: 15px;margin-top: 40px;background: #2B547E;border: 0;cursor: pointer;font-weight: bold;color: #ffffff;border-radius:25px;transition: background-color 0.2s;">

                 <h3 style="color:white;text-align:center;margin-top:-4px;font-size:20px;">Duplicate Username</h3>
             </div>
			</form>
            
		</div>
	</body>
</html>











