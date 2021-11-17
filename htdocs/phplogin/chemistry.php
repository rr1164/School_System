<?php 
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
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT grade FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($grade);
$stmt->fetch();
$stmt->close();
    
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<title>MISD SCHOOLS - HOME</title>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<link href="http://www.almajdinternationschool-pc.com/images/favicon.ico?crc=33309935" rel="shortcut icon" type="image/vnd.microsoft.icon" />
<link href="https://fonts.googleapis.com/css?family=Poppins|Rubik|tiza&display=swap" rel="stylesheet">
<style>body{text-decoration:none}.divv{opacity:0}.div:hover .divv{opacity:1}.div2:hover .divv2{opacity:1}body{margin:0}@media screen and (max-width:1406px){.logo{width:300px;margin-top:24px;margin-left:10%}.login{margin-top:35px;margin-right:10%;float:right}}@media screen and (max-width:1197px){.logo{width:300px;margin-top:24px;margin-left:4%}.login{margin-top:35px;margin-right:6%;float:right}}@media only screen and (max-width:618px){.teaser h1{padding-top:0;font-size:25px}.div{width:200.06px;height:60px}.divv{width:200.06px;height:62px}}@media only screen and (max-width:1370px){#logo{display:none}.teaser h1{padding-top:370px;font-size:40px}}@media only screen and (max-width:1039px){.teaser h1{font-size:30px;padding-top:350px}}@media only screen and (max-width:509px){.teaser h1{font-size:25px;padding-top:80%}}@media only screen and (max-width:433px){.div{width:50%}.divv{width:100%}.div2{width:50%}.divv2{width:100%}.teaser h1{font-size:20px;padding-top:350px}}@media only screen and (min-width:619px){.div{width:250.06px;height:60px}.divv{width:250.06px;height:62px}}@media only screen and (min-width:1391px){.teaser h1{font-size:60px;padding-top:550px}#logo{top:-8px;margin-bottom:0;position:absolute;margin-left:-100px;width:200px;background:#fff;z-index:9999}#logo:after{content:' ';position:absolute;width:0;height:0;left:0;bottom:-40px;border-width:20px 50px;border-style:solid;border-color:#fff #fff transparent transparent}#logo:before{content:' ';position:absolute;width:0;height:0;right:0;bottom:-40px;border-width:20px 50px;border-style:solid;border-color:#fff transparent transparent #fff}}@media screen and (max-width:667px){.logo{margin:20px auto;display:none}.login{margin:39px auto;padding-top:3px;display:block;float:none}.homie{margin-top:-34px}}@media screen and (max-width:387px){.divv{display:none}}@media screen and (min-width:387px){.divv{display:block}}@media screen and (max-width:330px){.logo{width:100%;margin:24px auto;display:block}.login{margin:-19px auto;display:block;float:none}.homie{margin-top:-24px}}@media screen and (min-width:1406px){.logo{width:400px;margin-top:20px;margin-left:10%}.login{margin-top:35px;margin-right:15%;float:right}}.a{position:absolute;top:20px;left:20px;z-index:1;width:36px;height:36px;box-sizing:border-box;padding:11px 0 0 9px;border-radius:50%;tap-highlight-color:transparent}span{display:block;width:26px;height:4px;background-color:#fff;pointer-events:none}span:nth-child(2){margin:3px 0}.open{border-color:rgba(255,255,255,.2)}.open span{background:#000}.open :first-child{transform:translateY(5px) rotate(-45deg)}.open :nth-child(2){transform:rotate(-45deg);opacity:0}.open :last-child{transform:translateY(-5px) rotate(-135deg)}.rip:hover{transition:all .3s ease}.rip:hover h3{color:#08c;transition:all .3s ease}.rip2:hover{transition:all .3s ease}.rip2:hover h3{color:#08c;transition:all .3s ease}textarea{resize:none}.form-label{font-size:12px;color:#5e9bfc;margin:0;display:block;opacity:1;-webkit-transition:.333s ease top,.333s ease opacity;transition:.333s ease top,.333s ease opacity}.form-control{border-radius:0;border-color:#ccc;border-width:0 0 2px;border-style:none none solid;box-shadow:none}.form-control:focus{box-shadow:none;border-color:#5e9bfc}.js-hide-label{opacity:0}.js-unhighlight-label{color:#999}.btn-start-order{background:0 0 #fff;border:1px solid #2f323a;border-radius:3px;color:#2f323a;font-family:"Raleway",sans-serif;font-size:16px;line-height:inherit;margin:30px 0;padding:10px 50px;text-transform:uppercase;transition:all .25s ease 0}.btn-start-order:hover,.btn-start-order:active,.btn-start-order:focus{border-color:#5e9bfc;color:#5e9bfc}body{margin:0;padding:0;font-family:'Poppins'}.div:hover{background-color:#fcae1e;transition:.5s ease}.div:hover a{color:#000;transition:.3s ease}nav{position:absolute;width:200px;top:0;bottom:0;left:0;background:#fff;transform:translateX(-100%);transition:.5s}.open+nav{transform:none}code{color:transparent;font-size:0}@media only screen and (max-width:1860px){.sidebarIconToggle{position:relative}.spinner{display:none}.menu-wrap ul li a{margin-left:12%}.span{display:none}.nav{display:none}#logo{left:46%}.dd4{left:54%}.hover4{left:54.5%}.hover5{left:60.5%}.hover6{left:66.5%}.hover7{left:72%}.menu-wrap ul ul{left:270px}.dd{left:18%}.dd2{left:25%}.dd3{left:30%;top:54px}}@media only screen and (max-width:1699px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:9%}.dd3{left:29%}.menu-wrap ul ul{left:140px}}@media only screen and (max-width:1684px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:6%}.dd3{left:26.5%;top:54px}.dd2{left:21%}.dd{top:50px;left:13%}.menu-wrap ul ul{left:160px}}@media only screen and (max-width:1669px){.boii{margin-left:-200px;width:500px;float:left}.mission{margin-top:30px}.mission2{margin-top:20px}.boii2{margin-left:-200px;width:500px;float:left}.mission3{margin-top:30px}.mission4{margin-top:20px}}@media only screen and (max-width:1699px){.boii{margin-left:-150px;width:500px;float:left}.mission2{margin-top:30px;margin-top:20px}.mission{margin-top:930px}.boii2{margin-right:150px;width:500px;float:right;margin-top:250px}.mission3{margin-top:330px;margin-left:-130px}.mission4{margin-top:20px;margin-left:-130px}}@media only screen and (max-width:1423px){.boii{margin:600px auto;display:block;float:none;width:640px}.mission2{margin-top:10px}.mission{margin-top:-560px}.boii2{margin-right:50px;width:450px;float:right;margin-top:250px}.mission3{margin-top:330px;margin-left:-420px}.mission4{margin-top:20px;margin-left:-390px}}@media only screen and (max-width:1350px){.boii2{margin-right:50px;width:450px;float:right;margin-top:250px}.mission3{margin-top:330px;margin-left:-220px}.mission4{margin-top:20px;margin-left:-210px}}@media only screen and (max-width:1273px){.boii{margin:600px auto;display:block;float:none;width:640px}.mission2{margin-top:10px}.mission{margin-top:-590px}.boii2{margin:0 auto;display:block;float:none;width:640px}.mission3{margin-top:10px;margin-left:30px}.mission4{margin-top:10px;margin-left:30px}}@media only screen and (max-width:794px){.mission2{margin-top:10px}.mission{margin-top:-470px}.boii2{margin:0 auto;display:block;float:none;width:540px}.boii{margin:500px auto;display:block;float:none;width:540px}}@media only screen and (max-width:594px){.boii2{margin:0 auto;display:block;float:none;width:100%}.boii{margin:500px auto;display:block;float:none;width:100%}}@media only screen and (min-width:1699px){.boii2{width:550px;margin-right:120px;float:right;margin-top:280px}.mission3{margin-top:350px;margin-left:-100px}.mission4{margin-top:30px}.boii{width:550px;margin-left:-220px;float:left}.mission2{margin-top:30px}.mission{margin-top:950px}}@media only screen and (max-width:1658px){.hip3 img{width:200px}.hip1 img{width:200px}.hip2 img{width:200px}.dd8{height:350px}.dd88{height:300px}.dd888{height:350px}.hip3{width:200px;margin-left:-230px}.hip2 h1{font-size:15px;margin-left:-130px}.hip2{margin-left:20px;margin-top:30px}.hip1{margin-top:30px}.hip3{margin-top:30px}.hip1 h1{font-size:15px;margin-left:-21px}.hip3 h1{font-size:15px;margin-left:5px}.nnn{width:1200px}.dd8{width:1200px}.dd88{width:257px;left:420px}.dd888{width:57px}.abt{margin-left:72%}.abt2{margin-left:72%}.abt3{margin-left:72%}.bg{margin-left:72%}}@media only screen and (max-width:1655px){.dd888{left:280px}}@media only screen and (max-width:1430px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:3%}.hover4{margin-left:8%;margin-top:4px}.hover5{margin-left:22%;margin-top:4px}.hover6{margin-left:9.5%;margin-top:4px}.hover7{margin-left:-3%;margin-top:4px}#logo{left:50%}.dd4{left:61.4%}.dd3{left:28%}}@media only screen and (max-width:1590px){.hop{width:40px;margin-top:5px;margin-left:-75px}.hop2{width:40px;margin-top:5px;margin-left:-70px}.imp1{margin-left:63px;font-size:15px;margin-top:20px}.imp2{margin-top:20px;font-size:17px;margin-left:63px}.imp3{font-size:15px;margin-top:20px}.imp4{font-size:15px;margin-top:20px;margin-left:0}.imp6{font-size:15px;margin-top:-25px;margin-left:-30px}.imp7{font-size:15px;margin-top:-25px;margin-left:-30px}.imp5{font-size:15px;margin-top:20px;margin-left:70px}}@media only screen and (max-width:1398px){.hop{width:30px;margin-top:10px;margin-left:-130px}.hop2{width:30px;margin-top:10px;margin-left:-130px}.imp1{margin-left:53px;font-size:15px;margin-top:15px}.imp2{font-size:15px;margin-left:25px;margin-top:15px}.imp3{margin-top:17px;position:absolute;margin-left:-10px}.imp4{margin-top:18px;margin-left:10px}.imp5{margin-top:18px;margin-left:-100px}.imp6{font-size:14px;margin-top:-20px;margin-left:-95px}.imp7{font-size:14px;margin-top:-20px;margin-left:-95px}.dd88{left:390px}.dd888{left:280px}}@media only screen and (max-width:1280px){.nnn{display:none}}@media only screen and (max-width:1268px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:1%}.hover4{margin-left:8%}.hover5{margin-left:24%}.hover6{margin-left:10%}.hover7{margin-left:-1.5%}#logo{left:50%}.dd{margin-left:-2%}.menu-wrap ul ul{margin-left:-7%}.dd4{left:61.4%}.dd3{left:28%}}@media only screen and (max-width:1131px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:-4.000005%}.hover4{margin-left:9%}.hover5{margin-left:27%}.hover6{margin-left:12%}.hover7{margin-left:-.5%}#logo{left:50%}.dd{margin-left:-8%}.dd2{left:17%}.menu-wrap ul ul{margin-left:-14%}.dd4{left:61.4%}.dd3{left:26%}}@media only screen and (max-width:1078px){.sidebarIconToggle{position:relative}.spinner{display:none}.span{display:none}.nav{display:none}.menu-wrap ul li a{margin-left:-4.000005%}.hover4{margin-left:9%}.hover5{margin-left:29%}.hover6{margin-left:14%}.hover7{margin-left:1.5%}#logo{left:52%}.dd{margin-left:-8%}.dd2{left:17%}.menu-wrap ul ul{margin-left:-14%}.dd4{left:61.4%}.dd3{left:27%}.hover3{left:9.2%}}@media only screen and (max-width:1046px){.spinner{display:block}span{display:block}.nav{display:block}.menu-wrap ul li a{opacity:0;display:none}#logo{left:47%}.nope5{display:none}.nope4{display:none}.nope3{display:none}.nope2{display:none}.nope{display:none}.nope6{display:none}.sidebarIconToggle{position:absolute;margin-top:-3px}}@media only screen and (max-width:669px){.sidebarIconToggle{position:absolute;margin-top:-7px}}@media only screen and (max-width:325px){.sidebarIconToggle{position:absolute;margin-top:-20px}}@media only screen and (max-width:854px){#logo{display:none}}@media only screen and (min-width:1431px){.hover4{margin-top:5px}.hover5{;margin-top:5px}.hover6{margin-top:5px}.hover7{margin-top:5px}}@media only screen and (min-width:1656px){.dd88{left:430px}.dd888{left:430px}}@media only screen and (min-width:1861px){.sidebarIconToggle{position:relative}.spinner{display:none}.dd4{left:56%}#logo{left:50%}.dd{left:23.7%}.menu-wrap ul li a{display:block;margin-left:18%}.hover4{left:57.5%}.hover5{left:63%}.hover6{left:67%}.hover7{left:72%}.menu-wrap ul ul{left:21%}.dd3{left:35.4%;top:50px}.dd2{left:30%}}.me img:hover{transition:.6s ease;opacity:.5;transition:.6s ease;opacity:.5}.me img:hover .me3{visibility:visible}.me{max-width:300px}.menu-wrap{background-color:#222;height:60px;line-height:50px;position:relative;max-width:100%;margin-top:0}.menu-wrap ul{list-style:none}.2{display:none;list-style:none;position:absolute;background-color:#fff;left:0;top:54px;width:140px}.menu-wrap ul li a{float:left;width:90px;font-size:13px;text-align:center;font-weight:550;color:#FFF;margin-top:5px;text-decoration:none}.menu-wrap ul li a:hover{color:#fccc4c!important;transition:all .4s ease}.hover:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover4:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover5:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover6:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover7:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover3:hover{text-decoration:none;color:#fccc4c!important;transition:all .4s ease}.hover8:hover{text-decoration:none;color:#222!important;transition:all .4s ease}.menu-wrap ul li:hover ul{display:block}.menu-wrap ul ul{display:none;list-style:none;position:absolute;background-color:#fff;top:54px;width:140px;z-index:99999}.2{display:none;list-style:none;position:absolute;background-color:#fff;left:200px;top:54px;width:140px}.menu-wrap ul ul li a{float:none;display:block;font-weight:700;text-align:left;width:160px;margin-left:20px;margin-top:20px}.ship{float:left;width:90px;display:block;font-size:13px;text-align:center;font-weight:550;color:#FFF;margin-top:5px;margin-left:9px %;text-decoration:none}.hell{margin-left:-40px;width:180px;height:60px;margin-top:-20px}.hell:hover{margin-left:-40px;width:180px;height:60px;margin-top:-20px;background-color:#000;transition:all .3s ease}.dd2{display:none;list-style:none;position:absolute;background-color:#fff;height:210px;top:54px;z-index:99999;border-radius:2px;width:180px}.dd{z-index:99999;display:none;list-style:none;position:absolute;background-color:#fff;height:220px;top:54px;border-radius:2px;width:180px}.dd3{z-index:1.0E+33;display:none;list-style:none;position:absolute;background-color:#fff;height:50px;border-radius:2px;width:180px}.dd4{margin-top:90px;display:none;list-style:none;position:fixed;background-color:#fff;height:80px;top:54px;border-radius:2px;width:180px;z-index:99999}.dd8{background-color:#fff;margin-left:0;margin-top:65px;border-radius:5px;position:absolute;display:none;z-index:9999999}.dd88{background-color:#fff;margin-top:62px;border-radius:5px;position:absolute;display:none;z-index:9999999}.dd888{background-color:#fff;margin-top:62px;border-radius:5px;position:absolute;display:none;width:920px;height:400px;z-index:9999999}.color-overlay{width:100%;height:100%;background:#000;opacity:.6;position:absolute}.header{display:block;margin:0 auto;width:100%;max-width:100%;box-shadow:none;background-color:#fc466b;position:fixed;height:60px!important;overflow:hidden;z-index:10}.main{margin:0 auto;display:block;height:100%;margin-top:60px}.bg:hover .bg2{display:block}.mainInner{display:table;height:100%;width:100%;text-align:center}.mainInner div{display:table-cell;vertical-align:middle;font-size:3em;font-weight:700;letter-spacing:1.25px}#sidebarMenu{height:100%;z-index:99999;position:fixed;left:0;width:100%;margin-top:-170px;transform:translateX(-100%);transition:transform 250ms ease-in-out;background:#333}.op:hover{color:#222;transition:all .3s ease}.sidebarMenuInner{margin:0;padding:0;border-top:1px solid rgba(255,255,255,0.10)}.sidebarMenuInner li{list-style:none;color:#fff;text-transform:uppercase;font-weight:700;padding:20px;cursor:pointer;border-bottom:1px solid rgba(255,255,255,0.10)}.sidebarMenuInner li span{display:block;font-size:14px;color:rgba(255,255,255,0.50)}.sidebarMenuInner li a{color:#fff;text-transform:uppercase;font-weight:700;cursor:pointer;text-decoration:none}input[type="checkbox"]:checked ~ #sidebarMenu{transform:translateX(0)}.hoverddd:hover{opacity:.7;transition:all .3s ease}input[type=checkbox]{transition:all .3s;box-sizing:border-box;display:none}.sidebarIconToggle{transition:all .3s;box-sizing:border-box;cursor:pointer;z-index:9999999;height:100%;width:100%;top:110px;left:15px;height:22px;width:22px}.spinner{transition:all .3s;box-sizing:border-box;position:absolute;height:3px;width:100%;border-bottom:-5px;background-color:#fff}.horizontal{transition:all .3s;box-sizing:border-box;position:relative;float:left;margin-top:3px}.diagonal.part-1{position:relative;transition:all .3s;box-sizing:border-box;float:left}.diagonal.part-2{transition:all .3s;box-sizing:border-box;position:relative;float:left;margin-top:3px}input[type=checkbox]:checked ~ .sidebarIconToggle>.horizontal{transition:all .3s;box-sizing:border-box;opacity:0}input[type=checkbox]:checked ~ .sidebarIconToggle>.diagonal.part-1{transition:all .3s;box-sizing:border-box;transform:rotate(135deg);margin-top:8px}input[type=checkbox]:checked ~ .sidebarIconToggle>.diagonal.part-2{transition:all .3s;box-sizing:border-box;transform:rotate(-135deg);margin-top:-9px}.no:hover{transform:scale(1);transition:transform 800ms}.nope:hover .dd{display:;transition:all .3s ease}.nope2:hover .dd2{display:;transition:all .3s ease}.nope3:hover .dd3{display:;transition:all .3s ease}.slider{margin-top:-25px;position:relative}#slider{position:relative;overflow:hidden;width:100%!important}#slider ul{position:relative;margin:0;padding:0;height:100vh;width:99999px;overflow:hidden;list-style:none}#slider ul li{position:relative;display:block;float:left;margin:0;padding:0;width:100vw;height:100vh;text-align:center}#slider ul li .slide{background-size:cover;height:100vh}button.control_prev,button.control_next{position:absolute;z-index:10;border:0;width:2em;height:2em;line-height:1.9em;background:rgba(255,255,255,.30);color:#fff;text-align:center;text-decoration:none;font-weight:600;font-size:2rem;opacity:.8;cursor:pointer;border-radius:50%;transform:translateY(-50%)}button.control_prev:focus,button.control_next:focus{outline:0;border:1px rgba(255,255,255,.5) solid}button.control_prev:hover,button.control_next:hover{opacity:1;-webkit-transition:all .2s ease}button.control_prev{left:2rem}button.control_next{right:2rem}.progress{position:absolute;background:rgba(255,255,255,.3);height:.5rem;width:100%;bottom:0;opacity:0;border-top:1px rgba(0,0,0,.15) solid}.progress .bar{opacity:0;height:100%;width:0;background:#fff}.teaser{position:absolute;top:50%;text-align:center;width:100%;color:#fff;transform:translateY(-50%)}.nope4:hover .dd4{display:;transition:all .3s ease}.nope8:hover .dd8{display:;transition:all .3s ease}.nope9:hover .dd88{display:;transition:all .3s ease}.nope10:hover .dd888{display:;transition:all .3s ease}.menu-wrap ul ul li a:hover{color:#fff}.hip1 img:hover{opacity:.7;transition:all .4s ease}.hip2 img:hover{opacity:.7;transition:all .3s ease}.hip3 img:hover{opacity:.7;transition:all .3s ease}.oo:hover{opacity:.5}@media only screen and (max-width:1395px){.teaser h1{padding-top:370px;font-size:40px}.no{height:600px;margin-top:-500px}button.control_prev,button.control_next{display:block;top:30%}}@media only screen and (max-width:900px){.teaser h1{padding-top:330px;font-size:18px}}@media only screen and (max-width:375px){button.control_prev,button.control_next{display:none}.teaser h1{padding-top:300px;font-size:15px}}@media only screen and (min-width:1395px){.boii{margin-top:900px}.no{height:1000px;margin-top:-360px}button.control_prev,button.control_next{display:block;top:50%}}
@media only screen and (max-width:1240px)
{
.who
{
        margin-left: 20%;
    text-align: center;
    font-size: 20px;
}
.o
{
    font-size:19px;
    margin-left: 25%;
} 
}
@media only screen and (max-width:496px)
{
.who
{
        margin-left: 20%;
    text-align: center;
    font-size: 17px;
}
.o
{
    font-size:19px;
    margin-left: 25%;
} 
}
@media only screen and (max-width:424px)
{
.who
{
        margin-left: 20%;
    text-align: center;
    font-size: 17px;
}
.o
{
    font-size:19px;
    margin-left: 25%;
}
.idd
{
    display:none;
} 
}
@media only screen and (max-width:407px)
{
.who
{
        margin-left: 13%;
    text-align: center;
    font-size: 15px;
}
.o
{
    font-size:19px;
    margin-left: 25%;
}
.idd
{
    display:none;
} 
}
@media only screen and (max-width:371px)
{
.who
{
        margin-left: 20%;
    text-align: center;
    font-size: 13px;
}
.o
{
    font-size:17px;
    margin-left: 25%;
}
.idd
{
    display:none;
} 
}
@media only screen and (min-width:1240px)
{
.who
{
    margin-left:110px;
    font-size:25px;
}
.o
{
    font-size:19px;
    margin-left: 110px;
}
}
</style>
</head>
<body>
<header class="homie" style="width:100%;height:90px;background:#f9f9f9;border-bottom:1px solid #e9e9e9">   
 <a href="http://testfff.epizy.com/index.html"><img class="logo" src="../photos/output-onlinepngtools.png" style=";"></a>
<div class="login" style="background-color:#0c7fcf;width:190px;height:45px">
<a style="text-decoration:none;width:190px;height:45px" href="logout.php">
<h3 style="text-align:center;font-size:15px;margin-top:14px;color:white;font-family:'Poppins';font-weight:100">LOGOUT</h3>
</a>
</div>
<div class="menu-wrap">
<ul class="1">
<li class="11"><a class="ship" style="font-family:'Rubik';font-weight:bold;font-size:18px" href="<?php If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo "chemistry.php" ;
} ?>
"><?php  If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo " Chemistry " ;
}
if( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" )
{
    Echo "" ;
}
?></a>
</li>
<div class="nope"><a href="<?php 
If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
    Echo "biology.php";
} ?> " style="text-decoration:none;cursor:pointer;color:white;font-size:18px;margin-top:5px;position:absolute;font-family:'Rubik';font-weight:bold" class="hover">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php  If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
    Echo "biology";
}
?> </a>

</div>
<div class="nope2"><a style="cursor:pointer;color:white;font-size:18px;position:absolute;margin-top:5px;margin-left:120px;font-weight:bold;font-family:'Rubik'" href="<?php
If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
    Echo "physics.php";
}
if( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" )
{
    Echo "science.php" ;
}
?>" class="hover"><?php If($grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo " Physics " ;
}
if( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" )
{
    Echo " Science " ;
}
?></a> <div class="dd2" style="">
<div style="cursor:pointer;position:absolute;width:180px;margin-top:0;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1;border-top:4px solid #0c7fcf" class="rip">
<h3 style="text-align:left;margin-left:20px;margin-top:0;font-size:13px;margin-top:10px">HIGH GRADES BOYS</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:30px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:0;font-size:13px;margin-top:65px">HIGH GRADES GIRLS</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:-40px;font-size:13px;top:20px">Kinder Garden</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:50px;background-color:;font-weight:100;color:#666" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:-55px;font-size:13px;margin-top:-40px">Low Grades</h3>
</div>
</div>
</div><div class="nope3"><a style="cursor:pointer;color:white;font-size:18px;margin-top:5px;position:absolute;margin-left:230px;font-weight:bold;font-family:'Rubik'" href="English.php" class="hover3"><?php If( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" || $grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12"  )
{
Echo " English " ;
}

?> </a> <div class="dd3" style="">
<div style="cursor:pointer;position:absolute;width:180px;margin-top:0;height:50px;background-color:;border-top:4px solid #0c7fcf;font-weight:100;color:#666" class="rip">
<h3 style="text-decoration:none;text-align:left;padding-left:10px;margin-top:15px;font-size:13px;top:20px">OFFLINE SURVEY</h3>
</div>
</div>
</div>
</ul>
<div id="logo">
<a href="#" title="Lafka" rel="home"> <img style="margin:0 auto;display:block" width="110px" height="110px" src="../photos/logo.jfif" class="8" /> </a>
</div>
<div class="nope4"><a href="arabic.php" style="text-decoration:none;cursor:pointer;color:white;font-size:18px;position:absolute;font-family:'Rubik';font-weight:bold;height:52.5px" class="hover4"><?php  If( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" || $grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo " Arabic " ;
}

?> </a> <div class="dd4" style="">
<div style="cursor:pointer;position:absolute;width:180px;margin-top:0;height:40px;background-color:;font-weight:100;color:#666;border-top:4px solid #0c7fcf;border-bottom:1px solid #f1f1f1" class="rip">
<h3 style="text-align:left;margin-left:10px;font-size:12.5px;margin-top:10px">Contact Form</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:30px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:10px;margin-top:0;font-size:13px;top:20px">Contact Emails</h3>
</div>
</div>
</div>
<div class="nope5"><a style="cursor:pointer;color:white;font-size:20px;position:absolute;font-weight:bold;font-family:'Rubik'" href="ict.php" class="hover5"><?php If( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" || $grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12"  )
{
Echo " ICT" ;
}

?> </a>
</div><div class="nope6"><a style="cursor:pointer;color:white;font-size:18px;position:absolute;font-weight:bold;font-family:'Rubik'" href="math.php" class="hover6"><?php  If( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" || $grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo " MATH " ;
}

?></a> <div class="dd3" style="">
<div style="cursor:pointer;position:absolute;width:180px;margin-top:0;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip">
<h3 style="text-align:left;margin-left:20px;margin-top:0;font-size:13px;top:20px">v.1 - Menu</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:0;font-size:13px;top:20px">v.2 - Menu</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:-40px;font-size:13px;top:20px">v.1 - Menu</h3>
</div>
<div style="cursor:pointer;width:180px;margin-top:50px;height:50px;background-color:;font-weight:100;color:#666;border-bottom:1px solid #f1f1f1" class="rip2">
<h3 style="text-align:left;margin-left:20px;margin-top:-55px;font-size:13px;top:20px">v.1 - Menu</h3>
</div>
</div>
</div>
<div href="islamic.php" class="nope6"><a href="islamic.php" style="cursor:pointer;color:white;font-size:18px;position:absolute;font-weight:bold;font-family:'Rubik'" class="hover7"><?php 
If( $grade == "7" || $grade == "6" || $grade == "5" || $grade == "4" || $grade == "8" || $grade == "10" || $grade == "9" || $grade == "11" || $grade == "12" )
{
Echo " ISLAMIC " ;
}

?></a>
</div>
</div>
</header>
<div class="ho" style="width:100%;height:400px;background-image:url(http://www.cameroongcerevision.com/wp-content/uploads/2018/01/cameroongce-chem.jpg);background-position:center;background-size: cover;">
<h1 style="text-align:center;color:#000;padding-top:200px;font-weight:bold;">Chemistry</h1>
<div style="position: absolute;left: 0;right: 0;margin: auto;width: 65px;height: 2px;background: black;"></div>
</div>
<div style="position: absolute;left: 100px;right: 0;margin-top:100px;width: 2px;height: 32px;background: blue;float:left;" class="idd"></div>
<h1 style="margin-top:105px;font-weight:100;" class="o">Chemistry worksheets</h1>
<a href="<?php If($grade == "8")
{
Echo " http://www.aechs.com/DocumentPreview.aspx?sfn=0edfdf6a-cd28-4891-88f1-4aea3b955ac2.pdf&ufn=Biology.pdf" ;
}
If($grade == "9")
{
Echo "http://www.ebook.gov.bd/nbook/classXI-XenglishBiology-9-10.pdf" ;
}
If($grade == "10")
{
Echo "https://cdn-cloudfront.cfauthx.com/binaries/content/assets/cw-en-ca/general-information/groups/youth/curriculum-materials/grade-10---biology.pdf" ;
}
If($grade == "11")
{
Echo "https://portal.ddsb.ca/class/ydftg5p/Documents/Chapter%201.pdf" ;
}
If($grade == "12")
{
Echo "https://www.edu.gov.mb.ca/k12/cur/science/found/gr12_bio/full_doc.pdf" ;
}
?> " style="text-decoration:none;color:blue;" class="who"><?php If($grade == "8")
{
Echo " grade 8 first worksheet first term " ;
}
If($grade == "9")
{
Echo "grade 9 first worksheet first term " ;
}
If($grade == "10")
{
Echo "grade 10 first worksheet first term " ;
}
If($grade == "11")
{
Echo "grade 11 first worksheet first term " ;
}
If($grade == "12")
{
Echo "grade 12 first worksheet first term " ;
}

?></a>
<br>
<a href="<?php If($grade == "8")
{
Echo " http://www.aechs.com/DocumentPreview.aspx?sfn=0edfdf6a-cd28-4891-88f1-4aea3b955ac2.pdf&ufn=Biology.pdf" ;
}
If($grade == "9")
{
Echo "http://www.ebook.gov.bd/nbook/classXI-XenglishBiology-9-10.pdf" ;
}
If($grade == "10")
{
Echo "https://cdn-cloudfront.cfauthx.com/binaries/content/assets/cw-en-ca/general-information/groups/youth/curriculum-materials/grade-10---biology.pdf" ;
}
If($grade == "11")
{
Echo "https://portal.ddsb.ca/class/ydftg5p/Documents/Chapter%201.pdf" ;
}
If($grade == "12")
{
Echo "https://www.edu.gov.mb.ca/k12/cur/science/found/gr12_bio/full_doc.pdf" ;
}
?>" style="text-decoration:none;color:blue;margin-top:500px;" class="who"><?php If($grade == "8")
{
Echo " grade 8 second worksheet first term " ;
}
If($grade == "9")
{
Echo "grade 9 second worksheet first term " ;
}
If($grade == "10")
{
Echo "grade 10 second worksheet first term " ;
}
If($grade == "11")
{
Echo "grade 11 second worksheet first term " ;
}
If($grade == "12")
{
Echo "grade 12 second worksheet first term " ;
}

?></a>
</body>
</html>