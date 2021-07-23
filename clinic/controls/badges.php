<?php
if(isset($_POST["op"])){
	$op=$_POST["op"];
    session_start();
   
}
else{
	echo "error";

}

switch($op){
    case "appointments":
        get_appointment();
        break;

    case "history":
        get_history();
        break;

    case "doctor":
        get_doctor();
        break;

    case "patient":
        get_patient();
        break;
    case "sales";
        get_sales();
        break;

    case "monthsales";
        get_month_sales();
        break;
	
}
function get_month_sales(){
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];
    $year=date('Y');
    $month=date('m');
    
    $qry = "SELECT SUM(amount) as 'sales' FROM payment_tb, clinic_tb,appointment_tb
    WHERE appointment_tb.appointmenid=payment_tb.appid AND appointment_tb.clinicid=$clinicno
    AND YEAR(payment_tb.pdate)='$year' AND MONTH(payment_tb.pdate)='$month'";

    $cmd = mysqli_query($con, $qry);
    $row=mysqli_num_rows($cmd);
    
    if($row > 0){
        
        while($x=mysqli_fetch_array($cmd)){
            echo $x[0];
        }

    }
    else {
        echo "0";
    }
    
   
   
   
    mysqli_close($con);
}

function get_sales(){
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];
    $year=date('Y');

    $qry = "SELECT SUM(amount) as 'sales' FROM payment_tb, clinic_tb,appointment_tb
    WHERE appointment_tb.appointmenid=payment_tb.appid AND appointment_tb.clinicid=$clinicno
    AND YEAR(payment_tb.pdate)='$year'";

    $cmd = mysqli_query($con, $qry);
    $row=mysqli_num_rows($cmd);
    
    if($row > 0){
        
        while($x=mysqli_fetch_array($cmd)){
            echo $x[0];
        }

    }
    else {
        echo "0";
    }
   
   
    mysqli_close($con);
}

function get_appointment()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];


    $qry = "SELECT * FROM appointment_tb WHERE clinicid=$clinicno AND appointment_tb.status <> 'paid'
    AND (appointment_tb.appdate) >= DATE(Now())";

    $cmd = mysqli_query($con, $qry);

    $row = mysqli_num_rows($cmd);
    echo $row;

    mysqli_close($con);
}

function get_history()
{
    include "../../connection.php";
    $clinicno = $_SESSION["clinicadmin"];


    $qry = "SELECT * FROM appointment_tb WHERE clinicid=$clinicno AND appointment_tb.status='paid'";

    $cmd = mysqli_query($con, $qry);

    $row = mysqli_num_rows($cmd);
    echo $row;

    mysqli_close($con);
}


function get_doctor(){
    include "../../connection.php";
    $clinicno=$_SESSION["clinicadmin"];
    
    
    $qry="SELECT * FROM doctor_tb WHERE clinicid=$clinicno";
    
    $cmd=mysqli_query($con,$qry);
    
    $row=mysqli_num_rows($cmd);
    echo $row;
    
    mysqli_close($con);
    }

    function get_patient(){
        include "../../connection.php";
        $clinicno=$_SESSION["clinicadmin"];
        
        
        $qry="SELECT distinct(clientid)  FROM appointment_tb WHERE clinicid=$clinicno";
        
        $cmd=mysqli_query($con,$qry);
        
        $row=mysqli_num_rows($cmd);
        echo $row;
        
        mysqli_close($con);
        }
?>