<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/assessment.css">
    <title>Assessment</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/profile.jpg">
                    <h2>FTB <span class="danger">Bank</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../Admin Dashboard/admin.php">
                    <span class="material-icons-sharp">
                        dashboard
                    </span>
                    <h3>Dashboard</h3>
                </a>
                <a href="../templates/createuser.php">
                    <span class="fa fa-user-circle-o">
                    </span>
                    <h3>Create User</h3>
                </a>
                <a href="../templates/search.php">
                    <span class="fa fa-search">
                    </span>
                    <h3>Search</h3>
                </a>
                <!-- <a href="#" >
                    <span class="material-icons-sharp">
                        insights
                    </span>
                    <h3>Analytics</h3>
                </a> -->
                <a href="../templates/email.php">
                    <span class="fa fa-address-card">
                    </span>
                    <h3>Contact</h3>
                </a>
                <a href="../templates/multi_upload.php">
                    <span class="fa fa-upload">
                    </span>
                    <h3>Multi_Upload</h3>
                </a>
                <a href="../templates/list_upload.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>View File</h3>
                </a>
                <a href="../templates/assessment.php" class="active">
                    <span class="fa fa-address-book">
                        <!-- fab fa-app-store-ios -->
                    </span>
                    <h3>Assessment</h3>
                </a>
                <a href="../templates/query_tb.php">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Query Data</h3>
                </a>

                <a href="../templates/login.php">
                    <span class="material-icons-sharp">
                        add
                    </span>
                    <h3>New Login</h3>
                </a>
                <a href="../templates/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->

        <!-- Main Content -->
        <main>
            <h1 class="h1">Assessment</h1>
            <!-- Analyses -->
            <div  class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/newuser_assessment.php">
                                <h1>New User</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/newuser_assessment.php">
                                <img src="../Admin Dashboard/images/adduser.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/search_move.php">
                                <h1>Move User</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/search_move.php">
                                <img src="../Admin Dashboard/images/move1.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/search_resign.php">
                                <h1>User Resign</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/search_resign.php">
                                <img src="../Admin Dashboard/images/move.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <h1>Assessment</h1> -->
            <div class="analyse">
                <div class="sales">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/summary.php">
                                <h1>View Data</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/summary.php">
                                <img src="../Admin Dashboard/images/view1.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="visits">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/assessment_list.php">
                                <h1>List Assessment</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/assessment_list.php">
                                <img src="../Admin Dashboard/images/folder.png">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="searches">
                    <div class="status">
                        <div class="info">
                            <a href="../templates/insert_contact.php">
                                <h1>Insert Email</h1>
                            </a>
                        </div>
                        <div>
                            <a href="../templates/insert_contact.php">
                                <img src="../Admin Dashboard/images/more.png">
                            </a>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        <!-- End of Main Content -->

        <!-- Right Section -->
        <div class="right-section">
            <div class="nav">
                <button id="menu-btn">
                    <span class="material-icons-sharp">
                        menu
                    </span>
                </button>
                <div class="dark-mode">
                    <span class="material-icons-sharp active">
                        light_mode
                    </span>
                    <span class="material-icons-sharp">
                        dark_mode
                    </span>
                </div>

                <div class="profile">
                    <div class="info">
                        <p>Welcome</p>
                        <small class="text-muted">Assessment</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../images/profile.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../images/profile.jpg">
                    <h2>FTB Bank </h2>
                    <p>Welcome to FTB Bank</p>
                </div>
            </div>

            <div class="reminders">
                <div class="header">
                    <h2>Reminders</h2>
                    <span class="material-icons-sharp">
                        notifications_none
                    </span>
                </div>

                <div class="notification">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            volume_up
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Support Time</h3>
                            <small class="text_muted">
                                08:00 AM - 5:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification deactive">
                    <div class="icon">
                        <span class="material-icons-sharp">
                            edit
                        </span>
                    </div>
                    <div class="content">
                        <div class="info">
                            <h3>Open Time</h3>
                            <small class="text_muted">
                                08:00 AM - 5:00 PM
                            </small>
                        </div>
                        <span class="material-icons-sharp">
                            more_vert
                        </span>
                    </div>
                </div>

                <div class="notification add-reminder">
                    <div>
                        <span class="material-icons-sharp">
                            add
                        </span>
                        <h3>Add Reminder</h3>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- <script src="orders.js"></script> -->
    <script src="../Admin Dashboard/index.js"></script>
</body>

</html>