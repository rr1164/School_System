<?php
session_start();
// If the user is not logged in redirect to the login page...

$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// Try and connect using the info above.
$connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['adminloggedin'])) {
	header('Location:http://testfff.epizy.com/phplogin/adminlogin.html');
	exit();
}
?>
<html lang="en">
<head>
 <script src="https://kit.fontawesome.com/d394424536.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
	<title>Table V03</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    body
    {
      
    /* background: #fa71cd; */
    background: -webkit-linear-gradient(bottom,#c471f5,#fa71cd);
  overflow-x:auto;    
    }

*
    {
        font-family: 'Poppins';
    }
    .overlay {
  /* Display over the entire page */
  position: fixed;
  z-index: 99;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.9);

  /* Horizontal and vertical centering of the image */
  display: flex;
  align-items: center;
  text-align: center;

  /* We hide all this by default */
  visibility: hidden;
}

.overlay img{
  /* Maximum image size */
  max-width: 90%;
  max-height: 90%;

  /* We keep the ratio of the image */
  width: auto;
  height: auto;
    margin: 0 auto;
    display: block;
}
    .overlay:target {
  visibility: visible;
  outline: none;
  cursor: default;
}
#table-wrapper {
  position:relative;
}
#table-scroll {
  height:auto;
  overflow-x:auto;  
  margin-top:220px;
}
#table-wrapper table {
  width:100%;

}::-webkit-scrollbar {
  width: 4px;
  border: 1px solid #d5d5d5;
}

::-webkit-scrollbar-track {
  border-radius: 0;
  background: #eeeeee;
}

::-webkit-scrollbar-thumb {
  border-radius: 0;
  background: #b0b0b0;
}
.content-table {
  border-collapse: collapse;
  margin: 0 auto;
  margin-top:100px;
  font-size: 0.9em;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  height:300px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
  
}

.content-table th,
.content-table td {
  padding: 12px 15px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
  background-color: #fff;
}


.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}


    </style>
</head>	
        <div style="display:none;">
      <h1 style="display:none;"><?php
    /*while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src=$path>";

      echo "</div>";
    }*/
  ?></h1></div>
	<body>
<center style="margin-top:-200px;">
    <form action="" method="POST" enctype="multipart/form-data">
<div id="table-wrapper">
  <div id="table-scroll">
        <table width="100%" cellspacing="10" style="overflow:hidden;" border="1" class="content-table" >
            <thead style="">
                <tr style="font-size:30px;color:#fff;font-weight:100;border-radius:20px;text-align:center;;">
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;width:150px;">userid</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;width:150px;">birthdate</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;width:450px;"> BirthCertifcate</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">parentPassport</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">studentPassport</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">ParentIqama</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">StudentIqama</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Reportcard</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">FingerPrint</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">noor record</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">ministry approval</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">leaving certificate</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Employment</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Immunization</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Colored Passport</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Colored Photograph</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;">Email</th>
                    <th style="border:1px solid white;color:#fff;font-weight:100;border-radius:5px;width:30px;">Operations</th>
                </tr>
            </thead>
       <?php
             // Create database connection
      // Initialize message variable
    $db = mysqli_select_db($connection,'admission');
  $query = "SELECT * FROM admission";
  $query_run = mysqli_query($connection,$query);
    while ($row = mysqli_fetch_array($query_run)) {
      	
  ?>    
            <tr style="overflow:auto;width:450px;">
                <td style=";"><?php echo "<h1 style='font-family:lato;text-align:center;border:1px solid transparent'>".$row['id']."</h1>"?></td>
                <td style=";"><?php echo "<h1 style='font-family:lato;text-align:center;border:1px solid transparent'>".$row['birthdate']."</h1>"?></td>
                <td style="width:450px;"><?php echo "<a href='#birth-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['birthcertificate']."' ></a>";?></td>
                 <td style="width:450px;"><?php echo "<a href='#parentpassport-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['parentpassport']."' ></a>";?></td>
                 <td style="width:450px;"><?php echo "<a href='#studentpassport-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['studentpassport']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#parentiqama-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['parentiqama']."' ></a>";?></td>
                 <td style="width:450px;"><?php echo "<a href='#student-iqama-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['studentiqama']."' ></a>";?></td>
                 <td style="width:450px;"><?php echo "<a href='#report-card-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['reportcard']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#finger-print-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['fingerprint']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#noor-record-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['noor']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#noor-record-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['ministry']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#leaving-record-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['leavingcertificate']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#employment-record-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['employment']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#immunization-record-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['Immunization']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#colored-passport-id'><img style='margin:0 auto;display:block;width: 350px;;height:auto' src='".$row['coloredpassport']."' ></a>";?></td>
                <td style="width:450px;"><?php echo "<a href='#colored-photograph-id'><img style='margin:0 auto;display:block;width: 350px;height:auto' src='".$row['coloredphotograph']."' ></a>";?></td>
                <td style="width:50px;"><?php  echo "<h1 style='font-size:25px;font-family:lato;text-align:center;border:1px solid transparent'>".$row['email']."</h1>"?></td>
                <td style="width:10px;height:50px;"><a style="float:left;" href="<?php echo "delete.php?id=".$row['id'].""?>"><i style="color:#BA2D0B;font-size:40px;text-align:center;margin-left:30px;" class="far fa-trash-alt"></i></a>
                <a style="float:left;" href="<?php echo "mailto:".$row['email']."?Subject=you have been accepted&amp;body= you have been accepted in the first part of admission but you need to bring the following documents to the school:%0D%0A%0D%0A%0D%0A%0D%0A your id number is:".$row['id']."%0D%0A%0D%0A Note:%0D%0A%0D%0A Please tell the school representatives your id number when asked for.%0D%0A%0D%0A%0D%0A";?>"><i style="color:#00909e;font-size:40px;text-align:center;margin-left:30px;" class="fas fa-check"></i></a>
   <a style="float:left;" href="<?php echo "mailto:".$row['email']."?Subject=unfortunately,you have not been accepted&amp;body= unfortunately,you have not been accepted in the first part of admission for the following reasons %0D%0A reason 1 : %0D%0A reason 2: ";?>"><i style="color:#c70d3a;font-size:40px;text-align:center;margin-left:40px;margin-top:30px;" class="fas fa-times-circle"></i></a>
   <a style="float:left;" href="<?php echo "https://api.whatsapp.com/send?phone=+".$row['telephonenumber']."&text= you have been accepted in the first part of admission but you need to bring the following documents to the school:
%0a
 your id number is:".$row['id']
?>"><i style="color:#08c9c2;font-size:40px;text-align:center;margin-left:20px;margin-top:30px;" class="fas fa-mobile-alt"></i></a>
   <a style="float:left;" href="<?php echo "https://api.whatsapp.com/send?phone=+".$row['telephonenumber']."&text= unfortunately,you have not been accepted in the first part of admission for the following reasons %0D%0A reason 1 : %0D%0A reason 2: "
?>"><i style="color:#c70d3a;font-size:40px;text-align:center;margin-left:50px;margin-top:30px;" class="fas fa-mobile-alt"></i></a>
   </td>

            <a href="#_" class="overlay" id="birth-id">
  <img src="<?php echo "".$row['birthcertificate']."" ?>" alt="Fullscreen">
</a>  <a href="#_" class="overlay" id="parentpassport-id">
  <img src="<?php echo "".$row['parentpassport']."" ?>" alt="Fullscreen">
</a>
                <a href="#_" class="overlay" id="studentpassport-id">
  <img src="<?php echo "".$row['studentpassport']."" ?>" alt="Fullscreen">
</a>
                <a href="#_" class="overlay" id="parentiqama-id">
  <img src="<?php echo "".$row['parentiqama']."" ?>" alt="Fullscreen">
</a>
                 <a href="#_" class="overlay" id="student-iqama-id">
  <img src="<?php echo "".$row['studentiqama']."" ?>" alt="Fullscreen">
</a>
                    <a href="#_" class="overlay" id="report-card-id">
  <img src="<?php echo "".$row['reportcard']."" ?>" alt="Fullscreen">
</a>
          <a href="#_" class="overlay" id="finger-print-id">
  <img src="<?php echo "".$row['fingerprint']."" ?>" alt="Fullscreen">
</a>   
                   <a href="#_" class="overlay" id="noor-record-id">
  <img src="<?php echo "".$row['noor']."" ?>" alt="Fullscreen">
</a>  
                  <a href="#_" class="overlay" id="leaving-record-id">
  <img src="<?php echo "".$row['leavingcertificate']."" ?>" alt="Fullscreen">
</a>    
    <a href="#_" class="overlay" id="employment-record-id">
  <img src="<?php echo "".$row['employment']."" ?>" alt="Fullscreen">
</a> 
 <a href="#_" class="overlay" id="immunization-record-id">
  <img src="<?php echo "".$row['Immunization']."" ?>" alt="Fullscreen">
</a> 
<a href="#_" class="overlay" id="colored-photograph-id">
  <img src="<?php echo "".$row['coloredphotograph']."" ?>" alt="Fullscreen">
</a> 
<a href="#_" class="overlay" id="colored-passport-id">
  <img src="<?php echo "".$row['coloredpassport']."" ?>" alt="Fullscreen">
</a> 
<a href="#_" class="overlay" id="telephone-number-id">
  <img src="<?php echo "".$row['email']."" ?>" alt="Fullscreen">
</a> 
            </tr>
            <?php 
    }
            ?>
        </table>
          </div>
</div>
    </form>
    
</center>


<script type="text/javascript">var maindiv;$mainDiv.mousedown(function (event) {
    sliding = true;
    startClientX = event.clientX;
    return false;
}).mouseup(function (event) {
    var step = event.clientX - startClientX, 
        dir = step > 0 ? 1 : -1;

    step = Math.abs(step);

    move(dir, step);
});</script>
<script>function move(dir, step) {
   var $ul = $mainDiv.find('ul'),
       liWidth = $ul.find('li').width();

   $ul.animate({
      left: '+=' + (dir * liWidth)
   }, 200);
}</script>
</body>
</html>