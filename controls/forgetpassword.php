<?php

if(!isset($_POST["email"])){
	header("location:../index.php");
}
else{
$otp= mt_rand(100000,999999);
$email=$_POST["email"];
reset_password($email,$otp);
}


function reset_password($mail,$code){

require_once '../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('mail.kemudainstitute.com', 25))
  ->setUsername('bruhealth@kemudainstitute.com')
  ->setPassword('KEMUDA2021')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

// Create a message
$message = (new Swift_Message('Password Reset'))
  ->setFrom(['bruhealth@kemudainstitute.com' => 'Password Reset'])
  ->setTo([$mail => 'User'])
  ->setBody('Your OTP code is '.$code)
  ;

// Send the message
$result = $mailer->send($message);


include "../connection.php";
$query=mysqli_query($con,"UPDATE user_tb SET otpcode=$code WHERE useremail='$mail'");
mysqli_close($con);
}

?>