<?php
if(!isset($_GET["op"])){
    $data=array();
    array_push($data,"ERROR");
}

$op=$_GET["op"];
switch($op){
    case "message":
        get_message();
        break;
    case "read":
        read_message();
        break;

}

function read_message(){
    include "../../connection.php";
    $id=$_GET["id"];
    $str="UPDATE notification_tb SET notified='YES' WHERE nid=$id";
    $cmd=mysqli_query($con,$str);
    $data=array();
    if($cmd){
        array_push($data,"OK");
    }
    echo json_encode(["results"=>$data]);
    mysqli_close($con);
}

function get_message(){
    include "../../connection.php";
    $id=$_GET["id"];
    $str="SELECT  notification_tb.nsubject,notification_tb.ndate,clinic_tb.cname,notification_tb.nmessage FROM notification_tb,clinic_tb WHERE
    notification_tb.nfrom=clinic_tb.clinicid AND notification_tb.nid=$id";
    $cmd=mysqli_query($con,$str);
    $data=array();
    while($row=mysqli_fetch_assoc($cmd)){
        array_push($data,$row);
    }
    echo json_encode(["results"=>$data]);
    mysqli_close($con);
}

?>