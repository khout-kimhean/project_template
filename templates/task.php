<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/task.css">
    <title>Admin Dashboard</title>
</head>

<body>

    <div class="container">
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../images/profile.jpg">
                    <h2>FTB <span class="danger">Bank</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        <!-- close -->
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
                <!-- <a href="../templates/createuser.php">
                    <span class="fa fa-user-circle-o">
                    </span>
                    <h3>Create User</h3>
                </a> -->
                <a href="../templates/search.php">
                    <span class="fa fa-search">
                    </span>
                    <h3>Search</h3>
                </a>

                <!-- <a href="../templates/input_data.php">
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
                    <h3>Data Store</h3>
                </a>
                <a href="../templates/list_upload.php">
                    <span class="material-icons-sharp">
                        inventory
                    </span>
                    <h3>View File</h3>
                </a>
                <a href="../templates/assessment.php">
                    <span class="fa fa-address-book">
                        <!-- fab fa-app-store-ios -->
                    </span>
                    <h3>Assessment</h3>
                </a>
                <!-- <a href="../templates/query_tb.php">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Query Data</h3>
                </a> -->

                <a href="../templates/user_management.php">
                    <span class="fa fa-user-circle">
                    </span>
                    <h3>User Mgt</h3>
                </a>
                <a href="../templates/todo_management.php" class="active">
                    <span class="fa fa-list-alt">
                    </span>
                    <h3>To-do List</h3>
                </a>
                <a href="../templates/stock_management.php">
                    <span class="fa fa-briefcase">
                    </span>
                    <h3>Stock Mgt</h3>
                </a>


                <a href="../templates/logout.php">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <main>
            <div class="container2">
                <div class="back_button">
                    <a href="../templates/todo_management.php" class="back-button">
                        <i class="fa fa-chevron-circle-left" style="font-size: 25px">Back</i>
                    </a>
                </div>
                <h2>Task</h2>
            </div>
        </main>
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
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo">
                        <img src="../Admin Dashboard/images/profile.jpg">
                    </div>
                </div>

            </div>
            <!-- End of Nav -->

            <div class="user-profile">
                <div class="logo">
                    <img src="../Admin Dashboard/images/profile.jpg">
                    <h2>FTB Bank</h2>
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