<?php
session_start();
include("../common/db.php"); // Include the database connection

// Handle Signup
if (isset($_REQUEST['signup'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); // Use password_hash for better security
    $address = $_REQUEST['address'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `users`(`id`, `name`, `email`, `password`, `address`) VALUES (null, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $address); // "ssss" means 4 strings will be bound

    if ($stmt->execute()) {
        // Store user information in session after successful signup
        $_SESSION['user_info'] = ["username" => $name, "email" => $email];
        header("Location: /Discussion-Board");
        exit(); // Prevent further code execution
    } else {
        // Error in the query or insertion
        session_unset();
        header("Location: /Discussion-Board?error=signup");
        exit();
    }

// Handle Login
} elseif (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Use prepared statements to fetch user details
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password']; // Get the hashed password from the database

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store user information in session after successful login
            $_SESSION['user_info'] = ["username" => $row['name'], "email" => $email];
            header("Location: /Discussion-Board");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with the given email.";
    }

// Handle Logout
} elseif (isset($_REQUEST['logout'])) {
    // Unset all session variables and destroy the session
    session_unset();
    session_destroy();
    header("Location: /Discussion-Board");
    exit();
}
?>
