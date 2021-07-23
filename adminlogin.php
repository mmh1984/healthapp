<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Health Application - Login</title>
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
                                <div class="flex-grow-1 bg-login-image" style="background-image:url(assets/img/login.jpg);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Welcome Back!</h4>
                                    </div>
                                   
                                        <div class="form-group"><input class="form-control form-control-user" type="email" id="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required="required" data-toggle="popover" title="Message" data-content="Enter user email"></div>
                                        <div class="form-group"><input class="form-control form-control-user" type="password" id="password" placeholder="Password" name="password" required="required"></div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" id="submit">Login</button>
                                        <hr>
                                        <div class="alert alert-success" id="warning">Login failed.Invalid username or password</div>
                                        <hr>
                                  
                                    <div class="text-center"><a class="small" href="forgot-password.html">Forgot Password?</a></div>
                                    <div class="text-center"></div>
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
   
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>
<script>
$(document).ready(function(e) {
    $("#warning").hide();
});

$("#submit").click(function(e) {
    email=$("#email")
	password=$("#password")
	
	 clear_alerts()
	 
	
	if(email.val().length==0){
	
	 email.after("<span class='alert-danger' role='alert'>Email is required</span>")
	}
	else if(ValidateEmail(email.val())==false){
	 email.after("<span class='alert-danger' role='alert'>Invalid email</span>")	
	}
	
	
	else if(password.val().length==0){
	
	password.after("<span class='alert-danger' role='alert'>Password is required</span>")
	}
	
	else{
	clear_alerts();
	
	$.ajax({
	  type:"POST",
	  url:"controls/login.php",
	  data:{
		email:email.val(),
		password:password.val() 
	  },
	  success:function(res){
		 
		if(res=="invalid"){
			$("#warning").show();
		}
		else{
			$("#warning").show();
			$("#warning").html("Login successful");
			$("#submit").attr("disabled","disabled")
			
			$("#warning").removeClass("alert-danger")
			$("#warning").addClass("alert-success")
			
			setTimeout(function(){window.location.href='dashboard.php'},1000);	
		
		}
		
		
	  }	
		
	});	
	}
});

function clear_alerts(){
	email.next("span").remove();
	 password.next("span").remove();
}

function ValidateEmail(email) 
{
 return /\S+@\S+\.\S+/.test(email)
 
 
 

}

</script>





