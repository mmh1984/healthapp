<?php
if(isset($_POST["op"])){
	$op=$_POST["op"];
    session_start();
   
}
else if(isset($_GET["op"])){
    $op=$_GET["op"];
}
else{
	header("location:../index.html");

}

switch($op){

    case "appointments":
        get_appointment();
        break;
        case "appointments2":
            get_appointment2();
            break;
    case "history":
        get_history();
        break;

    case "clientapp":
        get_app_data();
        break;

    case "clientappdetails":
        get_app_details();
        break;
    case "clienthistory":
        get_app_history();
        break;

    case "qrcode":
        qr_code();
        break;

    case "checkin":
        check_status();
        break;

    case "clientcheckin":
        client_checkin();
        break;

    case "changeschedule":
        change_schedule();
        break;
    case "patients":
        load_patients();
        break;
    

    
}
function load_patients() {
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];
    
    $str="SELECT client_tb.clientid,client_tb.cname,client_tb.cbruhims,client_tb.cic FROM client_tb,appointment_tb WHERE 
    appointment_tb.clientid=client_tb.clientid AND appointment_tb.clinicid=$clinicno";
    $cmd=mysqli_query($con,$str);
    $row=mysqli_num_rows($cmd);
    $data="";
    if($row > 0){
        $data="<table class='table'>";
        $data.="<tr>
        <th>Name</th>
        <th>Bruhims No</th>
        <th>IC</th>
        </tr>";
        while($x=mysqli_fetch_array($cmd)){
            $data.="<tr>
            <td>$x[1]</td>
            <td>$x[2]</td>
            <td>$x[3]</td>
            </tr>";
        }
    }
    else {
        $data="<p class='alert alert-warning'>No patients</p>";
    }
    echo $data;
    
   
}
function change_schedule(){

    include "../../connection.php";
    $id=$_POST["appid"];
    $client=$_POST["client"];
    $date=$_POST["date"];
    $time=$_POST["time"];
    $reason='Change Schedule'.$_POST["reason"];
    $today=date("Y-m-d");
    $qry="UPDATE appointment_tb SET appdate='$date',apptime='$time' WHERE appointmenid=$id";
    $cmd=mysqli_query($con,$qry);
   
    
    if($cmd){
        $clinicno = $_SESSION["clinicadmin"];
        $qry2="INSERT INTO notification_tb (nfrom,nfromtable,nto,ntotable,nsubject,nmessage,ndate,notified) ";
        $qry2.="VALUES ('$clinicno','clinic_tb','$client','client_tb','Change Schedule','$reason','$today','NO')";
        $cmd2=mysqli_query($con,$qry2);
        if($cmd2){
            echo "OK";
        }
        else{
            echo mysqli_error($con);
        }
       

    }
    else{
        echo mysqli_error($con);
    }
    
    mysqli_close($con);

}
function client_checkin(){
    include "../../connection.php";
    $id=$_GET["id"];
    $qry="UPDATE appointment_tb SET `status`='checkedin' WHERE appointmenid=$id";
    $cmd=mysqli_query($con,$qry);
    $data=array();
    
    if($cmd){
        array_push($data,"OK");
    }
    echo json_encode(["results"=>$data]);
    mysqli_close($con);

}
function check_status(){
    include "../../connection.php";
    $id=$_POST["appid"];
    $qry="SELECT `status` FROM appointment_tb WHERE appointmenid=$id";
    $cmd=mysqli_query($con,$qry);
    $data="";
    while($x=mysqli_fetch_array($cmd)){
        $data=$x[0];
    }
    echo $data;
    mysqli_close($con);

}
function qr_code() {
include "../phpqrcode/qrlib.php";
$id=$_POST["appid"];
$path="../qrcodes/";
$file=$path.uniqid().".png";

QRcode::png($id,$file,"L");

echo "clinic/".$file;
}
function get_app_details(){
    include "../../connection.php";
    $appid = $_GET["id"];


    $qry = "SELECT a.appointmenid,a.clinicid,c.cname,a.clientid,d.doctorid,d.dname,a.appdate,a.apptime,a.apptype,a.appdetails,a.status,a.bookingdate from appointment_tb as a
    INNER JOIN clinic_tb as c on a.clinicid=c.clinicid
    INNER JOIN doctor_tb  as d on a.doctorid=d.doctorid
    WHERE a.appointmenid=$appid";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
    $data=array();
    if($row > 0){
       
        while($x=mysqli_fetch_assoc($cmd)){
             array_push($data,$x);   
        }
       
    }
   
        echo json_encode(['results'=>$data]);
    
    mysqli_close($con);
}

function check_in_client(){
    include "../../connection.php";
    $appid = $_GET["id"];


    $qry = "SELECT a.appointmenid,a.clinicid,c.cname,a.clientid,d.doctorid,d.dname,a.appdate,a.apptime,a.apptype,a.appdetails,a.status,a.bookingdate from appointment_tb as a
    INNER JOIN clinic_tb as c on a.clinicid=c.clinicid
    INNER JOIN doctor_tb  as d on a.doctorid=d.doctorid
    WHERE a.appointmenid=$appid";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
    $data=array();
    if($row > 0){
       
        while($x=mysqli_fetch_assoc($cmd)){
             array_push($data,$x);   
        }
       
    }
   
        echo json_encode(['results'=>$data]);
    
    mysqli_close($con);
}

function get_app_data(){
    include "../../connection.php";
    $clientid = $_GET["id"];


    $qry = "SELECT a.appointmenid,a.clinicid,c.cname,a.clientid,d.doctorid,d.dname,a.appdate,a.apptime,a.apptype,a.appdetails,a.status,a.bookingdate from appointment_tb as a
    INNER JOIN clinic_tb as c on a.clinicid=c.clinicid
    INNER JOIN doctor_tb  as d on a.doctorid=d.doctorid
    WHERE a.clientid=$clientid AND a.status='active' OR a.status='checkedin'";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
    $data=array();
    if($row > 0){
       
        while($x=mysqli_fetch_assoc($cmd)){
             array_push($data,$x);   
        }
        echo json_encode(['results'=>$data]);
    }
    else{
        echo json_encode(['results'=>$data]);
    }

    mysqli_close($con);
}

function get_app_history(){
    include "../../connection.php";
    $clientid = $_GET["id"];


    $qry = "SELECT a.appointmenid,a.clinicid,c.cname,a.clientid,d.doctorid,d.dname,a.appdate,a.apptime,a.apptype,a.appdetails,a.status,a.bookingdate from appointment_tb as a
    INNER JOIN clinic_tb as c on a.clinicid=c.clinicid
    INNER JOIN doctor_tb  as d on a.doctorid=d.doctorid
    WHERE a.clientid=$clientid AND DATE(a.appdate) < DATE(Now()) or a.status='paid'";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
    $data=array();
    if($row > 0){
       
        while($x=mysqli_fetch_assoc($cmd)){
             array_push($data,$x);   
        }
        echo json_encode(['results'=>$data]);
    }
    else{
        echo json_encode(['results'=>$data]);
    }

    mysqli_close($con);
}


function get_appointment()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];


    $qry = "SELECT client_tb.cimg,client_tb.cname, appointment_tb.appdate,doctor_tb.dname,appointment_tb.apptime,appointment_tb.apptype,appointment_tb.appointmenid,appointment_tb.status,appointment_tb.clientid FROM appointment_tb
    INNER JOIN clinic_tb on appointment_tb.clinicid=clinic_tb.clinicid
    INNER JOIN client_tb on appointment_tb.clientid=client_tb.clientid
    INNER JOIN doctor_tb on appointment_tb.doctorid=doctor_tb.doctorid WHERE appointment_tb.clinicid=$clinicno
    AND DATE(appointment_tb.appdate) >= DATE(Now())";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
   echo $row;
    if($row > 0){
        $data="";
        while($x=mysqli_fetch_array($cmd)){
            $cdate=date('d/m/Y',strtotime($x[2]));
            $today=strtotime(date('Y-m-d'));
            $appdate=strtotime($x[2]);
            $datediff=$appdate-$today;
            $difference = floor($datediff/(60*60*24));
            $data.='  <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30" src="'.$x[0].'">'.$x[1].'</td>
            <td>'.$cdate.'</td>
            <td>'.$x[3].'</td>
            <td>'.$x[4].'</td>
            <td>'.$x[5].'</td>
            <td>'.$x[7].'</td>
            <td>';
            if($x[7]=='active'){
            $arr1=array();
            array_push($arr1,$x[6]);
            array_push($arr1,$x[8]);
            $val=json_encode($arr1);
            $data.='<button class="btn btn-primary btn-sm" onclick="load_details(\''. $x[6].'\',\''. $x[8].'\')">Reschedule</button>
            <br/>';
            }
            if($x[7]=='checkedin'){
            
                $data.='<button class="btn btn-info btn-sm" onclick="load_details(\''.$x[6].'\')">Pay</button>
                <br/>';
                }

            if($difference==0 && $x[7]=='active'){
            $data.='<button class="btn btn-success btn-sm" onclick="load_qrcode(\''.$x[6].'\')">Check-in</button>
            </td>';
            }
           

           
        $data.='</tr>';
        }
        echo $data;
    }
    else{
        echo "<h2 class='alert alert-warning'>No appointments</h2>";
    }

    mysqli_close($con);
}
function get_appointment2()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];
    $id=$_POST["id"];

    $qry = "SELECT client_tb.cimg,client_tb.cname, appointment_tb.appdate,doctor_tb.dname,appointment_tb.apptime,appointment_tb.apptype,appointment_tb.appointmenid,appointment_tb.status,appointment_tb.clientid FROM appointment_tb
    INNER JOIN clinic_tb on appointment_tb.clinicid=clinic_tb.clinicid
    INNER JOIN client_tb on appointment_tb.clientid=client_tb.clientid
    INNER JOIN doctor_tb on appointment_tb.doctorid=doctor_tb.doctorid WHERE appointment_tb.clinicid=$clinicno AND appointment_tb.appointmenid=$id
    AND DATE(appointment_tb.appdate) >= DATE(Now()) AND appointment_tb.status <> 'finish'";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
    $data=array();
    if($row > 0){
        
        while($x=mysqli_fetch_assoc($cmd)){
          array_push($data,$x);
        
        }
        echo json_encode($data);
    }
    else{
        echo json_encode($data);
    }

    mysqli_close($con);
}
function get_history()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];


    $qry = "SELECT client_tb.cimg,client_tb.cname, appointment_tb.appdate,doctor_tb.dname,appointment_tb.apptime,appointment_tb.apptype,appointment_tb.appointmenid FROM appointment_tb
    INNER JOIN clinic_tb on appointment_tb.clinicid=clinic_tb.clinicid
    INNER JOIN client_tb on appointment_tb.clientid=client_tb.clientid
    INNER JOIN doctor_tb on appointment_tb.doctorid=doctor_tb.doctorid WHERE appointment_tb.clinicid=$clinicno
    AND appointment_tb.status='paid'";

    $cmd = mysqli_query($con, $qry);
    
    $row = mysqli_num_rows($cmd);
   echo $row;
    if($row > 0){
        $data="";
        while($x=mysqli_fetch_array($cmd)){
            $cdate=date('d/m/Y',strtotime($x[2]));
            $data.='  <tr>
            <td><img class="rounded-circle mr-2" width="30" height="30" src="'.$x[0].'">'.$x[1].'</td>
            <td>'.$cdate.'</td>
            <td>'.$x[3].'</td>
            <td>'.$x[4].'</td>
            <td>'.$x[5].'</td>
            <td><button class="btn btn-primary btn-sm" onclick="load_details(\''.$x[6].'\')" data-target="#paymentmodal" data-toggle="modal">View Details</button></td>
           
        </tr>';
        }
        echo $data;
    }
    else{
        echo "<h2 class='alert alert-warning'>No appointments</h2>";
    }

    mysqli_close($con);
}

