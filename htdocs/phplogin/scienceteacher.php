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
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
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
$sql = "SELECT * FROM presentation WHERE subject = 'science'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["studentname"]. "</td><td>" ."http://testfff.epizy.com/". $row["presentationlink"] . "</td><td>"
. $row["subject"]. "</td><td>". $row["grade"] . "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }

$conn->close();
?>
</table>
</body>
</html>