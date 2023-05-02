
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading text-white ">Dashboard</div>
                                <a class="nav-link" href="dashboard.php">
                                    <div class="sb-nav-link-icon "><i class="fas fa-tachometer-alt"></i></div>
                                    Dashboard
                                </a>
                                <a class="nav-link" href="logout.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-arrow-right-from-bracket"></i></div>
                                    Log Off
                                </a>
                            <hr><div class="sb-sidenav-menu-heading text-white" style="padding: 0rem 1rem 0.75rem">Member Section</div>
                                <a class="nav-link" href="members-create.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user-plus"></i></div>
                                    Add new Member
                                </a>
                                <a class="nav-link" href="members.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                                    Show All Members
                                </a>
                                <a class="nav-link" href="member.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-magnifying-glass"></i></div>
                                    Search for member
                                </a>
                                <hr><div class="sb-sidenav-menu-heading text-white" style="padding: 0rem 1rem 0.75rem">Location Section</div>
                                <a class="nav-link" href="location.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-building"></i></div>
                                    Add new location
                                </a>
                                <hr><div class="sb-sidenav-menu-heading text-white" style="padding: 0rem 1rem 0.75rem">Instructor Section</div>
                                <a class="nav-link" href="sessions.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-calendar-days"></i></div>
                                    Group sessions
                                </a>
                                <hr><div class="sb-sidenav-menu-heading text-white" style="padding: 0rem 1rem 0.75rem">Package Section</div>
                                <a class="nav-link" href="packages.php">
                                    <div class="sb-nav-link-icon"><i class="fa-solid fa-cube"></i></div>
                                    Add/Edit Packages
                                </a>
                    </div>
                    <br><br><br>
                    <div class="sb-sidenav-footer sidebar-bottom">
                        <div class="small">Logged in as:</div>
                        <?php echo $_SESSION["username"]; ?>
                        <div class="small">License expiration :</div>
                        May, 28. 2026.
                    </div>
                </nav>
            </div>