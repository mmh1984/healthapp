<?php
session_start();
if(isset($_POST["op"])){
    $op = $_POST["op"];
}
elseif(isset($_GET["op"])){
    $op = $_GET["op"];
}


switch ($op) {
    case "pay":
        app_payment();
        break;
    case "paymentdetails":
        payment_details();
        break;
    case "paymentdetails2":
        payment_details2();
        break;
}

function payment_details2(){
    include "../../connection.php";
    $appid = $_GET["appid"];
    $str="SELECT * FROM payment_tb WHERE appid=$appid";
    $cmd=mysqli_query($con,$str);
    $data=array();
    while($x=mysqli_fetch_assoc($cmd)){
        array_push($data,$x);
    }
    echo json_encode(["results"=>$data]);
    mysqli_close($con);
}
function payment_details(){
    include "../../connection.php";
    $appid = $_POST["appid"];
    $str="SELECT * FROM payment_tb WHERE appid=$appid";
    $cmd=mysqli_query($con,$str);
    $data=array();
    while($x=mysqli_fetch_assoc($cmd)){
        array_push($data,$x);
    }
    echo json_encode($data);
    mysqli_close($con);
}
function app_payment()
{
    include "../../connection.php";
    $date = date("Y-m-d");
    $appid = $_POST["appid"];
    $time = $_POST["time"];
    $remarks = $_POST["remarks"];
    $prescription = $_POST["prescription"];
    $amount = $_POST["amount"];
    $str = "INSERT INTO `payment_tb`( `pdate`, `appid`, `timefinished`, `dremarks`, `prescription`, `amount`) 
    VALUES ('$date',$appid,'$time','$remarks','$prescription',$amount)";
    $cmd = mysqli_query($con, $str);
    if ($cmd) {
        change_status($appid);
        echo "OK";
    } else {
        echo mysqli_error($con);
    }
    mysqli_close($con);
}

function change_status($id)
{
    include "../../connection.php";
    $str = "UPDATE appointment_tb SET status='paid' WHERE appointmenid=$id";
    $cmd = mysqli_query($con, $str);
}
