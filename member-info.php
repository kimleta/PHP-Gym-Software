<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include "config/memberInformationLogic.php";

?>
 




<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="icon" href="public/img/Alogo.png" type="image/icon type">
        <title>Dashboard - AlphaTrack</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Dashboard</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php include "elements/sidebar.php" ; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Member info</h1>
                        <div class="card mb-4">
                            <div class="card-body bg-dark text-light">
                                <?php if($resultArrayUser): ?>
                                    <h4><b>Name:</b> <?= $resultArrayUser[0]['Name'] ?></h4>
                                    <h4><b>Address:</b> <?= $resultArrayUser[0]['Address'] ?></h4>
                                    <h4><b>Number:</b> <?= $resultArrayUser[0]['Number'] ?></h4>
                                    <h4><b>Start Date:</b> <?= $resultArrayUser[0]['Start Date'] ?></h4>
                                    <h4><b>End Date:</b> <?= $resultArrayUser[0]['End Date'] ?></h4>
                                    <h4><b>Package :</b> <?= $resultArrayUser[0]['Package'] ?></h4>
                                <?php endif; ?>
                                <form method="post">
                                <div class="form-group">
                                <label for="months">How many months : </label>
                                <input type="number" name="months" class="form-control" id="months" placeholder="Months" required><br>
                                </div>
                               <button type="submit" class="btn btn-primary">Prolong membership</button>
                               </form><br><br>
                               <form method="post">
                                <div class="form-group">
                                <label for="months">How many months : </label>
                                <input type="number" name="months" class="form-control" id="months" placeholder="Months" required><br>
                                </div>
                               <button type="submit" class="btn btn-primary">Prolong membership</button>
                               </form><br><br>
                               <a href="member-info.php?id=<?= $_GET['id'] ?>&delete=true"onclick="return confirm('Are you sure?')"><button type="submit" class="btn btn-danger">Delete Member</button></a>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;  AlphaTrack</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="public/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
