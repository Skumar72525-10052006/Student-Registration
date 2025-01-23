<?php

@include 'config.php';

if(isset($_POST['submit'])){


    $FullName = mysqli_real_escape_string($conn, $_POST['fullName']);
    $Username = mysqli_real_escape_string($conn, $_POST['Username']);
    $DateOfBirth = mysqli_real_escape_string($conn, $_POST['dob']);
    $Class = mysqli_real_escape_string($conn, $_POST['class']);
    $Stream = mysqli_real_escape_string($conn, $_POST['stream']);
    $StudentContact = mysqli_real_escape_string($conn, $_POST['studentContact']);
    $StudentEmail = mysqli_real_escape_string($conn, $_POST['studentEmail']);
    $Address = mysqli_real_escape_string($conn, $_POST['address']);
    $Password = md5($_POST['password']);
    $ConfirmPassword = md5($_POST['confirmPassword']);
    $Gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $GuardiansName = mysqli_real_escape_string($conn, $_POST['guardianName']);
    $GuardiansRelation = mysqli_real_escape_string($conn, $_POST['guardianRelation']);
    $GuardiansContact = mysqli_real_escape_string($conn, $_POST['guardianContact']);
    $GuardiansEmail = mysqli_real_escape_string($conn, $_POST['guardianEmail']);

    $select = "SELECT * FROM students_detail WHERE Username = '$Username' && Password = '$Password'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'User Already Exist';
    }else{
        if($Password != $ConfirmPassword){
            $error[] = 'Password Not Matched';
        }else{
            $insert = "INSERT INTO students_detail(
                Name, 
                Username, 
                DateOfBirth, 
                Class, 
                Stream, 
                StudentContact,
                StudentEmail,
                Address, 
                Password, 
                Gender, 
                GuardiansName, 
                GuardiansRelation, 
                GuardiansContact, 
                GuardiansEmail
            ) VALUES(
                '$FullName',
                '$Username',
                '$DateOfBirth',
                '$Class',
                '$Stream',
                '$StudentContact',
                '$StudentEmail',
                '$Address',
                '$Password',
                '$Gender',
                '$GuardiansName',
                '$GuardiansRelation',
                '$GuardiansContact',
                '$GuardiansEmail'
            )";
            
            if(mysqli_query($conn, $insert)){
                header('Location: login.php');
                exit();
            } else {
                $error[] = 'Registration failed: ' . mysqli_error($conn);
            }

        }
    }
};
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Registration Form</title>
    <link rel="stylesheet" href="./assets/registration.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="login-box">
            <h2>Student Registration</h2>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<div class="error">'.$error.'</div>';
                };
            };
            ?>
            <form action="" method="POST" autocomplete="off">
                <h3 class="section-title">Student Information</h3>
                <div class="form-grid">
                    <div class="input-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="fullName" placeholder="Full Name" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-id-card"></i>
                        <input type="text" name="Username" placeholder="Username" required>
                    </div>
                    <div class="input-group date-group">
                        <i class="fas fa-calendar"></i>
                        <input type="date" name="dob" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-graduation-cap"></i>
                        <select name="class" required>
                            <option value="">Select Class</option>
                            <option value="11">Class 11</option>
                            <option value="12">Class 12</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-user-graduate"></i>
                        <select name="stream" required>
                            <option value="">Select Stream</option>
                            <option value="science">Science</option>
                            <option value="commerce">Commerce</option>
                            <option value="arts">Arts</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="studentContact" placeholder="Student's Contact Number" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="studentEmail" placeholder="Student's Email Address" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-home"></i>
                        <input type="text" name="address" placeholder="Address" required>
                    </div>
                </div>
                <div class="form-grid">
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Create Password" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
                    </div>
                </div>

                <h3 class="section-title">Gender</h3>
                <div class="gender-container">
                    <div class="gender-option">
                        <input type="radio" name="gender" id="male" value="male" required>
                        <label for="male">
                            <i class="fas fa-mars"></i>
                            <span>Male</span>
                        </label>
                    </div>
                    <div class="gender-option">
                        <input type="radio" name="gender" id="female" value="female">
                        <label for="female">
                            <i class="fas fa-venus"></i>
                            <span>Female</span>
                        </label>
                    </div>
                    <div class="gender-option">
                        <input type="radio" name="gender" id="other" value="other">
                        <label for="other">
                            <i class="fas fa-genderless"></i>
                            <span>Other</span>
                        </label>
                    </div>
                </div>

                

                <h3 class="section-title">Guardian Information</h3>
                <div class="form-grid">
                    <div class="input-group">
                        <i class="fas fa-user-shield"></i>
                        <input type="text" name="guardianName" placeholder="Guardian's Name" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-users"></i>
                        <select name="guardianRelation" required>
                            <option value="">Relationship with Guardian</option>
                            <option value="father">Father</option>
                            <option value="mother">Mother</option>
                            <option value="grandfather">Grandfather</option>
                            <option value="grandmother">Grandmother</option>
                            <option value="uncle">Uncle</option>
                            <option value="aunt">Aunt</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-phone"></i>
                        <input type="tel" name="guardianContact" placeholder="Guardian's Contact Number" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="guardianEmail" placeholder="Guardian's Email Address" required>
                    </div>
                </div>

                <button type="submit" name="submit">Register</button>

                <div class="signup-section">
                    <p>Already have an account? <a href="login.php" class="signup-btn">Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

