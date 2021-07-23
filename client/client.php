<?php


$op = "";
if (isset($_GET["op"])) {
  $op = $_GET["op"];
} else if (isset($_POST["op"])) {
  $op = $_POST["op"];
} else {
  $htmldata=array();
  array_push($htmldata,"ERROR");
  echo json_encode(["results"=>$htmldata]);
}

switch ($op) {
  case "save1":
    $v1 = $_GET["no"];
    if ((check_no($v1)) > 0) {
      echo "EXISTS";
    } else {
      add_client();
    }
    break;
  case "save":
    $v1 = $_GET["no"];
    if (check_no($v1) == "ERROR") {
      $htmldata = array();
      array_push($htmldata, "BRUHIMS NUMBER ALREADY EXISTS");
      echo json_encode(["results" => $htmldata]);
    } else {
      add_client();
    }
    break;
  case "login":
    login_client();
    break;

  case "clientdetails":

    client_details();
    break;

  case "securityquestions":
    security_question();
    break;
  case "updatesecurity":
    update_security();
    break;

  case "verifysecurity":
    verify_security();
    break;
  case "resetpass":
      reset_password();
      break;

  case "messages":
    load_messages();
    break;
    
  case "update":
      update_client();
      break;
}

function update_client(){
  include "../connection.php";
  $v1 = mysqli_real_escape_string($con, $_GET["no"]);
  $v2 = mysqli_real_escape_string($con, $_GET["ic"]);
  $v3 = mysqli_real_escape_string($con, $_GET["name"]);
  $v4 = mysqli_real_escape_string($con, $_GET["email"]);
  $v5 = mysqli_real_escape_string($con, $_GET["phone"]);
  $v6 = mysqli_real_escape_string($con, $_GET["password"]);
  $v7 = mysqli_real_escape_string($con, $_GET["gender"]);
  $v8 = mysqli_real_escape_string($con, $_GET["dob"]);
  $v9= mysqli_real_escape_string($con,$_GET["address"]);
  $id=$_GET["id"];
  $str="UPDATE `client_tb` SET `cic`='$v2',`cname`='$v3',`cemail`='$v4',`cphone`='$v5',
  `cgender`='$v7',`caddress`='$v9',`cdob`='$v8',`cpassword`='$v6'  WHERE clientid=$id";
  $cmd=mysqli_query($con,$str);
  $data=array();

  if($cmd){
    array_push($data,"OK");
  }
  else{
    array_push($data,mysqli_error($con));
  }
  echo json_encode(["results"=>$data]);
  mysqli_close($con);

}

function load_messages() {
  include "../connection.php";
  $id = $_GET["id"];

  $qry="SELECT * FROM notification_tb WHERE nto='$id'";
  $cmd=mysqli_query($con,$qry);
  $row=mysqli_num_rows($cmd);
  $htmldata=array();
  if($row > 0){
    while($x=mysqli_fetch_assoc($cmd)){
      array_push($htmldata,$x);
    }
  }
  echo json_encode(['results'=>$htmldata]);
  mysqli_close($con);
}

function reset_password(){
  include "../connection.php";
  $id = $_GET["patientid"];
  $pass = $_GET["password"];

  
 
  $str = "UPDATE client_tb SET cpassword='$pass' WHERE clientid=$id";
  $qry = mysqli_query($con, $str);
  $htmldata = array();
  if($qry){
    array_push($htmldata,"OK");
  }
  else {
    array_push($htmldata,mysqli_error($con));
  }
  
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}

function verify_security(){
  include "../connection.php";
  $id = $_GET["bruhims"];
  $q1 = $_GET["q1"];
  $q2 = $_GET["q2"];
  $a1 = $_GET["a1"];
  $a2 = $_GET["a2"];
  $str = "SELECT clientid,securityquestion,securityanswer,securityquestion2,securityanswer2 FROM client_tb WHERE cbruhims='$id'
  AND securityquestion='$q1' AND securityquestion2='$q2' AND securityanswer='$a1' AND securityanswer2='$a2'";
  $qry = mysqli_query($con, $str);
  $htmldata = array();
  $row=mysqli_num_rows($qry);
  if($row > 0){
    while($x=mysqli_fetch_assoc($qry))
    array_push($htmldata,$x);
  }
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}

function security_question(){
  include "../connection.php";
  $id = $_GET["id"];
  $str = "SELECT securityquestion,securityanswer,securityquestion2,securityanswer2 FROM client_tb WHERE clientid=$id";
  $qry = mysqli_query($con, $str);
  $htmldata = array();
  while ($row = mysqli_fetch_assoc($qry)) {
    array_push($htmldata, $row);
  }
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}

function update_security(){
  include "../connection.php";
  $id = $_GET["id"];
  $q1 = $_GET["q1"];
  $q2 = $_GET["q2"];
  $a1 = $_GET["a1"];
  $a2 = $_GET["a2"];
  $str = "UPDATE client_tb SET securityquestion='$q1',securityanswer='$a1',securityquestion2='$q2',securityanswer2='$a2' WHERE clientid=$id";
  $qry = mysqli_query($con, $str);
  $htmldata = array();
  if($qry){
    array_push($htmldata,"OK");
  }
  else {
    array_push($htmldata,mysqli_error($con));
  }
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}
function client_details()
{
  include "../connection.php";
  $id = $_GET["id"];
  $str = "SELECT * FROM client_tb WHERE clientid=$id";
  $qry = mysqli_query($con, $str);
  $htmldata = array();
  while ($row = mysqli_fetch_assoc($qry)) {
    array_push($htmldata, $row);
  }
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}
function check_no($no)
{
  include "../connection.php";

  $str = "SELECT * FROM client_tb WHERE cbruhims='$no' ";
  $qry = mysqli_query($con, $str);
  $row = mysqli_num_rows($qry);
  if ($row > 0)
    return "ERROR";
  mysqli_close($con);
}
function login_client()
{

  include "../connection.php";
  $username = mysqli_real_escape_string($con, $_GET['bruhims']);
  $password = mysqli_real_escape_string($con, $_GET['password']);

  $qry = "SELECT * FROM client_tb WHERE cbruhims='$username' AND cpassword='$password'";

  $cmd = mysqli_query($con, $qry);

  $row = mysqli_num_rows($cmd);
  if ($row > 0) {
    $id = "";
    while ($x = mysqli_fetch_array($cmd)) {
      $id = $x[0];
    }
    echo $id;
  } else {
    echo "NONE";
  }
  mysqli_close($con);
}
function add_client()
{

  include "../connection.php";

  $v1 = mysqli_real_escape_string($con, $_GET["no"]);
  $v2 = mysqli_real_escape_string($con, $_GET["ic"]);
  $v3 = mysqli_real_escape_string($con, $_GET["name"]);
  $v4 = mysqli_real_escape_string($con, $_GET["email"]);
  $v5 = mysqli_real_escape_string($con, $_GET["phone"]);
  $v6 = "img/img.png";
  $v7 = mysqli_real_escape_string($con, $_GET["password"]);
  $v8 = mysqli_real_escape_string($con, $_GET["gender"]);
  $v9 = mysqli_real_escape_string($con, $_GET["dob"]);
  $content = "Username:" . $v1 . " Password:" . $v7;


  $qry = "INSERT INTO `client_tb`(`cbruhims`, `cic`,  `cname`, `cemail`, `cphone`,  `cpassword`, `cimg`,`cgender`,`cdob`,`verified`) VALUES ('$v1','$v2','$v3','$v4','$v5','$v7','$v6','$v8','$v9','yes')";

  $cmd = mysqli_query($con, $qry);
  $htmldata = array();
  if ($cmd) {
    //send_password($v4, $content);
    array_push($htmldata, "OK");
  } else {

    array_push($htmldata, mysqli_error($con));
    //echo mysqli_error($con);
  }
  echo json_encode(['results' => $htmldata]);
  mysqli_close($con);
}

function randomPassword()
{
  $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
  $pass = array(); //remember to declare $pass as an array
  $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
  for ($i = 0; $i < 8; $i++) {
    $n = rand(0, $alphaLength);
    $pass[] = $alphabet[$n];
  }
  return implode($pass); //turn the array into a string
}
function send_password($mail, $code)
{

  require_once '../vendor/autoload.php';

  // Create the Transport
  $transport = (new Swift_SmtpTransport('mail.kemudainstitute.com', 25))
    ->setUsername('bruhealth@kemudainstitute.com')
    ->setPassword('KEMUDA2021');

  // Create the Mailer using your created Transport
  $mailer = new Swift_Mailer($transport);

  // Create a message
  $message = (new Swift_Message('Account Activation'))
    ->setFrom(['bruhealth@kemudainstitute.com' => 'Account Activation'])
    ->setTo([$mail => 'User'])
    ->setBody('Your account as patient has been activated from your clinic' . $code);;

  // Send the message
  $result = $mailer->send($message);
}
