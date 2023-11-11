<?php
$alertMessage = ''; // Initialize alert message
$alertType = ''; // Initialize alert type

if (isset($_POST['submit'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "demo";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $name = $_POST['name'];
        $branch = $_POST['branch'];
        $position = $_POST['position'];
        $team = $_POST['team'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $avaya = $_POST['avaya'];


        $sql = "INSERT INTO tbl_email (name, branch ,position, team, email, phone_number, avaya) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssss", $name, $branch, $position, $team, $email, $phone_number, $avaya);

        if ($stmt->execute()) {
            $alertType = 'success';
            $alertMessage = 'insert Email successfully!';
        } else {
            $alertType = 'danger';
            $alertMessage = 'Error: ' . $stmt->error;
        }
    } else {
        $alertType = 'danger';
        $alertMessage = 'Content is empty. Please enter content before  insert a contact.';
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/newuser_assessment.css">
    <title>Admin Dashboard</title>
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
                <!-- <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a>  -->
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

            <div class="container2">
                <div class="title_h2">
                    <h2>Insert Contact</h2>
                    <form method="post" action="insert_contact.php">
                        <div class="column">
                            <input type="text" name="name" required placeholder="Full Name">
                            <!-- <input type="text" name="position" required placeholder="Position"> -->
                        </div>
                        <div class="column">
                            <div class="form-list">
                                <label for="branch"># Branch :</label>
                                <select name="branch" class="form-control" id="branch"
                                    onchange="updatePositionDropdown()">
                                    <option value="Marketing and Communication Department">Marketing and
                                        CommunicationDepartment</option>
                                    <option value="Audit Department">Audit Department</option>
                                    <option value="IT Department">IT Department</option>
                                    <option value="Digital Banking Department">Digital Banking Department</option>
                                    <option value="Retail">Retail</option>
                                    <option value="Accounting and Finance Department">Accounting and Finance Department
                                    </option>
                                    <option value="Management Information System">Management Information System</option>
                                    <option value="TREASURY">TREASURY</option>
                                    <option value="SUPPORT-OPS ">SUPPORT-OPS </option>
                                    <option value="AMB Branch">AMB Branch</option>
                                    <option value="Sen Sok Branch">Sen Sok Branch</option>
                                    <option value="KMS BRANCH">KMS BRANCH</option>
                                    <option value="Bak Touk Branch">Bak Touk Branch</option>
                                    <option value="Hengly Branch">Hengly Branch</option>
                                    <option value="Orkide 2004 Branch">Orkide 2004 Branch</option>
                                    <option value="Takhmao Branch">Takhmao Branch</option>
                                    <option value="Royal University of Phnom Penh Branch">Royal University of Phnom Penh
                                        Branch</option>
                                    <option value="Chbar Ampov Branch">Chbar Ampov Branch</option>
                                    <option value="Samdechpan Branch ">Samdechpan Branch </option>
                                    <option value="SHV Pshar Ler BRANCH">SHV Pshar Ler BRANCH</option>
                                    <option value="SHV Port Branch">SHV Port Branch</option>
                                    <option value="Mao Tse Toung Branch">Mao Tse Toung Branch</option>
                                    <option value="Phnom Penh Port Branch ">Phnom Penh Port Branch </option>
                                    <option value="Siem Reap Branch">Siem Reap Branch</option>
                                    <option value="Toulkork Branch">Toulkork Branch</option>
                                    <option value="Battambank Branch">Battambank Branch</option>
                                    <option value="Phsa Thmey Branch">Phsa Thmey Branch</option>
                                    <option value="KampongCham Branch">KampongCham Branch</option>
                                    <option value="LEGAL">LEGAL</option>
                                    <option value="COMPLIANT">COMPLIANT</option>
                                    <option value="Priority Credit Client Office">Priority Credit Client Office</option>
                                    <option value="Collection & Recovery Office">Collection & Recovery Office</option>
                                    <option value="Credit Administration Office">Credit Administration Office</option>
                                    <option value="FI & Corporate Banking Department">FI & Corporate Banking Department
                                    </option>
                                    <option value="Business Division">Business Division</option>
                                    <option value="SME & Consumer Banking Department">SME & Consumer Banking Department
                                    </option>
                                    <option value="Human Resource">Human Resource</option>
                                    <option value="Operational Risk">Operational Risk</option>
                                    <option value="INTERNATIONAL">INTERNATIONAL</option>
                                    <option value="MANAGEMENT">MANAGEMENT</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="Business Development ">Business Development </option>
                                    <option value="VIP BANKING">VIP BANKING</option>
                                </select>
                            </div>
                            <div class="form-list">
                                <label for="position"># Position</label>
                                <select name="position" class="form-control" id="position">
                                </select>
                            </div>
                            <div class="form-list">
                                <label for="team"># Team :</label>
                                <select name="team" class="form-control" id="team">
                                    <option value="team it">Team IT</option>
                                    <option value="team atm">Team ATM</option>
                                    <option value="team card payment support">Team Card Payment Support</option>
                                    <option value="team digital branch">Team Digital Branch</option>
                                </select>
                            </div>
                            <script src="../Admin Dashboard/droplist.js"></script>
                        </div>

                        <div class="column">
                            <input type="text" name="email" required placeholder="Enter email">
                            <input type="text" name="phone_number" required placeholder="Enter phone number">
                            <input type="text" name="avaya" placeholder="Enter Avaya Or NA if do not have ">
                            <input type="submit" name="submit" value="Create User" class="form-btn">
                            <div class="back_button">
                                <a href="../templates/assessment.php" class="back-button">
                                    <i class="fa fa-chevron-circle-left" style="font-size: 30px">Back</i>
                                </a>
                            </div>
                        </div>
                    </form>
                    <div class="alert alert-<?php echo $alertType; ?> text-center">
                        <?php echo $alertMessage; ?>
                    </div>
                </div>
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


    <script src="../Admin Dashboard/index.js"></script>

</body>

</html>