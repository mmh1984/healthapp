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
                <div class="container-fluid">
                  
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-body text-center shadow"><img id="profileimg" class="rounded-circle mb-3 mt-4" src="assets/img/dogs/image2.jpeg" width="160" height="160">
                                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-target="#imagemodal">Change Photo</button></div>
                                            <div class="mb-3"><button class="btn btn-secondary btn-sm" type="button" data-toggle="modal" data-target="#securitymodal">Security Questions</button></div>
                                        </div>
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">

                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group"><label for="username"><strong>Username (same as registration no)</strong></label>
                                                        <input type="text" class="form-control form-control-user" maxlength="16" id="txtusername" disabled="disabled" />

                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group"><label for="email"><strong>Password</strong><br></label>
                                                        <input type="password" class="form-control form-control-user" maxlength="16" id="txtpassword" disabled /> <span><input type="checkbox" id="cbshowpassword" /> &nbsp;Show Password</span>
                                                        <br />
                                                        <button class="btn btn-success btn-sm" id="btneditprofile">Edit</button> <button class="btn btn-primary btn-sm" id="btnupdateprofile">Update</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Clinic Profile</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Registration No</td>
                                                    <td><input type="text" id="txtregno" class="form-control" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td>Clinic Name</td>
                                                    <td><input type="text" id="txtclinicname" class="form-control" maxlength="64" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td><textarea id="txtaddress" class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Phone</td>
                                                    <td><input type="text" id="txtphone" class="form-control" maxlength="64" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Mobile</td>
                                                    <td><input type="text" id="txtmobile" class="form-control" maxlength="64" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><input type="text" id="txtemail" class="form-control" maxlength="64" /></td>
                                                </tr>
                                                <tr>
                                                    <td>Operation hours</td>
                                                    <td><textarea id="txtoperationhours" class="form-control"></textarea></td>
                                                </tr>
                                                <tr>
                                                    <td>Coordinates (MAP)</td>
                                                    <td>Lat &nbsp;<input type="text" id="txtlat" class="form-control" maxlength="64" />
                                                        <br />
                                                        Lang &nbsp;<input type="text" id="txtlang" class="form-control" maxlength="64" />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><button id="btnupdate" class="btn btn-primary" onclick="update_profile()">Update</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div id="message2"></div>


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

    <div class="modal fade" role="dialog" tabindex="-1" id="securitymodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Security Questions</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <div class="table">
                            <div class="form-group" id="securitydiv">
                                Security Question 1:
                                <select id="sec1" class="form-control form-control-user">
                                    <option value='0'>In what town or city did your parents meet?</option>
                                    <option value='1'>What primary school did you attend?</option>
                                    <option value='2'>What are the last five digits of your drivers license number?</option>
                                    <option value='3'>In what town or city did your parents meet?</option>
                                    <option value='4'>What was your childhood nickname?</option>
                                    <option value='5'>What was your dream job as a child?</option>
                                    <option value='6'>Who was your childhood hero?</option>
                                    <option value='7'>What is your preferred musical genre?</option>
                                </select>
                                <input id="ans1" type="text" class="form-control form-control-user" placeholder="answer" />

                                <br /> Security Question 2:
                                <select id="sec2" class="form-control form-control-user">
                                    <option value='0'>In what town or city did your parents meet?</option>
                                    <option value='1'>What primary school did you attend?</option>
                                    <option value='2'>What are the last five digits of your drivers license number?</option>
                                    <option value='3'>In what town or city did your parents meet?</option>
                                    <option value='4'>What was your childhood nickname?</option>
                                    <option value='5'>What was your dream job as a child?</option>
                                    <option value='6'>Who was your childhood hero?</option>
                                    <option value='7'>What is your preferred musical genre?</option>

                                </select>
                                <input id="ans2" type="text" class="form-control form-control-user" placeholder="answer" />
                                <br /><button class="btn btn-primary btn-block text-white btn-user" onclick="save_questions()">Verify</button>

                            </div>
                           
                            <div id="message"></div>


                            <hr />

                            <div class="text-center"><a class="small" href="login.html">Cancel</a></div>

                            <hr />


                        </div>
                    </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="imagemodal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Select Image</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <input type="file" id="imguser" accept="image/*"/>
                <button class='btn btn-primary'id="btnupload" >Upload</button>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
        </div>
    </div>
</div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/dashboard.js"></script>
</body>

</html>
<script>
    $(document).ready(function() {
        get_appointments();
        get_history();
        get_doctor();
        get_patient();
        $("#btnupdateprofile").attr("disabled", "")
        load_profile()
        $("#btnupload").hide();

    })

    $("#btneditprofile").click(function() {
        $("#txtpassword").removeAttr("disabled")
        $("#btnupdateprofile").removeAttr("disabled")

    })

    $("#cbshowpassword").change(function() {

        if ($("#cbshowpassword").is(":checked")) {
            $("#txtpassword").attr("type", "text");
        } else {
            $("#txtpassword").attr("type", "password");
        }

    })

    function load_profile() {
        $.ajax({
            url: "controls/clinic.php",
            type: "POST",
            data: {
                op: "profile"
            },
            success: function(res) {
                data = JSON.parse(res)
                $("#txtusername").val(data[0].cregno)
                $("#txtregno").val(data[0].cregno)
                $("#txtclinicname").val(data[0].cname)
                $("#txtaddress").val(data[0].caddress)
                $("#txtphone").val(data[0].cphone1)
                $("#txtmobile").val(data[0].cphone2)
                $("#txtemail").val(data[0].cemail)
                $("#txtoperationhours").val(data[0].cophours)
                $("#txtlat").val(data[0].clat)
                $("#txtlang").val(data[0].clang)
                $("#profileimg").attr("src",data[0].img1)
            }

        });

    }

    $("#btnupdateprofile").click(function() {
        $.ajax({
            url: "controls/clinic.php",
            type: "POST",
            data: {
                op: "updatepass",
                pass: $("#txtpassword").val()
            },
            success: function(res) {
                $("#txtpassword").after("<span class='badge badge-info'>" + res + "</span>")
                setTimeout(() => {
                    $("#txtpassword").next("span").remove();
                }, 2000);
            }

        });

    })

    function save_questions() {
        q1 = $("#sec1").val();
        a1 = $("#ans1").val();
        q2 = $("#sec2").val();
        a2 = $("#ans2").val();
        $("#message").html("")
        if (a1.length == 0) {
            $("#message").html("<p class='alert alert-warning'>Enter answer for security answer 1</p>")
        } else if (a2.length == 0) {
            $("#message").html("<p class='alert alert-warning'>Enter answer for security answer 2</p>")
        } else {
            $.ajax({
                url: "controls/clinic.php",
                type: "POST",
                data: {
                    op: "updatepass",
                    q1: q1,
                    a1: a1,
                    q2: q2,
                    a2: a2,
                   

                },
                success: function(res) {
                    var data = $.parseJSON(res);
                    if (data.results == "OK") {
                       alert("Security questions updated")
                       $("#securitymodal .close").click();
                    } else {
                        $("#message").html("<p class='alert alert-warning'>Invalid security combinations</p>")
                    }
                }
            });

        }

    }
    function update_profile() {
        clinic=$("#txtclinicname").val();
        address=$("#txtaddress").val();
        phone=$("#txtphone").val();
        mobile=$("#txtmobile").val();
        email=$("#txtemail").val();
        ophours=$("#txtoperationhours").val();
        lat=$("#txtlat").val();
        lang=$("#txtlang").val();

        if(clinic.length==0){
            alert("Enter clinic name")
        }
        
        else if(address.length==0){
            alert("Enter address")
        }
        else if(phone.length==0){
            alert("Enter phone")
        }
        else if(mobile.length==0){
            alert("Enter mobile")
        }
        else if(email.length==0){
            alert("Enter email")
        }
        else if(ophours.length==0){
            alert("Enter operation hours")
        }
        else if(lat.length==0){
            alert("Enter lat")
        }
        else if(lang.length==0){
            alert("Enter lang")
        }
        else{
            var content=[];
            content.push(clinic);
            content.push(address);
            content.push(phone);
            content.push(mobile);
            content.push(email);
            content.push(ophours);
            content.push(lat);
            content.push(lang);

            $.ajax({
                url: "controls/clinic.php",
                type: "POST",
                data: {
                    op: "updateprofile",
                    data:content              
                },
                success: function(res) {
                    var data = $.parseJSON(res);
                    
                    if (data.results == "OK") {
                       alert("Profile Updated")
                      
                    } else {
                        alert(res);
                    }
                    
                   alert(res);
                }

            });
        }
    }

    $("#imguser").change(function(){
        var file=$("#imguser")[0].files[0]
       if(file['name'].length>0){
           $("#btnupload").show();

       }
       else{
           $("#btnupload").hide();
       }

    });

    $("#btnupload").click(function(){
        var file=$("#imguser")[0].files[0]
        var form_data=new FormData();
        form_data.append("imguser",file);
        
        $.ajax({
            url:"controls/uploads.php",
            type:"POST",
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            enctype:"multipart/form-data",
            data:form_data,
            success:function(res){
                alert(res);
                load_profile();
            }
        });

    })
</script>