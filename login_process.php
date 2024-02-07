<?php
// Include database connection
require 'connect.php';

// Start the session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    
    // Query to check if the user exists
    $check_user_query = "SELECT * FROM staff WHERE email = '$email'";
    $result = $con->query($check_user_query);
    if ($result->num_rows > 0) {
        // User exists, verify the password
        $row = $result->fetch_assoc();
        if ($password==$row['password']) {
            // Password is correct, set session variables and redirect
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['designation'] = $row['designation'];
            $_SESSION['image'] = $row['image'];
            if($_SESSION['designation']=="Admin"){
                header('Location: admin.php');
            exit();
            }
            else if($_SESSION['designation']=="Officer"){
                header('Location: officer.php');
            exit();
            }
            else{
                header('Location: salesperson.php');
            exit();
            }
            
        } else {
            // Password is incorrect, show error message
            header('Location: login.php?error1=1');
            exit();
        }
    } else {
        // User does not exist, show error message
        header('Location: login.php?error=1');
        exit();
    }
}
?>
