<?php
if(!isset($_POST["email"]) or !isset($_POST["otp"])){
header("location:../index.php");
	
}

else {

$op=$_POST["op"];

switch($op){
	case "otp":
	verify_otp();
	break;
	
	
	
	case "reset":
	reset_pass();
	
}
	
}

function verify_otp(){
include "../connection.php";

$email=mysqli_real_escape_string($con,$_POST["email"]);
$otp=mysqli_real_escape_string($con,$_POST["otp"]);	

$query=mysqli_query($con,"SELECT * FROM user_tb WHERE useremail='$email' AND otpcode=$otp");
$row=mysqli_num_rows($query);

if($row > 0) {
 echo "OK";	
}
else{
 echo "ERROR";	
}
mysqli_close($con);
}


function reset_pass(){
include "../connection.php";

$email=mysqli_real_escape_string($con,$_POST["email"]);
$otp=mysqli_real_escape_string($con,$_POST["otp"]);
$newpass=mysqli_real_escape_string($con,$_POST["newpass"]);	
$newpass=md5($newpass);
$query=mysqli_query($con,"UPDATE user_tb set userpass='$newpass',otpcode=0 WHERE useremail='$email' AND otpcode=$otp");


if($query> 0) {
 echo "OK";	
}
else{
 echo "ERROR";	
}
mysqli_close($con);	
}
?>