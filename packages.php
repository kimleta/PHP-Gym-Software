<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

include "config/packagesLogic.php";


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
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <?php include "elements/sidebar.php";?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">List of Packages </h1>

                        <?php if($_GET["id"]): ?>

                                <form class="bg-dark text-light" method="post" id="packageForm">
                                    <h3>Update package </h3>
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name of package" value ="<?= $resultArrayPackagesByID[0]['Name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Discription</label>
                                        <input type="description" name="description" class="form-control" id="description" placeholder="Description" value ="<?= $resultArrayPackagesByID[0]['descripction']?>">
                                    </div><br>
                                    <div class="form-group">
                                    <select name="PackLocation" id="packageForm" form="packageForm">
                                    <?php foreach($sortedArray as $key=>$value): ?>
                                        <option value="<?= $value ?>" <?php if($key == $resultArrayPackagesByID[0]['Gym ID']): echo "selected"; endif; ?>><?= $value ?></option>
                                    <?php endforeach; ?>
                                    </select>    
                                    </div> 
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <br>

                                <?php endif; ?>

                        <?php if($_GET["button"] == "add"): ?>

                            <form class="bg-dark text-light" method="post" id="packageForm">
                                <h3>Add new package </h3>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name of package">
                                </div>
                                <div class="form-group">
                                    <label for="description">Discription</label>
                                    <input type="description" name="description" class="form-control" id="description" placeholder="Description">
                                </div><br>
                                <div class="form-group">
                                <select name="PackLocation" id="packageForm" form="packageForm">
                                <?php foreach($sortedArray as $result): ?>
                                    <option value="<?= $result ?>"><?= $result ?></option>
                                <?php endforeach; ?>
                                </select>    
                                </div> 
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                            <br>
        
                        <?php endif; ?>
                        

                        <?php if($_GET["button"] == "delete"): ?>
                            <form class="bg-dark text-light" id="packageForm" method="post">
                                <h3>Delete Package</h3>                         
                                <div class="form-group">
                                <select name="package" id="package" form="packageForm">
                                <?php foreach($sortedPackages as $result): ?>
                                    <option value="<?= $result['ID'] ?>"><?= $result['Name'] ?></option>
                                <?php endforeach; ?>
                                </select>         </div><br>
                                <button type="submit" class="btn btn-danger">Delete</button>      <br>  <br>            
                        </form>
                        <?php endif; ?>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i> 
                                <a href="?button=add"><button type="button" class="btn btn-primary btn-sm">Add new package</button> </a>
                                <a href="?button=delete"><button type="button" class="btn btn-danger btn-sm">Delete package</button> </a>
                            </div>
                            <div class="card-body">
                                <table class="table" id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Location</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($sortedPackages as $key=>$value): ?>
                                        <tr>
                                            <td><?= $value["Name"] ?></td>
                                            <td><?= $value["descripction"] ?></td>
                                            <td><?= $value["Gym Name"] ?></td>
                                            <td><a href="packages.php?id=<?= $value["ID"]?>"><button type="button" class="btn btn-warning btn-sm">Update</button> </a</td>
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
