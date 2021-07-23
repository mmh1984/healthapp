<?php


$op = $_POST["op"];

switch ($op) {
    case "listactive":
        list_clinic_active();
        break;

    case "listpending":
        list_clinic_pending();
        break;

    case "search":
        search_clinic();
        break;

    case "clinicdetails":
        clinic_details();
        break;

    case "approveclinic":
        approve_clinic();
        break;

    case "checkstatus":
        check_status();
        break;
    case "updatestatus":
        update_status();
        break;
    case "login":
        login_user();
        break;
        
}

function login_user() {
    include '../connection.php';

    $no = mysqli_real_escape_string($con,$_POST["id"]);
    $pass = md5( mysqli_real_escape_string($con,$_POST["pass"]));
    $str = "SELECT * FROM clinic_tb WHERE cusername='$no' and cpassword='$pass'";
    
    $query = mysqli_query($con, $str);
    $row=mysqli_num_rows($query);
   
    if ($row > 0) {
        session_start();
        while ($x = mysqli_fetch_array($query)) {
           $_SESSION["clinicadmin"]=$x[0];
           $_SESSION["clinicno"]=$x[1];
        }

        echo "ok";
    } else {
        echo "No clinics registered";
    }
    mysqli_close($con);

}

function clinic_details()
{
    include '../connection.php';

    $id = $_POST["id"];
    $str = "SELECT * FROM clinic_tb WHERE clinicid=$id";
    $query = mysqli_query($con, $str);
    if (($row = mysqli_num_rows($query) > 0)) {
        $htmldata = array();
        while ($x = mysqli_fetch_assoc($query)) {
            array_push($htmldata, $x);
        }

        echo json_encode($htmldata);
    } else {
        echo "No clinics registered";
    }
    mysqli_close($con);
}

function list_clinic_active()
{
    include '../connection.php';

    $str = "SELECT * FROM clinic_tb WHERE verified='activated'";
    $query = mysqli_query($con, $str);
    if (($row = mysqli_num_rows($query) > 0)) {
        $htmldata = "";
        while ($x = mysqli_fetch_array($query)) {
            $path="clinic/".$x[12];
            $htmldata .= "<tr onclick='view_details($x[0])' data-toggle='modal' data-target='#clinicmodal'>
        <td><img class='rounded-circle mr-2' width='30' height='30' src='$path' />$x[2]</td>
        <td>$x[1]</td>
        <td>$x[4] / $x[5]</td>
        <td>$x[6]</td>
        <td>$x[16]</td>
        <td>$x[17]</td>
    </tr>";
        }

        echo $htmldata;
    } else {
        echo "No clinics registered";
    }
    mysqli_close($con);
}

function list_clinic_pending()
{
    include '../connection.php';

    $str = "SELECT * FROM clinic_tb WHERE verified='no' or verified='pending activation'";
    $query = mysqli_query($con, $str);
    if (($row = mysqli_num_rows($query) > 0)) {
        $htmldata = "";
        while ($x = mysqli_fetch_array($query)) {
            $path="clinic/".$x[12];
            $htmldata .= "<tr onclick='view_details($x[0])' data-toggle='modal' data-target='#clinicmodal'>
        <td><img class='rounded-circle mr-2' width='30' height='30' src='$path' />$x[2]</td>
        <td>$x[1]</td>
        <td>$x[4] / $x[5]</td>
        <td>$x[6]</td>
        <td>$x[16]</td>
        <td>$x[17]</td>
    </tr>";
        }

        echo $htmldata;
    } else {
        echo "No clinics registered";
    }
    mysqli_close($con);
}


function search_clinic()
{
    include '../connection.php';
    $keyword = $_POST["keyword"];
    $str = "SELECT * FROM clinic_tb WHERE cname like '%$keyword%'";
    $query = mysqli_query($con, $str);
    if (($row = mysqli_num_rows($query) > 0)) {
        $htmldata = "";
        while ($x = mysqli_fetch_array($query)) {
            $htmldata .= "<tr onclick='view_details($x[0])' data-toggle='modal' data-target='#clinicmodal'>
        <td><img class='rounded-circle mr-2' width='30' height='30' src='$x[12]' />$x[2]</td>
        <td>$x[1]</td>
        <td>$x[4] / $x[5]</td>
        <td>$x[6]</td>
        <td>$x[16]</td>
        <td>$x[17]</td>
    </tr>";
        }

        echo $htmldata;
    } else {
        echo "No clinics registered";
    }
    mysqli_close($con);
}

function approve_clinic(){
    include '../connection.php';

    $id = $_POST["id"];
    $email=$_POST["email"];
    
    $str = "UPDATE clinic_tb set verified='activated' WHERE clinicid=$id";
    $query = mysqli_query($con, $str);
    if ($query){
      echo "OK";
      //send_activation($randompass,$email);
    
    } else {
        echo mysqli_error($con);
    }
    mysqli_close($con);

}
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

function send_activation($password,$mail){

    require_once '../vendor/autoload.php';
    
    // Create the Transport
    $transport = (new Swift_SmtpTransport('mail.kemudainstitute.com', 25))
      ->setUsername('bruhealth@kemudainstitute.com')
      ->setPassword('KEMUDA2021')
    ;
    
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    
    // Create a message
    $message = (new Swift_Message('Clinic Application Activation'))
      ->setFrom(['bruhealth@kemudainstitute.com' => 'Activation'])
      ->setTo([$mail => 'User'])
      ->setBody('Your application for Health Clinic System has been approved, login to your account using
      your clinic registration no and your temporary password is '.$password)
      ;
    
    // Send the message
    $result = $mailer->send($message);
}

function check_status(){

    include '../connection.php';

    $id = $_POST["id"];
  
  
    $str = "SELECT verified,cemail,cpassword FROM clinic_tb WHERE cregno='$id'";
    $query = mysqli_query($con, $str);
    
    if ((mysqli_num_rows($query)) > 0){
        $arr=array();
     while($x=mysqli_fetch_assoc($query)){
        array_push($arr,$x);
     }
     echo json_encode($arr);
    
    } 
    else {
        echo "NOT FOUND";
    }
    mysqli_close($con);
}

function update_status(){

    include '../connection.php';

    $id = $_POST["id"];
    $newpass = md5(mysqli_real_escape_string($con,$_POST["id"]));
  
    $str = "UPDATE clinic_tb SET verified='activated',cpassword='$newpass' WHERE cregno='$id'";
    $query = mysqli_query($con, $str);
   if($query){
       echo "Account Activated";
   }
   else{
       echo mysqli_error($con);
       }

    mysqli_close($con);
}
