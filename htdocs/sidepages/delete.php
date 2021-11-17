<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: phplogin/index.html');
	exit();
}
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
mysqli_select_db($con,'admission');
  $sql = "DELETE FROM admission WHERE ID='$_GET[id]'";
    if(mysqli_query($con,$sql))
        header("refresh:1;url=modir.php");
    else
        echo "Not deleted";
?>