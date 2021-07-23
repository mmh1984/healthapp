<?php
include "controls/session.php";
check_admin();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php
            website_title();
            ?>
    </title>
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
    <link href='fullcalendar/lib/main.css' rel='stylesheet' />
    <link rel="shortcut icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../assets/favicon/favicon.ico" type="image/x-icon">
    <script src='fullcalendar/lib/main.js'></script>
    <script src='fullcalendar/lib/moment.js'></script>
    <?php include "controls/calendar.php"; ?>
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
                        <form class="form-inline d-none d-sm-inline-block mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small"><?php user_profile(); ?></span><img class="border rounded-circle img-profile" src="assets/img/avatars/avatar1.jpeg"></a>
                                    <?php user_dropdown(); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-lg-12 col-sm-12">
                            <h3 class="text-dark mb-4">Appointments</h3>
                        </div>
                    </div>
                    <div class="row">

                        <div id="calendar" style="padding: 0 10px" class="col-md-8 col-lg-8 col-sm-12"></div>
                        <div class="col-md-4 col-lg-4 col-sm-12">
                        <div class="card">
    <div class="card-body" id="appdetails">
        <h5 class="text-center card-subtitle">Appointment Details</h5>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name <input type='hidden' id="appid1"/><input type="hidden" id="clientid" /></td>
                        <td id="cname">Cell 2</td>
                    </tr>
                    <tr>
                        <td>Doctor</td>
                        <td id="cdoctor">Cell 4</td>
                    </tr>
                    <tr>
                        <td>Time</td>
                        <td id="ctime">Cell 2</td>
                    </tr>
                    <tr>
                        <td>Type</td>
                        <td id="ctype">Cell 2</td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <p class="text-center">
                <button class="btn btn-primary" id="btnreschedule">Re-schedule</button>
                <button class="btn btn-success" id="btncheckin" data-toggle="modal" data-target="#qrmodal" onclick="load_qrcode()">Check-in</button>
                <button class="btn btn-info"id="btnpay" data-toggle="modal" data-target='#paymentmodal'>Pay</button>
            </p>
        </div>
        <div class="table table-responsive" id="divreschedule">
        <table class="table">
                        <tbody>
                            <tr>
                                <td>Date (dd/mm/yyyy)</td>
                                <td><input type="date" id="date"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Time</td>
                                <td><input type="time" id="time"></td>
                            </tr>

                            <tr>
                                <td>Reason</td>
                                <td><textarea  row='3' id="reason"></textarea></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <button class="btn btn-primary" onclick="update_app()">Update</button>
                                    <button class="btn btn-warning" data-dismiss="modal" id="btncancelresched">Cancel</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
        </div>
    </div>
    
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
    <script src="assets/js/theme.js"></script>
    <script src="assets/dashboard.js"></script>
</body>



<div role="dialog" tabindex="-1" class="modal fade" id="qrmodal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Scan QR Code
                    <span class='badge badge-primary' id='qrtimer'></span>
                    <span class='badge badge-warning' id='qrres'>Waiting for user to scan
                    </span>
            </div>
            <div class="modal-body">
                <img id="qrcode" style="width:300px;height:300px;display:block;margin:10px auto" />
            </div>
            <div class="modal-footer">
                <button class="btn btn-light" type="button" data-dismiss="modal" id="closeqr">Close</button>
                
            </div>
        </div>
    </div>





</div>
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
                                <td><input type="time" id="timefinished" class="form-control-user" /></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Doctor&#39;s Remarks</td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea id="remarks" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td class="text-center" colspan="2">Prescription</td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea id="prescription" class="form-control" rows="3"></textarea></td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td><input type="number" id="amount" class="form-control" step="0.5" value="0"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal" id="btnclosepayment">Close</button>
            <button class="btn btn-primary" type="button" onclick="checkout()">Save</button></div>
        </div>
    </div>
</div>
</html>

<script>
    $(document).ready(function(e) {

        get_appointments();
        get_history();
        get_doctor();
        get_patient();

        //get_appointment_record();
        load_dates();
        $("#appdetails").hide();
        $("#divreschedule").hide();

    })
    
    $("#btnreschedule").click(function(){
        $("#divreschedule").show();
    })

    $("#btncancelresched").click(function(){
        $("#divreschedule").hide();
    })

    function checkout(){
        id = $("#appid1").val();
        time=$("#timefinished").val();
        remarks=$("#remarks").val();
        prescription=$("#prescription").val();
        amount=$("#amount").val();
        if(time.length==0){
            $("#payment_error").html("<p class='alert alert-warning'>Enter the time</p>");
        }
        else if(remarks.length==0){
            $("#payment_error").html("<p class='alert alert-warning'>Enter doctor's remarks or NA for not available</p>");
        }
        else if(prescription.length==0){
            $("#payment_error").html("<p class='alert alert-warning'>Enter the prescription or NA for not available</p>");
        }
        else if(amount.length==0){
            $("#payment_error").html("<p class='alert alert-warning'>Enter amount</p>");
        }
        else{
            $.ajax({
                url:"controls/payment.php",
                type:"POST",
                data:{
                    op:"pay",
                    appid:id,
                    time:time,
                    remarks:remarks,
                    prescription:prescription,
                    amount:amount
                },
                success:function(res){
                    if(res=="OK"){
                        alert("Payment Completed");
                        $("#btnclosepayment").click();
                    }
                    else{
                        $("#payment_error").html("<p class='alert alert-warning'>"+res+"</p>");
                    }
                }
            })
        }
    }

    function update_app() {
        reason = $("#reason").val();
        id = $("#appid1").val();
        date = $("#date").val();
        time = $("#time").val();
        client = $("#clientid").val()

        if (reason.length == 0) {
            alert("Please state your reason")
        } else {
            $.ajax({
                url: "controls/appointments.php",
                type: "POST",
                data: {
                    op: "changeschedule",
                    appid: id,
                    date: date,
                    time: time,
                    reason: reason,
                    client: client
                },
                success: function(res) {
                    if (res == "OK") {
                        alert("Appointment Rescheduled")
                        $("#closeappmodal").click();
                        window.location.href="appointment.php"
                    }
                }

            })

        }

    }
  

    function get_appointment_record() {
        $.ajax({
            type: "POST",
            url: "controls/appointments.php",
            data: {
                op: "appointments"
            },
            success: function(res) {

                if (res == "0") {
                    $("#appointmentbody").html("<tr><td rowspan='5' class='text danger'>No appoinments</td></tr>");
                } else {
                    $("#appointmentbody").html(res);
                }
            }

        });

    }

    function load_details(id, cid) {

        $("#detailsmodal").modal();
        $("#appid").val(id);
        $("#clientid").val(cid);

    }


    function load_dates() {
        // days=[31,28,31,30,31,30,31,31,30,31,30,31];
        var today = new Date()
        var year = today.getFullYear();

        for (x = 1; x <= 12; x++) {
            $("#mm").append("<option value='" + x + "'>" + x + "</option>")
        }


        for (x = 1; x <= 31; x++) {
            $("#dd").append("<option value='" + x + "'>" + x + "</option>")
        }



        for (x = year; x < year + 1; x++) {
            $("#yy").append("<option value='" + x + "'>" + x + "</option>")
        }



    }

    function load_qrcode() {
        id=$("#appid1").val();
        var status = "";
        $("#qrmodal").modal();
        $.ajax({
            type: "POST",
            url: "controls/appointments.php",
            data: {
                op: "qrcode",
                appid: id

            },
            success: function(res) {
                $("#qrcode").attr("src", res);

            }

        });
        setTimeout(function() {
            check_response(id)
            $("#closeqr").click();
            get_appointment_record();
        }, 15000)

    }

    function check_response(id) {

        $.ajax({
            url: "controls/appointments.php",
            type: "POST",
            data: {
                op: "checkin",
                appid: id
            },
            success: function(res) {
                $("#qrres").html(res)
            }


        });


    }

    function check_in(id) {
        $.ajax({
            url: "controls/appointments.php",
            type: "POST",
            data: {
                op: "checkin",
                appid: id
            },
            success: function(res) {
                //alert(res)
                return res;
            }


        });


    }
</script>