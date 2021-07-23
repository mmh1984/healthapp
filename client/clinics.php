<?php
$op = $_GET["op"];



switch ($op) {
    case "listactive":
        list_clinic_active();
        break;

    case "listdoctors":
        list_clinic_doctors();
        break;

    case "search":
        search_clinic();
        break;

    case "clinicdetails":
        clinic_details();
        break;

    case "checkschedule":
        check_schedule();

    case "saveappointment":
        if(check_client()=="OK"){
        save_appointment();
        }
        else{
            $htmldata=array();
            array_push($htmldata,"EXISTS");
            echo json_encode(["results"=>$htmldata]);
        }
    
        
}
function check_client() {
    include '../connection.php';
    $clientid=$_GET["clientid"]; 
    $appdate=$_GET["date"];
    $apptime=$_GET["time"];
    $str = "SELECT * FROM appointment_tb WHERE clientid=$clientid AND appdate='$appdate' and apptime='$apptime'";
    $query=mysqli_query($con,$str);
    if(mysqli_num_rows($query)>0){
        return "ERROR";
    }
    else{
        return "OK";
    }
    mysqli_close($con);
}
function save_appointment(){
    include '../connection.php';
    $clinicid=$_GET["clinicid"];
    $doctorid=$_GET["doctorid"];
    $apptype=$_GET["apptype"];
    $appdate=$_GET["date"];
    $apptime=$_GET["time"];
    $details=$_GET["details"];
    $clientid=$_GET["clientid"];
    $bookdate=date("Y-m-d");
    $str = "INSERT INTO `appointment_tb`(`clinicid`, `clientid`, `doctorid`, `appdate`, `apptime`, `apptype`, `appdetails`, `status`, `bookingdate`) 
    VALUES ($clinicid,$clientid,$doctorid,'$appdate','$apptime','$apptype','$details','active','$bookdate')";
    $query = mysqli_query($con, $str);
    $htmldata = array();
    if($query){
    array_push($htmldata,"OK");
    }
    
    echo json_encode(['results'=>$htmldata]);
    mysqli_close($con);
}
function check_schedule(){
    include '../connection.php';
    $clinicid=$_GET["clinicid"];
    $doctorid=$_GET["doctorid"];
    $appdate=$_GET["appdate"];
    $apptime=$_GET["apptime"];
    $str = "SELECT * FROM appointment_tb WHERE clinicid=$clinicid AND doctorid=$doctorid and appdate='$appdate' and apptime='$apptime'";
    $query = mysqli_query($con, $str);
    $htmldata = array();
    if (($row = mysqli_num_rows($query) > 0)) {
        
        while ($x = mysqli_fetch_assoc($query)) {
         array_push($htmldata,$x);
    
        }

        echo json_encode(["results"=>$htmldata]);
    } else {
        echo json_encode(["results"=>$htmldata]);
    }
    mysqli_close($con);
}

function list_clinic_doctors()
{
    include '../connection.php';
    $id=$_GET["id"];
    $str = "SELECT * FROM doctor_tb WHERE clinicid=$id";
    $query = mysqli_query($con, $str);
    $htmldata = array();
    if (($row = mysqli_num_rows($query) > 0)) {
        
        while ($x = mysqli_fetch_assoc($query)) {
         array_push($htmldata,$x);
    
        }

      
    } 
    echo json_encode(["results"=>$htmldata]);
    
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
        $htmldata = array();
        while ($x = mysqli_fetch_assoc($query)) {
         array_push($htmldata,$x);
    
        }

        echo json_encode(["results"=>$htmldata]);
    } else {
        echo json_encode(["results"=>$htmldata]);
    }
    mysqli_close($con);
}




function search_clinic()
{
    include '../connection.php';
    $keyword = $_GET["keyword"];
    $str = "SELECT * FROM clinic_tb WHERE cname like '%$keyword%' AND verified='activated'";
    $query = mysqli_query($con, $str);
    if (($row = mysqli_num_rows($query) > 0)) {
        $htmldata = array();
        while ($x = mysqli_fetch_assoc($query)) {
         array_push($htmldata,$x);
    
        }

        echo json_encode(["results"=>$htmldata]);
    } else {
        echo json_encode(["results"=>$htmldata]);
    }
    mysqli_close($con);
}


