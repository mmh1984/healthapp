<?php
session_start();
 include "../../connection.php";
 $clinicno = $_SESSION["clinicadmin"];


 $qry = "SELECT client_tb.cimg,client_tb.cname, appointment_tb.appdate,doctor_tb.dname,appointment_tb.apptime,appointment_tb.apptype,appointment_tb.appointmenid,appointment_tb.status,appointment_tb.clientid FROM appointment_tb
 INNER JOIN clinic_tb on appointment_tb.clinicid=clinic_tb.clinicid
 INNER JOIN client_tb on appointment_tb.clientid=client_tb.clientid
 INNER JOIN doctor_tb on appointment_tb.doctorid=doctor_tb.doctorid WHERE appointment_tb.clinicid=$clinicno
 AND DATE(appointment_tb.appdate) >= DATE(Now()) AND appointment_tb.status <>'paid'";

 $cmd = mysqli_query($con, $qry);
 
 $row = mysqli_num_rows($cmd);

 if($row > 0){
     
     while($x=mysqli_fetch_array($cmd)){
         $data[]=array(
       "id"=>$x[6],
        "title"=>$x[5]."Doctor: ".$x[3],
        "start"=>$x[2],
       "end"=>$x[2]
         );
     }
     echo json_encode($data);
 }
 

 mysqli_close($con);
?>