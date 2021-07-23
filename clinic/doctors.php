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
                            
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php user_profile(); ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <?php user_dropdown(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Doctors</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">

                            <div class="text-md-left dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label>&nbsp;<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#doctorform" onclick="generate_password()">+ Add</button></div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialist</th>
                                            <th>Reg No</th>
                                            <th>Gender</th>
                                            <th>Nationality</th>
                                        </tr>
                                    </thead>
                                    <tbody id="doctorbody">

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
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/dashboard.js"></script>

    <!--modals-->

    <div role="dialog" tabindex="-1" class="modal fade" id="doctorform">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Doctor Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div id="message"></div>
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Registration No</td>
                                    <td><input type="text" id="regno" class="form-control form-control-user" maxlength="24" /></td>
                                </tr>
                                <tr>
                                    <td>Name</td>
                                    <td><input type="text" id="name" class="form-control form-control-user" maxlength="128" /></td>
                                </tr>
                                <tr>
                                    <td>Specialize Field</td>
                                    <td><input type="text" id="special1" class="form-control form-control-user" maxlength="128" /></td>
                                </tr>
                                <tr>
                                    <td>Specialize Field</td>
                                    <td><input type="text" id="special2" class="form-control form-control-user" maxlength="128" /></td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td><input type="text" id="phone" class="form-control form-control-user" maxlength="16" /></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" id="email" class="form-control form-control-user" maxlength="32" /></td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td><select id="nationality" class="form-control">
                                            <option value="Brunei" selected>Brunei</option>
                                            <option value="China">China</option>
                                            <option value="Malaysia">Malaysia</option>
                                            <option value="Singapore">Singapore</option>
                                            <option value="Philippines">Philippines</option>
                                            <option value="Indonesia">Indonesia</option>
                                            <option value="India">India</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Myanmar">Myanmar</option>
                                            <option value="Nepal">Nepal</option>
                                            <option value="USA">USA</option>
                                            <option value="UK">UK</option>
                                            <option value="Australia">Australia</option>
                                            <option value="Thailand">Thailand</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td><select id="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Default Password</td>
                                    <td><button class="btn btn-success" id="btngenerate" type="button">Generate Password</button>&nbsp; <span id="pass"><strong>pass</strong></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal" id="btncloseform">Close</button><button class="btn btn-primary" type="button"  id="btnsave">Save</button></div>
            </div>
        </div>
    </div>
    <!--end -->
</body>

</html>

<script>
    $(document).ready(function(e) {

        get_appointments();
        get_history();
        get_doctor();
        get_patient();

        get_doctors();

    })

    function get_doctors() {
        $.ajax({
            type: "POST",
            url: "controls/doctors.php",
            data: {
                op: "doctors"
            },
            success: function(res) {

                if (res == "0") {
                    $("#doctorbody").html("<tr><td rowspan='5' class='text danger'>No doctors</td></tr>");
                } else {
                    $("#doctorbody").html(res);
                }
            }

        });

    }

    function generate_password() {
        $.ajax({
            type: "POST",
            url: "controls/doctors.php",
            data: {
                op: "randompass"
            },
            success: function(res) {
            

              $("#pass").html(res)
            }

        });

    }

    $("#btngenerate").click(function(){
        generate_password();
    })

    function ValidateEmail(email) {
        return /\S+@\S+\.\S+/.test(email)

    }

    $("#btnsave").click(function(){

        remove_span()
     
        if($("#regno").val().length==0){
            error_message("#regno","Registration no required")
        }
        else  if($("#name").val().length==0){
            error_message("#name","Doctor's name is required")
        }
        else  if($("#special1").val().length==0){
            error_message("#special1","Specialized is required")
        }
          
        else  if($("#phone").val().length==0){
            error_message("#phone","Phone is required")
        }
        else  if($("#email").val().length==0){
            error_message("#email","Email is required")
        }
        else  if(ValidateEmail($("#email").val())==false){
            error_message("#email","Invalid Email")
        }

        var arr=[];
        arr.push($("#regno").val());
        arr.push($("#name").val());
        arr.push($("#special1").val());
        arr.push($("#special2").val());
        arr.push($("#phone").val());
        arr.push($("#email").val());
        arr.push($("#nationality").val());
        arr.push($("#gender").val());
        arr.push($("#pass").html());

        $.ajax({
            url:"controls/doctors.php",
            type:"POST",
            data:{
                op:"save",
                content:arr
                
            },
            success:function(res){
                if(res=="OK"){
                    $("#message").html("<p class='alert alert-success'>Doctor added to the clinic</p>");
                    setTimeout(() => {
                    $("#doctorform .close").click();
                    clear_inputs();
                get_doctors();
                get_doctor();
                }, 2000);
             
                }
                else if (res=="EXISTS"){
                    $("#message").html("<p class='alert alert-danger'>Registration number is already taken</p>");
                }
               
            }
        });
    })

    function error_message(control,message){
        $(control).next("span").remove();
        $(control).after("<span class='badge badge-danger'>"+ message +"</span>")
    }

    function remove_span(){
        var arr=[];
        arr.push("#regno")
        arr.push("#name")
        arr.push("#special1")
        arr.push("#phone")
        arr.push("#email")

        for(i=0;i<arr.length;i++){
            $(arr[i]).next("span").remove();
        }
    }
    function clear_inputs(){
        var arr=[];
        arr.push("#regno")
        arr.push("#name")
        arr.push("#special1")
        arr.push("#special2")
        arr.push("#phone")
        arr.push("#email")

        for(i=0;i<arr.length;i++){
            $(arr[i]).val("");
        }
        $("#message").html(""); 
    }

    $("#btncloseform").click(function(){
        clear_inputs();
    })
</script>