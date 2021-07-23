<?php
$op = "";
if (isset($_GET["op"])) {
  $op = $_GET["op"];
} else if (isset($_POST["op"])) {
  $op = $_POST["op"];
} else {
  echo "error";
}

switch ($op) {

  case "register":
    register();
    break;

  case "login":
    login();
    break;

  case "profile":
    profile();
    break;
  case "updatepass":
    updatepass();
    break;

  case "updatepass2":
    updatepass2();
    break;

  case "verifyemail":
    verify_email();
    break;

  case "verifyquestions":
    verify_questions();
    break;

  case "savequestions":
    save_questions();
    break;

  case "updateprofile":
    update_profile();
    break;
}

function register() {
  include "../../connection.php";
  $no=$_POST["no"];
  $name=$_POST["name"];
  $phone=$_POST["phone"];
  $email=$_POST["email"];
  $address=$_POST["address"];
  $password=md5($_POST["password"]);
  $date=date('Y-m-d');
  $str="INSERT INTO `clinic_tb`( `cregno`, `cname`, `caddress`, `cphone1`, `cphone2`, `cemail`, `cophours`, `clat`, `clang`, 
  `cusername`, `cpassword`, `img1`, `img2`, `img3`, `otpcode`, `verified`, `dateregistered`, `securityquestion`, `securityanswer`, `securityquestion2`, `securityanswer2`) 
  VALUES ('$no','$name','$address','$phone','NA','$email','NA',0,0,'$no','$password','img/img.png','img/img.png','img/img.png',
  0,'pending activation','$date','NA','NA','NA','NA')";
  $cmd=mysqli_query($con,$str);
  if($cmd){
    echo "OK";
  }
  else{
    echo mysqli_error($con);
  }
  mysqli_close($con);
}
function update_profile(){
  session_start();
  $no = $_SESSION["clinicadmin"];
  $data=$_POST["data"];
 
  include "../../connection.php";
  $v1=mysqli_real_escape_String($con,$data[0]);
  $v2=mysqli_real_escape_String($con,$data[1]);
  $v3=mysqli_real_escape_String($con,$data[2]);
  $v4=mysqli_real_escape_String($con,$data[3]);
  $v5=mysqli_real_escape_String($con,$data[4]);
  $v6=mysqli_real_escape_String($con,$data[5]);
  $v7=mysqli_real_escape_String($con,$data[6]);
  $v8=mysqli_real_escape_String($con,$data[7]);

  $str="UPDATE `clinic_tb` SET `cname`='$v1',`caddress`='$v2',`cphone1`='$v3',`cphone2`='$v4',
  `cemail`='$v5',`cophours`='$v6',`clat`=$v7,`clang`=$v8 
  WHERE clinicid=$no";
 $qry = mysqli_query($con, $str);
 $data = array();
 if ($qry) {
   array_push($data, "OK");
 }
 else{
   array_push($data,mysqli_error($con));
 }
 echo json_encode(['results' => $data]);
 }
function save_questions()
{
  session_start();
  $no = $_SESSION["clinicadmin"];
  include "../../connection.php";
  $q1 = $_POST["q1"];
  $q2 = $_POST["q2"];
  $a1 = mysqli_real_escape_string($con, $_POST["a1"]);
  $a2 = mysqli_real_escape_string($con, $_POST["a2"]);
  $str = "UPDATE clinic_tb SET securityquestion='$q1',securityanswer='$a1',securityquestion2='$q2',securityanswer2='$a2' 
  WHERE clinicid=$no";
  $qry = mysqli_query($con, $str);

  $data = array();
  if ($qry) {
    array_push($data, "OK");
  }
  echo json_encode(['results' => $data]);
  mysqli_close($con);
}
function verify_questions()
{
  include "../../connection.php";
  $reg = $_POST["regno"];
  $q1 = $_POST["q1"];
  $q2 = $_POST["q2"];
  $a1 = mysqli_real_escape_string($con, $_POST["a1"]);
  $a2 = mysqli_real_escape_string($con, $_POST["a2"]);
  $str = "SELECT * FROM clinic_tb WHERE cregno='$reg' AND securityquestion='$q1' and securityanswer='$a1' 
  AND securityquestion2='$q2' AND securityanswer2='$a2'";
  $qry = mysqli_query($con, $str);
  $row = mysqli_num_rows($qry);
  $data = array();
  if ($row > 0) {
    array_push($data, "OK");
  }
  echo json_encode(['results' => $data]);
  mysqli_close($con);
}

function verify_email()
{
  include "../../connection.php";
  $email = mysqli_real_escape_string($con, $_POST['email']);

  $data = array();

  $qry = "SELECT * FROM clinic_tb WHERE cregno='$email'";

  $cmd = mysqli_query($con, $qry);

  $row = mysqli_num_rows($cmd);
  if ($row > 0) {
    array_push($data, "OK");
  }
  echo json_encode(['results' => $data]);
  mysqli_close($con);
}
function login()
{
  include "../connection.php";
  $username = mysqli_real_escape_string($con, $_GET['clinicno']);
  $password = mysqli_real_escape_string($con, $_GET['password']);

  $qry = "SELECT * FROM clinic_tb WHERE cusername='$username' AND cpassword='$password'";

  $cmd = mysqli_query($con, $qry);

  $row = mysqli_num_rows($cmd);
  if ($row > 0) {
    echo "OK";
  } else {
    echo "NONE";
  }
  mysqli_close($con);
}

function profile()
{
  include "../../connection.php";
  session_start();
  $no = $_SESSION["clinicadmin"];

  $qry = "SELECT * FROM clinic_tb WHERE clinicid=$no";
  $cmd = mysqli_query($con, $qry);

  $row = mysqli_num_rows($cmd);
  if ($row > 0) {
    $data = array();
    while ($x = mysqli_fetch_assoc($cmd)) {
      array_push($data, $x);
    }
    echo json_encode($data);
  } else {
    echo "NONE";
  }
  mysqli_close($con);
}


function updatepass()
{
  include "../../connection.php";
  session_start();
  $no = $_SESSION["clinicadmin"];
  $pass = mysqli_real_escape_string($con, $_POST["pass"]);
  $pass = md5($pass);
  $qry = "UPDATE clinic_tb set cpassword='$pass' WHERE clinicid=$no";
  $cmd = mysqli_query($con, $qry);


  if ($cmd) {

    echo  "Password updated";
  } else {
    echo mysqli_error($con);
  }
  mysqli_close($con);
}
function updatepass2()
{
  include "../../connection.php";
  
  $no = $_POST["regno"];
  $pass = mysqli_real_escape_string($con, $_POST["pass"]);
  $pass = md5($pass);
  $qry = "UPDATE clinic_tb set cpassword='$pass' WHERE cregno='$no'";
  $cmd = mysqli_query($con, $qry);


  if ($cmd) {

    echo  "Password updated";
  } else {
    echo mysqli_error($con);
  }
  mysqli_close($con);
}
