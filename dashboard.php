<?php
session_start();
include 'config.php';

// Check if user is logged in
if (!isset($_SESSION['Username'])) {
    header('location: login.php');
    exit();
}

// Handle Delete Operation
if (isset($_GET['delete_id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete_id']);
    $sql = "DELETE FROM students_detail WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Record deleted successfully";
    } else {
        $_SESSION['message'] = "Error deleting record: " . $conn->error;
    }
    $stmt->close();
    header("Location: dashboard.php");
    exit();
}

// Handle Update Operation
if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $username = mysqli_real_escape_string($conn, $_POST['Username']);
    $dateOfBirth = mysqli_real_escape_string($conn, $_POST['DateOfBirth']);
    $class = mysqli_real_escape_string($conn, $_POST['Class']);
    $stream = mysqli_real_escape_string($conn, $_POST['Stream']);
    $studentContact = mysqli_real_escape_string($conn, $_POST['StudentContact']);
    $studentEmail = mysqli_real_escape_string($conn, $_POST['StudentEmail']);
    $address = mysqli_real_escape_string($conn, $_POST['Address']);
    $gender = mysqli_real_escape_string($conn, $_POST['Gender']);
    $guardiansName = mysqli_real_escape_string($conn, $_POST['GuardiansName']);
    $guardiansRelation = mysqli_real_escape_string($conn, $_POST['GuardiansRelation']);
    $guardiansContact = mysqli_real_escape_string($conn, $_POST['GuardiansContact']);
    $guardiansEmail = mysqli_real_escape_string($conn, $_POST['GuardiansEmail']);

    $sql = "UPDATE students_detail SET 
            Name = ?, 
            Username = ?, 
            DateOfBirth = ?, 
            Class = ?, 
            Stream = ?, 
            StudentContact = ?, 
            StudentEmail = ?, 
            Address = ?, 
            Gender = ?, 
            GuardiansName = ?, 
            GuardiansRelation = ?, 
            GuardiansContact = ?, 
            GuardiansEmail = ? 
            WHERE Id = ?";
            
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssi", 
        $name,
        $username,
        $dateOfBirth,
        $class,
        $stream,
        $studentContact,
        $studentEmail,
        $address,
        $gender,
        $guardiansName,
        $guardiansRelation,
        $guardiansContact,
        $guardiansEmail,
        $id
    );
    
    if ($stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully";
        // Refresh the page to show updated data
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Error updating profile: " . $conn->error;
    }
    $stmt->close();
}

// Fetch user details
$Username = $_SESSION['Username'];
$query = "SELECT * FROM students_detail WHERE Username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $Username);
$stmt->execute();
$result = $stmt->get_result();
$user_data = $result->fetch_assoc();

// If user data not found
if (!$user_data) {
    header('location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/dashboard.css">
</head>
<body>
    <!--* Header & Navbar -->
    <header>
        <div class="container">
            <div class="logo-container">
                <img src="./assets/img/logo.webp" alt="High School Logo">
                <h1 class="school-name">D.A.V Public School</h1>
            </div>
        </div>
        <nav>
            <div id="navbar">
                <ul>
                    <li><a href="#profile" class="nav-link">Profile</a></li>
                    <li><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert"><?php echo htmlspecialchars($_SESSION['message']); ?></div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <div class="profile-container">
            <div class="profile-header">
                <h2 class="welcome-text">Welcome, <?php echo htmlspecialchars($user_data['Name']); ?></h2>
                <div>
                    <button class="btn btn-edit" onclick="openEditModal()">Edit Profile</button>
                    <a href="dashboard.php?delete_id=<?php echo $user_data['Id']; ?>" 
                       class="btn btn-delete" 
                       onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                        Delete Account
                    </a>
                </div>
            </div>

            <div class="student-details">
                <div class="detail-group">
                    <div class="detail-label">Full Name</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Name']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Username</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Username']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Date of Birth</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['DateOfBirth']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Class</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Class']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Stream</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Stream']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Gender</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Gender']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Student Contact</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['StudentContact']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Student Email</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['StudentEmail']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Address</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['Address']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Guardian's Name</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['GuardiansName']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Guardian's Relation</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['GuardiansRelation']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Guardian's Contact</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['GuardiansContact']); ?></div>
                </div>

                <div class="detail-group">
                    <div class="detail-label">Guardian's Email</div>
                    <div class="detail-value"><?php echo htmlspecialchars($user_data['GuardiansEmail']); ?></div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div id="editModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeEditModal()">&times;</span>
                <h2>Edit Profile</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $user_data['Id']; ?>">
                    
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="Name" value="<?php echo htmlspecialchars($user_data['Name']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="Username" value="<?php echo htmlspecialchars($user_data['Username']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="date" name="DateOfBirth" value="<?php echo htmlspecialchars($user_data['DateOfBirth']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Class</label>
                        <input type="text" name="Class" value="<?php echo htmlspecialchars($user_data['Class']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Stream</label>
                        <input type="text" name="Stream" value="<?php echo htmlspecialchars($user_data['Stream']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Gender</label>
                        <input type="text" name="Gender" value="<?php echo htmlspecialchars($user_data['Gender']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Student Contact</label>
                        <input type="text" name="StudentContact" value="<?php echo htmlspecialchars($user_data['StudentContact']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Student Email</label>
                        <input type="email" name="StudentEmail" value="<?php echo htmlspecialchars($user_data['StudentEmail']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="Address" value="<?php echo htmlspecialchars($user_data['Address']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Guardian's Name</label>
                        <input type="text" name="GuardiansName" value="<?php echo htmlspecialchars($user_data['GuardiansName']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Guardian's Relation</label>
                        <input type="text" name="GuardiansRelation" value="<?php echo htmlspecialchars($user_data['GuardiansRelation']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Guardian's Contact</label>
                        <input type="text" name="GuardiansContact" value="<?php echo htmlspecialchars($user_data['GuardiansContact']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Guardian's Email</label>
                        <input type="email" name="GuardiansEmail" value="<?php echo htmlspecialchars($user_data['GuardiansEmail']); ?>" required>
                    </div>

                    <button type="submit" name="update" class="btn btn-edit">Update Profile</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 D.A.V Public School. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function openEditModal() {
            document.getElementById('editModal').style.display = 'block';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeEditModal();
            }
        }
    </script>
</body>
</html>