<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	die ('Please fill both the username and password field!');
}
if (preg_match('/[A-Za-z0-9]+/', $_POST['username']) == 0) {
    die ('Username is not valid!');
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	die ('Password must be between 5 and 20 characters long!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password,subject FROM teachers WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();
    if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password,$subject);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)&& $_POST['subject'] = $subject) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['teacherloggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $id;
        if($_POST['subject'] == "math")
{
 header('Location: mathteacher.php');   
}
      if($_POST['subject'] == "biology")
{
 header('Location: biologyteacher.php');   
}
  if($_POST['subject'] == "physics")
{
 header('Location: physicsteacher.php');   
}
 if($_POST['subject'] == "chemistry")
{
 header('Location: chemistryteacher.php');   
}
if($_POST['subject'] == "english")
{
 header('Location: englishteacher.php');   
}
if($_POST['subject'] == "science")
{
 header('Location: scienceteacher.php');   
}
if($_POST['subject'] == "islamic")
{
 header('Location: islamicteacher.php');   
}
if($_POST['subject'] == "arabic")
{
 header('Location: arabicteacher.php');   
}
if($_POST['subject'] == "ict")
{
 header('Location: ictteacher.php');   
}
	}

     else {
        header('Location:index2.html');
		echo 'Incorrect password!';
	}
} else {
    header('Location:index3.html');
	echo 'Incorrect username!';
}

$stmt->close();

}
?>
