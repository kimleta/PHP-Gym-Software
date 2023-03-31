<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


include 'config/membersExpiredLogic.php';

?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - AlphaTrack</title>
        <link rel="icon" href="public/img/Alogo.png" type="image/icon type">
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
                    <h1 class="mt-4">Dashboard</h1>
                    <form class="bg-dark text-light form-inline" method="post">
                            <div class="form-group mx-sm-3 mb-2">
                                <h4>Activate member by:</h4>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name"><br>
                                <input type="number" class="form-control" name="id" id="id" placeholder="ID">
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Activate</button>
                        </form><br>
                        <a href="membersExpired.php"><button type="submit" class="btn btn-danger mb-2">See expired/expiring members</button></a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Active memebers
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Number</th>
                                            <th>Package</th>
                                            <th>Expiration date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($arrayOfMemberCookies as $key => $result): ?>
                                            <?php $uniqueId = $result ; ?>
                                            <?php if($_COOKIE[$result]){ 
                                                $result = explode("|",$_COOKIE[$result]); ?>
                                        <tr>
                                            <td><?= $result[0]; ?></td>
                                            <td><?= $result[1]; ?></td>
                                            <td><?= $result[2]; ?></td>
                                            <td><?= $result[3]; ?></td>
                                            <td><?= $result[4]; ?></td>
                                            <td><?= $result[5]; ?></td>
                                            <td><a href="member-info.php?id=<?= $result[0]?>"><button type="button" class="btn btn-primary btn-sm">Info</button> </a</td>
                                           
                                            <td><a href="dashboard.php?remove=<?= $uniqueId ?>"><button type="button" class="btn btn-danger btn-sm">End session</button> </a</td>

                                        <?php } ?>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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
