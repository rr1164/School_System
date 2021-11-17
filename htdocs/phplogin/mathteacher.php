<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
#Presentations
{
    display:none;
}
th {
background-color: #588c7e;
color: white;
}

.sidenav {
  height: 100%;
  width: 160px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.openpresentations #Presentations:target{display:block}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>

<div class="sidenav">
  <a class="openpresentations" href="#Presentations">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>

   <div id="Presentations">
<h1 style="text-align:center;font-family: monospace;">Presentations</h1>
<table>
<tr>
<th>studentname</th>
<th>presentationlink</th>
<th>subject</th>
<th>grade</th>
</tr>
<?php
// Change this to your connection info.
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
} 
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['teacherloggedin'])) {
	header('Location:http://testfff.epizy.com/phplogin/adminlogin.html');
	exit();
}
$sql = "SELECT * FROM presentation WHERE subject = 'math'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["studentname"]. "</td><td>" ."<a href='http://testfff.epizy.com/phplogin/". $row["presentationlink"] ."'>Click here</a></td><td>"
. $row["subject"]. "</td><td>". $row["grade"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }

$conn->close();
?>
</table>
</div>
</body>
</html>