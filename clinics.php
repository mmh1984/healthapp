<?php
include 'controls/session.php';
check_admin();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Clinics</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    
                    <div class="sidebar-brand-text mx-3"><span>Menu</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <?php
                side_bar();
                ?>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">Admin</span><img class="border rounded-circle img-profile" src="img/noimage.png"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">                                        
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Registered Clinics</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search" id="clinicsearch" style="width:300px">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-right dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0 table-striped table-hover" id="dataTable">
                                    <thead class='thead-dark'>
                                        <tr>
                                            <th>Name</th>
                                            <th>Reg No</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            <th>Verified</th>
                                            <th>Date Registered</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clinictable">

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

    <!--modals-->
    <div role="dialog" tabindex="-1" class="modal fade" id="clinicmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="clinicname">Modal Title</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <p class="text-dark" style="margin: 0;">Address</p>
                    <p class="text-muted" id="clinicaddress" style="font-size: 14px;">The content of your modal.</p><a class="btn btn-light btn-block btn-sm" role="button" id="cliniccoor" target="_blank">view in map</a>
                    <p class="text-dark" style="margin: 0;">Operating Hours</p>
                    <p class="text-muted" id="clinichours" style="font-size: 14px;">The content of your modal.</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <!--end of modal-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        load_clinics();

    });

    $("#clinicsearch").keyup(function(e) {
        if (e.keyCode == 13 || e.keyCode == 8) {
            $("#clinictable").html("<img src='assets/img/loading.gif' style='width:50px;display:block;margin:0 auto'/>")

            $.ajax({
                type: "post",
                url: "controls/clinics.php",
                data: {
                    op: "search",
                    keyword: $("#clinicsearch").val()
                },
                success: function(res) {
                    $("#clinictable").html(res);
                }

            })
        }
    })

    function load_clinics() {

        $("#clinictable").html("<img src='assets/img/loading.gif' style='width:50px;display:block;margin:0 auto'/>")

        $.ajax({
            type: "post",
            url: "controls/clinics.php",
            data: {
                op: "listactive"
            },
            success: function(res) {
                $("#clinictable").html(res);
            }

        })

    }

    function view_details(id) {
        $.ajax({
            type: "post",
            url: "controls/clinics.php",
            data: {
                op: "clinicdetails",
                id: id
            },
            success: function(res) {
                var data = JSON.parse(res)
                $("#clinicname").html(data[0].cname)
                $("#clinicaddress").html(data[0].caddress)
                $("#clinichours").html(data[0].cophours)
                url = "https://www.google.com/maps/search/?api=1&query=" + data[0].clat + "," + data[0].clang
                $("#cliniccoor").attr("href", url)
            }

        })

    }
</script>