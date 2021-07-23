<?php
session_start();
function check_admin(){   

if(!isset($_SESSION["adminid"])){
header("location:index.php");	
}
}

function user_profile(){
echo $_SESSION["adminemail"];
}

function user_footer(){
 

}

function side_bar(){
 echo '<ul class="nav navbar-nav text-light" id="accordionSidebar">
 <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
 <li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
 <li class="nav-item" role="presentation"><a class="nav-link" href="clinics.php"><i class="fas fa-table"></i><span>Clinic</span></a></li>
 <li class="nav-item" role="presentation"><a class="nav-link" href="application.php"><i class="fas fa-table"></i><span>New Application</span></a></li>

</ul>';

}

?>