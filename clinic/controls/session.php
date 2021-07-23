<?php
session_start();
function check_admin(){   

if(!isset($_SESSION["clinicadmin"])){
header("location:../index.html");	
}
}

function user_profile(){
echo $_SESSION["clinicno"];
}

function user_dropdown(){
   echo '<div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="profile.php"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>';
}

function user_footer(){
 

}

function website_title(){
    echo "Clinic Appointment System";
}

function side_bar(){
 echo '  <div class="container-fluid d-flex flex-column p-0">
 <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
     <div class="sidebar-brand-icon rotate-n-15"><img src="../assets/img/logo.png" class="img img-responsive" style="width:50px"/></div>
     <div class="sidebar-brand-text mx-3"><span>MENU</span></div>
 </a>
 <hr class="sidebar-divider my-0">
 <ul class="nav navbar-nav text-light" id="accordionSidebar">
     <li class="nav-item" role="presentation"><a class="nav-link active" href="dashboard.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
     <li class="nav-item" role="presentation"><a class="nav-link" href="profile.php"><i class="fas fa-user"></i><span>Profile</span></a></li>
     <li class="nav-item" role="presentation"><a class="nav-link" href="appointment.php"><i class="fas fa-table"></i><span>Appointments &nbsp;<span class="badge badge-danger" id="appointmentbadge">3</span></span></a></li>
     <li class="nav-item" role="presentation"><a class="nav-link" href="history.php"><i class="far fa-user-circle"></i><span>History &nbsp;<span class="badge badge-danger" id="historybadge">3</span></span></a></li>
     <li class="nav-item" role="presentation"><a class="nav-link" href="doctors.php"><i class="fas fa-user-circle"></i><span>Doctors &nbsp;<span class="badge badge-danger" id="doctorbadge">3</span></span></a></li>
     <li class="nav-item" role="presentation"><a class="nav-link" href="patients.php"><i class="fas fa-user-circle"></i><span>Patients &nbsp;<span class="badge badge-danger" id="patientbadge">3</span></span></a></li>
     <li class="nav-item" role="presentation"></li>
 </ul>
 <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div> -->
</div>';

}

?>