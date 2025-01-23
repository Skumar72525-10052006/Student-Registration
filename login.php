<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $Password = md5($_POST['Password']);

    $select = "SELECT * FROM students_detail WHERE Username = ? AND Password = ?";
    $stmt = $conn->prepare($select);
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $_SESSION['Username'] = $row['Username'];
        header('location: dashboard.php');
        exit();
    } else {
        $error[] = 'Incorrect Username or Password!';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Student Login</title>
    <link rel="stylesheet" href="./assets/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Student Login</h2>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<div class="error">'.$error.'</div>';
                };
            };
            ?>
            <form action="" method="POST">
                <div class="input-group">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="Username" placeholder="Enter Your Username" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="Password" placeholder="Enter Password" required>
                </div>
                <button type="submit" name="submit">Login</button>
                <div class="forgot-password">
                    <a href="#">Forgot Password?</a>
                </div>
            </form>
            <div class="divider">
                <span>OR</span>
            </div>
            <div class="signup-section">
                <p>New User?</p>
                <a href="./register.php" class="signup-btn">Sign Up</a>
            </div>
        </div>
    </div>
</body>
</html>
