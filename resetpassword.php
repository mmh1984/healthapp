<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Forgotten Password - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
	<link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-password-image" style="background-image: url(&quot;assets/img/dogs/image1.jpeg&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center"><div id="otpdiv">
                                        <h4 class="text-dark mb-2">Reset your password</h4>
                                        <p class="mb-4">Enter OTP CODE</p>
                                        <p class='alert alert-info mb-4'>your OTP code was sent to <strong><span id="email"><?php echo $_GET["email"];?></span></strong></p>
                                    <input class="border rounded-0 form-control-lg d-block form-control-user text-center" type="text" id="otpcode" aria-describedby="emailHelp" placeholder="000000" minlength="0" maxlength="6" pattern="000000" style="width: 200px;margin: 12px auto;">
                                        
                                    
                                    <button
                                        class="btn btn-primary btn-block text-white btn-user" id="btnreset" type="submit">Reset Password</button>
                                        </div>
                                        <div class="p-5" id="resetpass">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-2">Reset your password</h4>
                                    </div><input class="border rounded-0 d-block form-control-user text-center" type="password" id="newpass" aria-describedby="emailHelp" placeholder="enter new password" minlength="0" maxlength="8" style="width: 250px;margin: 5px auto;padding: 10px;">
                                    <input
                                        class="border rounded-0 d-block form-control-user text-center" type="password" id="confirmpass" aria-describedby="emailHelp" placeholder="confirm password" minlength="0" maxlength="8" style="width: 250px;margin: 5px auto;padding: 10px;"><button class="btn btn-primary btn-block text-white btn-user" id="btnreset2" type="submit">Reset Password</button></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

<script>
$(document).ready(function(e) {
   $("#resetpass").hide(); 
});
$("#btnreset").click(function(e) {
    otp=$("#otpcode").val()
	if(otp.length ==0 && otp.length < 6) {
		alert("otp code must be 6 digits");
	}
	else{
		$.ajax({
			type:"POST",
			url:"controls/resetpass.php",
			data:{
			 email:$("#email").html(),
			 otp:otp,
			 op:"otp"	
			},
			success:function(res){
			 if (res=="OK") {
				 $("#resetpass").show();
				 $("#otpdiv").hide();
			 }
			 else {
			  alert("Incorrect OTP code");	 
			 }	
			}
			
			
		});
	}
});

$("#btnreset2").click(function(e) {
    pass=$("#newpass").val()
	confirmpass=$("#confirmpass").val()
	
	if(pass.length < 4 || pass.length > 8) {
		alert("Password must be a minimum of 4 and maximum of 8")
		
	}
	else if(pass != confirmpass) {
		alert("Passwords didn't match");	
		}
	else {
		$.ajax({
			type:"POST",
			url:"controls/resetpass.php",
			data:{
			 email:$("#email").html(),
			 otp:otp,
			 op:"reset",
			 newpass:pass,	
			},
			success:function(res){
			 if (res=="OK") {
				 alert("Your password has been reset");
				 window.location.href="index.php";
			 }
			 else {
			  alert(res);	 
			 }	
			}
			
		})		
	}
	
	
});

</script>

