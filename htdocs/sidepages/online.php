<html><link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
</html>
<?php
if(isset($_POST['submit'])){
$DATABASE_HOST = 'sql101.epizy.com';
$DATABASE_USER = 'epiz_24624337';
$DATABASE_PASS = 'HMIWexH7yF14';
$DATABASE_NAME = 'epiz_24624337_phplogin';
// We need to use sessions, so you should always start sessions using the below code.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 $tele =  mysqli_real_escape_string($con, filter_var($_REQUEST['tele'],FILTER_SANITIZE_NUMBER_INT));
 $birthdate =  mysqli_real_escape_string($con, filter_var($_REQUEST['birthdate'],FILTER_SANITIZE_NUMBER_INT));
  $telephonenum =  mysqli_real_escape_string($con, filter_var($_REQUEST['telephone'],FILTER_SANITIZE_EMAIL));
    $name_array = $_FILES['firstphotocopy']['name'];
    $studentone_array = $_FILES['studentfirst']['name'];
    $parentfirst_array = $_FILES['parentfirst']['name'];
    $iqamafirst_array =  $_FILES['firstiqama']['name'];
    $parentiqama_array =  $_FILES['thirdiqama']['name'];
    $firstimu_array =  $_FILES['firstimu']['name'];
    $employment_array =  $_FILES['employment']['name'];
    $firstcolored_array =  $_FILES['firstcoloured']['name'];
    $repoone_array =  $_FILES['reportcardone']['name'];
    $noor_array =  $_FILES['noor']['name'];
    $certificate_array =  $_FILES['leaving']['name'];
    $firstphotograph_array =$_FILES['firstphotograph']['name'];   
    $firstministry_array =  $_FILES['firstministry']['name'];
    $fingerprint_array =  $_FILES['Fingerprint']['name'];
    $tmp_name_array = $_FILES['firstphotocopy']['tmp_name'];
    $tmp_studentone_array = $_FILES['studentfirst']['tmp_name'];
    $tmp_firstcoloured_array = $_FILES['firstcoloured']['tmp_name'];
    $tmp_parentone_array = $_FILES['parentfirst']['tmp_name'];
    $tmp_iqamafirst_array = $_FILES['firstiqama']['tmp_name'];
    $tmp_repoone_array = $_FILES['reportcardone']['tmp_name'];
    $tmp_firstphotograph_array = $_FILES['firstphotograph']['tmp_name'];
    $tmp_employment_array = $_FILES['employment']['tmp_name'];
    $tmp_fingerprint_array = $_FILES['Fingerprint']['tmp_name'];
    $tmp_leaving_array = $_FILES['leaving']['tmp_name'];
    $tmp_firstministry_array = $_FILES['firstministry']['tmp_name'];
    $tmp_parentiqama_array = $_FILES['thirdiqama']['tmp_name'];
    $tmp_firstimu_array = $_FILES['firstimu']['tmp_name'];    
    $tmp_noor_array = $_FILES['noor']['tmp_name'];
      for($i = 0; $i < count($tmp_name_array); $i++){
        if(move_uploaded_file($tmp_name_array[$i], "images/".$name_array[$i])){
 
            $path1 = "images/".$name_array[$i];
             
        } else {
        }
    }
    for($i = 0; $i < count($tmp_parentiqama_array); $i++){
        if(move_uploaded_file($tmp_parentiqama_array[$i], "images/".$parentiqama_array[$i])){
          
            $path5 = "images/".$parentiqama_array[$i];
             
        } else {
        }
    }
     for($i = 0; $i < count($tmp_iqamafirst_array); $i++){
        if(move_uploaded_file($tmp_iqamafirst_array[$i], "images/".$iqamafirst_array[$i])){
          
            $path4 = "images/".$iqamafirst_array[$i];
             
        } else {
        }
    }

 for($i = 0; $i < count($tmp_repoone_array); $i++){
        if(move_uploaded_file($tmp_repoone_array[$i], "images/".$repoone_array[$i])){
          
            $path6 = "images/".$repoone_array[$i];
             
        } else {
        }
    }
    
     for($i = 0; $i < count($tmp_fingerprint_array); $i++){
        if(move_uploaded_file($tmp_fingerprint_array[$i], "images/".$fingerprint_array[$i])){
           
            $path7 = "images/".$fingerprint_array[$i];
             
        } else {
        }
    }
  for($i = 0; $i < count($tmp_noor_array); $i++){
        if(move_uploaded_file($tmp_noor_array[$i], "images/".$noor_array[$i])){
          
            $path8 = "images/".$noor_array[$i];
             
        } else {
        }
    }
     for($i = 0; $i < count($tmp_firstministry_array); $i++){
        if(move_uploaded_file($tmp_firstministry_array[$i], "images/".$firstministry_array[$i])){
          
            $path9 = "images/".$firstministry_array[$i];
             
        } else {
        }
    }
      for($i = 0; $i < count($tmp_leaving_array); $i++){
        if(move_uploaded_file($tmp_leaving_array[$i], "images/".$certificate_array[$i])){
           
            $path10 = "images/".$certificate_array[$i];
             
        } else {
        }
    }
for($i = 0; $i < count($tmp_employment_array); $i++){
        if(move_uploaded_file($tmp_employment_array[$i], "images/".$employment_array[$i])){
          
            $path11 = "images/".$employment_array[$i];
             
        } else {
        }
    }
    for($i = 0; $i < count($tmp_firstimu_array); $i++){
        if(move_uploaded_file($tmp_firstimu_array[$i], "images/".$firstimu_array[$i])){
          
            $path12= "images/".$firstimu_array[$i];
             
        } else {
        }
    }
     for($i = 0; $i < count($tmp_firstcoloured_array); $i++){
        if(move_uploaded_file($tmp_firstcoloured_array[$i], "images/".$firstcolored_array[$i])){
         
            $path13 = "images/".$firstcolored_array[$i];
             
        } else {
        }
    }
    for($i = 0; $i < count($tmp_firstphotograph_array); $i++){
        if(move_uploaded_file($tmp_firstphotograph_array[$i], "images/".$firstphotograph_array[$i])){
         
            $path14 = "images/".$firstphotograph_array[$i];
             
        } else {
        }
    }
     for($i = 0; $i < count($tmp_studentone_array); $i++){
        if(move_uploaded_file($tmp_studentone_array[$i], "images/".$studentone_array[$i])){
           
            $path2 = "images/".$studentone_array[$i];
             
        } else {
        }
    }
   
    for($i = 0; $i < count($tmp_parentone_array); $i++){
        if(move_uploaded_file($tmp_parentone_array[$i], "images/".$parentfirst_array[$i])){
          
            $path3 = "images/".$parentfirst_array[$i];
             
        } else {
        }
    }
  
      $sql = "INSERT INTO `admission`(telephonenumber,birthcertificate,birthdate,parentpassport,studentpassport,parentiqama,studentiqama,reportcard,fingerprint,noor,ministry,leavingcertificate,employment,Immunization,coloredpassport,coloredphotograph,email) VALUES ('$tele','$path1','$birthdate','$path3','$path2','$path5','$path4','$path6','$path7','$path8','$path9','$path10','$path11','$path12','$path13','$path14','$telephonenum')";
             if(mysqli_query($con,$sql))
             {
                 echo "<h1 style='text-align:center;font-family:'Poppins';margin-top:140px;>thank you we will send you an email telling you if you were accepted or not</h1>";
             }
    }
?>
