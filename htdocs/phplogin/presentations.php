<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
// Change this to your connection info.
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// Try and connect using the info above.
$connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$target_dir = "presentations/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "doc" && $imageFileType != "docx" && $imageFileType != "ppt"
&& $imageFileType != "pptx" ) {
    echo "Sorry, only pptx, doc, docx & ppt files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $path = "presentations/".basename( $_FILES["fileToUpload"]["name"]);
         $name =  mysqli_real_escape_string($connection, filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING));
        $grade =  mysqli_real_escape_string($connection, filter_var($_REQUEST['grade'],FILTER_SANITIZE_NUMBER_INT));
        $subject =  mysqli_real_escape_string($connection, filter_var($_REQUEST['subject'],FILTER_SANITIZE_STRING));
    $query = "INSERT INTO presentation (studentname,presentationlink,subject,grade) VALUES ('$name','$path','$subject','$grade')";
        mysqli_query($connection,$query);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
<!DOCTYPE html>
<html>
<body>
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
<style>
body{
    font-family: 'Poppins';
    text-align:center;
}

@media only screen and (max-width:550px)
{
    .login
    {
        width:100%;
        margin-left:-30px;
    }
}
@media only screen and (max-width:468px)
{
.login form input[type="text"]
{
    margin-top:0px;
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
    .rrf
    {
        margin-top:30px;
    }
}
@media only screen and (max-width:408px)
{
    .login h1
    {
    font-size:40px;
    margin-bottom:40px;
}}
@media only screen and (min-width:408px)
{
    .login h1
    {
    font-size:60px;
   
}}
@media only screen and (min-width:378px)
{
   .rrf
{
    margin-top:70px;
}
    
    .f
    {
        display:flex;
    }
    .rr
    {
display:flex;
    }
}
@media only screen and (min-width:551px)
{
    .login
    {
        width:555px;
  	margin:140px auto;
    }
}
@media only screen and (min-width:469px)
{
.second
{
margin-top: 0px;
}
}
body {
background:#3f51b5;
background-repeat:no-repeat;
background-size:cover;
width:100%;
height:1000px;
 text-align:center; 
  vertical-align:middle;
font-family:'Poppins';
}
.login {
   height: 80%;
  	background-color: #ffffff;
  	box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
}
.login h1 {
  	text-align: center;
  	color: #333;
  	padding: 0px 0 20px 0;
        font-weight: 200;
  	
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
.first {
  	width: 465px;
      border: 1px solid #e4edf5;
    border-radius: 3px;
    box-shadow: none;
    height: 55px;
margin-left: 50px;
      
}

.second {
  	width: 465px;
      border: 1px solid #e4edf5;
    border-radius: 3px;
    box-shadow: none;
    height: 55px;
   margin-left: 47px;
      
}


.login form input[type="submit"] {
 width:40%;
    padding: 15px;
    margin: 30px auto;
    background: #3f51b5;
    border: 0;
    cursor: pointer;
    font-weight: 100;
    height: 50px;
   
    color: #ffffff;
    border-radius: 5px;
    text-align:center;
    transition: background-color 0.2s;
        margin-bottom: 20px;
}
.login form input[type="submit"]:hover {
	background-color: #337ab7;
  	transition: background-color 0.2s;
}
.idk:hover
{
    opacity:.8;
    transition:all .3s ease-in-out;
}
::-webkit-input-placeholder { /* Edge */
  color:  #bababa;
  font-weight:100;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
 color:  #bababa;
  font-weight:100;
}

::placeholder {
 color:  #bababa;
  font-weight:100;
}
@media only screen and (max-width:363px)
{
    .idk{
        margin-left:20%;
    }
    .what{width:100%;}
}
@media only screen and (min-width:363px)
{
    .idk{
        margin-left:30%;
    }
    .what{width:350px;}
}

.file-group {
 position: relative; */
    width: 150px;
    height: 40px;
    border: 1px solid #ccc;
    /* overflow: hidden; */
    line-height: 40px;
    font-size: 14px;
    color: #fff;
    background-color: #6781BC;
    border-radius: 4px;
    /* float: left; */
    /* margin-left: 20px; */
    /* margin-top: 100px; */
    display: block;
}
input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
}
.file-group input {
    float: left;
    width: 100%;
    height: 100%;
  position: absolute;
  right: 0;
  top: 0;
  opacity: 0;
  filter: alpha(opacity=0);
  cursor: pointer;
}
.file-group:hover {
  transition: all .3s ease-in;
  background-color: #4B6DBD;
}
::placeholder{
    color:#000;
}
</style>
<div class="login">
<form action="presentations.php" style="display: inline-block;vertical-align: middle;" method="post" enctype="multipart/form-data">
    <h1 style="text-align:center;font-size:30px;color:#000;">Upload presentation</h1>
    <div class="file-group" style="width:240px;height:60px;font-size: 19px;padding-top: 10px;">
<input type="file" name="fileToUpload" style="text-align:center;"  accept="application/java-vm"  id="J_File">upload presentation
</div>        
<br>
        <input type="text" style="display:inline-block" name="name" placeholder="your name"><br><br>
          <input type="text" name="grade" placeholder="your grade" ><br><br>
        <input type="text" name="subject" placeholder="your subject "> 
    <input type="submit" value="Upload" name="submit">
</form>
</div>
</body>
</html>