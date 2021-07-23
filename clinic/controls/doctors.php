<?php
if (isset($_POST["op"])) {
    $op = $_POST["op"];
    session_start();
} else {
    header("location:../index.html");
}

switch ($op) {

    case "doctors":
        get_doctors();
        break;

    case "randompass":
        randomPassword();
        break;

    case "save":
        save_doctor();
        break;
}

function get_doctors()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];


    $qry = "SELECT * FROM doctor_tb WHERE clinicid=$clinicno";

    $cmd = mysqli_query($con, $qry);

    $row = mysqli_num_rows($cmd);
    echo $row;
    if ($row > 0) {
        $data = "";
        while ($x = mysqli_fetch_array($cmd)) {
            $data .= '  <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30" src="'.$x[10].'">'.$x[3].'</td>
            <td>'.$x[4].' <br/> '.$x[5].'</td>
            <td>'.$x[2].'</td>
            <td>'.$x[9].'</td>
            <td>'.$x[8].'</td>
           
        </tr>';
        }
        echo $data;
    } else {
        $row;
    }

    mysqli_close($con);
}

function save_doctor()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];
    $data = $_POST["content"];
    $no = mysqli_real_escape_string($con, $data[0]);
    $name = mysqli_real_escape_string($con, $data[1]);
    $special1 = mysqli_real_escape_string($con, $data[2]);
    $special2 = mysqli_real_escape_string($con, $data[3]);
    $phone = mysqli_real_escape_string($con, $data[4]);
    $email = mysqli_real_escape_string($con, $data[5]);
    $nationality = mysqli_real_escape_string($con, $data[6]);
    $gender = mysqli_real_escape_string($con, $data[7]);
    $pass = mysqli_real_escape_string($con, $data[8]);
    $pass=md5($pass);
    //$date=date("d/m/Y");
    $img = "img/noimage.png";

    if (check_no($no, $clinicno) == false) {

        $str = "INSERT INTO `doctor_tb`(`clinicid`, `regno`, `dname`, `dspecial1`, `dspecial2`, `dphone`, `demail`, `dnationality`, `dgender`, `dimg`, `dpassword`, `otpcode`, `status`) 
    VALUES ($clinicno,'$no','$name','$special1','$special2','$phone','$email','$nationality','$gender','$img','$pass',0,'active')";

        $qry = mysqli_query($con, $str);
        if ($qry) {
            echo "OK";
            activate_account($email,$pass);
        } else {
            echo mysqli_error($con);
        }


        mysqli_close($con);
    } else {
        echo "EXISTS";
    }
}

function check_no($regno, $clinic)
{
    include "../../connection.php";
    $str = "SELECT * FROM doctor_tb WHERE clinicid=$clinic AND regno='$regno'";
    $qry = mysqli_query($con, $str);
    $row = mysqli_num_rows($qry);
    if ($row > 0) {
        return true;
    } else {
        return false;
    }
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
    echo implode($pass); //turn the array into a string
}

function activate_account($mail,$code){

    require_once '../../vendor/autoload.php';
    
    // Create the Transport
    $transport = (new Swift_SmtpTransport('mail.kemudainstitute.com', 25))
    ->setUsername('bruhealth@kemudainstitute.com')
    ->setPassword('KEMUDA2021')
    ;
    
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);
    
    // Create a message
    $message = (new Swift_Message('Account Activation'))
      ->setFrom(['bruhealth@kemudainstitute.com' => 'Account Activation'])
      ->setTo([$mail => 'User'])
      ->setBody('Your account as doctor has been activated from your clinic, you username is your
      registration no and your password is '.$code);
      ;
    
    // Send the message
    $result = $mailer->send($message);
    
}
