<?php
  include "controls/session.php";
  check_admin();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title> <?php
    website_title();
    ?></title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="assets/css/Navigation-Menu.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="assets/css/Testimonials.css">
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
        <?php
      
      side_bar();

          ?>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php user_profile();?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                <?php  user_dropdown();?>
                    </div>
                    </li>
                    </ul>
            </div>
            </nav>
            <div class="container-fluid">
                <h3 class="text-dark mb-4">Appointment History</h3>
                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Appointment Info</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date</th>
                                        <th>Doctor</th>
                                        <th>Time</th>
                                        <th>Start date</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody id="appointmentbody">
                                  
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="bg-white sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Brand 2021</span></div>
            </div>
        </footer>
    </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/dashboard.js"></script>
</body>
<div role="dialog" tabindex="-1" class="modal fade" id="paymentmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Payment</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div id="payment_error"></div>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Time Finished:</td>
                                <td><p class="alert alert-info" id="time"></p></td>
                            </tr>
                            <tr>
                                <td>Doctor&#39;s Remarks</td>
                                <td> <p class="alert alert-info" id="remarks"></p></td>
                            </tr>
                            <tr>
                                <td>Prescription</td>
                                <td> <p class="alert alert-info" id="prescription"></p></td>
                            </tr>
                            <tr>
                                
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td> <p class="alert alert-info" id="amount"></p></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
           
        </div>
    </div>
</div>
</html>

<script>

$(document).ready(function(e){

    get_appointments();
    get_history();
    get_doctor();
    get_patient();

    get_history_record();

})

function get_history_record(){
 $.ajax({
type:"POST",
url:"controls/appointments.php",
data:{
    op:"history"
},
success:function(res){
    
    if(res=="0"){
    $("#appointmentbody").html("<tr><td rowspan='5' class='text danger'>No appoinments</td></tr>");
    }
    else{
        $("#appointmentbody").html(res);
    }
}

 });

}

function load_details(id){
  $.ajax({
      url:"controls/payment.php",
      type:"POST",
      data:{
          op:"paymentdetails",
          appid:id
      },
      success:function(res){
        
          data=$.parseJSON(res);
          $("#time").html(data[0].timefinished);
          $("#remarks").html(data[0].dremarks);
          $("#prescription").html(data[0].prescription);
          $("#amount").html(data[0].amount);
      }
  }) 
  
}




</script>