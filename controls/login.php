<?php


if(isset($_POST['email']) && isset($_POST['password']) ){
	
	include "../connection.php";
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	$newpass=md5($pass);
	$qry="SELECT userid,useremail FROM user_tb WHERE useremail='$email' and userpass='$newpass'";
	$query=mysqli_query($con,$qry);
	$row=mysqli_num_rows($query);
	if($row > 0){
	
	 while($i=mysqli_fetch_array($query)){
		 session_start();
		$_SESSION["adminid"]=$i[0];
		$_SESSION["adminemail"]=$i[1];
		
	 }	
	  
	}
	else{
	   echo "invalid";
	}
	mysqli_close($con);
}
else{
    echo "cannot access this page";		
}

?>