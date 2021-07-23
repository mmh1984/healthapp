<?php
session_start();
if(!isset($_SESSION["clinicadmin"])){
    header("location:login.php");
}
$id=$_SESSION["clinicadmin"];
$dir="../img/";

$file=$dir.basename($_FILES['imguser']['name']);

if($_FILES['imguser']['size'] > 2097152){
    echo "File must be less than 2 mb";
}
else{
    if (move_uploaded_file($_FILES["imguser"]["tmp_name"],$file)) {
        $filename="img/".basename($_FILES["imguser"]["name"]);
        update_image($id,$filename);
        //echo "The file ". htmlspecialchars( basename( $_FILES["imguser"]["name"])). " has been uploaded.";
           
    }
}

function update_image($i,$f){
include '../../connection.php';
$str="UPDATE clinic_tb SET img1='$f' WHERE clinicid=$i";
$cmd=mysqli_query($con,$str);
if($cmd){
    echo "The file has been uploaded.";
}
else{
    echo mysqli_error($con);
}
mysqli_close($con);
}
?>