<html>

<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Health App</title>
    <link rel="stylesheet" href="clinic/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="clinic/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="clinic/assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="clinic/assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="clinic/assets/css/gradient-navbar-1.css">
    <link rel="stylesheet" href="clinic/assets/css/gradient-navbar.css">
    <link rel="stylesheet" href="clinic/assets/css/Navigation-Menu.css">
    <link rel="stylesheet" href="clinic/assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="clinic/assets/css/Navigation-with-Search.css">
    <link rel="stylesheet" href="clinic/assets/css/Testimonials.css">
    <link rel="shortcut icon" href="assets/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/favicon/favicon.ico" type="image/x-icon">
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button" style="background-color: rgb(74,125,255);">
        <div class="container"><a class="navbar-brand" href="index.html" style="color: rgb(255,255,255);">Online Health Application</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto" style="color: rgb(254,253,253);">
                    <li role="presentation" class="nav-item"></li>
                    <li role="presentation" class="nav-item selected"><a class="nav-link"  style="color: rgb(255,255,255);padding: 0px 18px;">Registered Clinics</a></li>
                    <li role="presentation" class="nav-item"></li>
                </ul><span class="navbar-text actions"><a class="login" href="clinic/login.html" style="color: rgb(255,255,255);">Log In</a><a class="btn btn-light action-button" role="button" href="register.html" style="color: rgb(255,255,255);background-color: rgb(88,198,86);">Sign Up</a></span></div>
        </div>
    </nav>
    <div class="container">
        <div class="row" style="margin: 0;">
            <div class="col" style="padding: 0;">
                <h4 class="text-center" style="margin-top: 10px;margin-bottom: 10px;">Registered Clinics<br /></h4>
                <p class="text-left">Brunei Darussalam has a large network of clinics, health centers and hospitals that are located throughout the country. In remote areas that are difficult to access by land or water, healthcare is provided by the Flying Medical Services.The
                    healthcare system in Brunei is known to be one of the best publicly-run systems in the world. The medical industry here is small but growing fast. The Ministry of Health is focused on providing free medical services to its citizens.<br
                    /><br /></p>
                <p class="text-left"><br />The two major hospitals here are Jerudong Park Medical Center and Raja Isteri Pengiran Anak Saleha (RIPAS) Hospital. They are both equipped with the latest facilities and advances in modern technology. In 2015, the Ministry of Health
                    launched a 20-year strategic plan outlining upgrades to existing hospitals and building of a new outpatient hospital.<br /><br /></p>
            
                    <div class="row table table-condensed table-striped table-responsive">
                    <h4>Our clients</h>
                    <?php
                    include 'connection.php';
                    $str="SELECT * FROM clinic_tb";
                    $cmd=mysqli_query($con,$str);
                    echo "<table class='table'>
                    <tr>
                     <th>Name</th>
                     <th>Registration Number</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>Oreation Hours</th>
                    </tr>";
                    while($row=mysqli_fetch_array($cmd)){
                        echo " <tr>
                        <td>$row[2]</td>
                        <td>$row[1]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[7]</td>
                       </tr>";
                    }
                    echo "</table>";
                    mysqli_close($con);
                    ?>
                </div>
                <h5 class="text-center" style="margin-top: 20px;margin-bottom: 20px;">Directory of Registered Clinics and Practitioners</h5>
               
                <div class="row">
                    <div class="col">
                        <ul class="list-group">
                            <li class="list-group-item"><span><a href="http://www.moh.gov.bn/Shared%20Documents/Brunei%20mEDICAL%20bOARD/Gazette%20to%20end%202015%20-%20English%20-%20MG.pdf">MOH Medical Practitioners</a></span></li>
                            <li class="list-group-item"><span><a href="http://www.moh.gov.bn/Shared%20Documents/Brunei%20mEDICAL%20bOARD/Gazette%20to%20end%202015%20-%20English%20-%20DG.pdf">MOH Dentists</a></span></li>
                            <li class="list-group-item"><span><a href="http://www.moh.gov.bn/Shared%20Documents/Brunei%20mEDICAL%20bOARD/Gazette%20to%20end%202015%20-%20English%20-%20OG.pdf">Other Government Practitioners</a></span></li>
                            <li class="list-group-item"><span><a href="http://www.moh.gov.bn/Shared%20Documents/Brunei%20mEDICAL%20bOARD/Gazette%20to%20end%202015%20-%20English%20-%20MP.pdf">Private Sector Practitioners</a></span></li>
                            <li class="list-group-item"><span><a href="http://www.moh.gov.bn/Shared%20Documents/Brunei%20mEDICAL%20bOARD/Gazette%20to%20end%202015%20-%20English%20-%20DP.pdf">Private Sector Dentists</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-clean">
        <footer>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-3 item social">
                        <p class="copyright">Health Appointment System © 2021</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>