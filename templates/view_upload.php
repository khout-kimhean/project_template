<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "demo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $title = $_POST["title"];
    $dropFile = $_POST["drop_file"];
    $shortDescription = strip_tags($_POST["short_description"]); // Remove HTML tags
    $description = trim($_POST['description']);
    // Insert data into the database

    $sql = "INSERT INTO input_file (drop_file, title, short_description ,description) VALUES (? , ? , ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $dropFile, $title, $shortDescription);

    if ($stmt->execute()) {
        // File uploaded successfully
        header("Location: input_upload.php?st=success");
        exit;
    } else {
        // Invalid file extension or error
        header("Location: input_upload.php?st=error");
        exit;
    }
}

$searchResults = array();

if (isset($_POST['search'])) {
    $searchTerm = $_POST['searchTerm'];

    $sql = "SELECT * FROM input_file WHERE description LIKE ? OR title LIKE ? OR drop_file LIKE ?";
    $stmt = $conn->prepare($sql);
    $searchPattern = "%" . $searchTerm . "%";
    $stmt->bind_param("sss", $searchPattern, $searchPattern, $searchPattern);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $searchResults[] = $row;
        }
    }
}

// Delete action
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    $deleteSql = "DELETE FROM input_file WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $idToDelete);

    if ($stmt->execute()) {
        header("Location: view_upload.php?st=delete-success");
        exit;
    } else {
        header("Location: view_upload.php?st=delete-error");
        exit;
    }
}

// Edit action
if (isset($_POST['edit']) && is_numeric($_POST['edit_id'])) {
    $editId = $_POST['edit_id'];
    $newTitle = $_POST['new_title'];
    $newShortDescription = strip_tags($_POST['new_short_description']);
    $newDescription = strip_tags($_POST['new_description']); 

    $editSql = "UPDATE input_file SET title = ?, short_description = ? WHERE id = ?";
    $stmt = $conn->prepare($editSql);
    $stmt->bind_param("ssi", $newTitle, $newShortDescription, $editId);

    if ($stmt->execute()) {
        header("Location: edit_upload.php?st=edit-success");
        exit;
    } else {
        header("Location: edit_upload.php?st=edit-error");
        exit;
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css"> -->
    <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/view_upload.css">
    <!-- <link rel="stylesheet" type="text/css" href="../Admin Dashboard/styles/search.css"> -->
    <title>Responsive Dashboard</title>
</head>

<body>

    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../Admin Dashboard/images/profile.jpg">
                    <h2>FTB <span class="danger">Bank</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">
                <a href="../Admin dashboard/admin.php" class="active">
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
                <!-- <a href="#">
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
                <a href="list_upload.php">
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
                <a href="../templates/query_tb.php">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Query Data</h3>
                </a>
                <!-- <a href="#">
                    <span class="material-icons-sharp">
                        report_gmailerrorred
                    </span>
                    <h3>Reports</h3>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">
                        settings
                    </span>
                    <h3>Settings</h3>
                </a> -->
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

            <div class="box">
            <div class="back_button">
                    <a href="../Admin Dashboard/admin.php" class="back-button">
                        <i class="fa fa-chevron-circle-left" style="font-size: 25px">Back</i>
                    </a>
                </div>
                <!-- <h2>Data List</h2> -->
                <div class="container2">
                    <div class="search">
                        <form action="view_upload.php" method="post">
                            <div class="form-group">
                                <label for="searchTerm">Type here for search : </label>
                                <input type="text" name="searchTerm" class="form-control" id="searchTerm">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="search" value="Search" class="btn btn-info">
                            </div>
                        </form>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="table-container">
                        <div class="col-md-8 offset-md-2">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Team Drop FIle</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>View</th>
                                        <th>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($searchResults)): ?>
                                        <?php
                                        $i = 1; // Initialize the ID counter to 1
                                        foreach ($searchResults as $row):
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; // Display the ID starting from 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlspecialchars($row['drop_file']); ?>
                                                </td>
                                                <td title="<?php echo htmlspecialchars($row['title']); ?>">
                                                    <?php
                                                    $title = htmlspecialchars($row['title']);
                                                    echo strlen($title) > 18 ? substr($title, 0, 40) . '...' : $title;
                                                    ?>
                                                </td>
                                                <td title="<?php echo htmlspecialchars($row['short_description']); ?>">
                                                    <?php
                                                    $shortDescription = htmlspecialchars($row['short_description']);
                                                    echo strlen($shortDescription) > 20 ? substr($shortDescription, 0, 20) . '...' : $shortDescription;
                                                    ?>
                                                </td>
                                               

                                                <!-- <td>
                                                    <a href="../templates/view_input.php">
                                                        View
                                                    </a>
                                                </td> -->
                                                <td>
                                                    <a href="view_input.php?id=<?php echo $row['id']; ?>">View</a>
                                                </td>

                                                <td>
                                                    <a
                                                        href="edit_input.php?id=<?php echo $row['id']; ?>">Edit</a> |
                                                    <a
                                                        href="../templates/view_upload.php?delete=<?php echo $row['id']; ?>">Delete</a>
                                                </td>

                                            </tr>
                                            <?php
                                            $i++; // Increment the ID counter for the next row
                                        endforeach;
                                        ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan='7'>No files found.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>


                            </table>
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
                        <p>Welcome, <b>
                                <KIM>
                        </p>
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
                            <h3>Workshop</h3>
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
                            <h3>Workshop</h3>
                            <small class="text_muted">
                                08:00 AM - :00 PM
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