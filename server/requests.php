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
        // Get the ID of the newly inserted user
        $new_user_id = $conn->insert_id;


        // Store user information in session, including the new user's ID
        $_SESSION['user_info'] = [
            "id" => $new_user_id,       // Add the user ID here
            "username" => $name,
            "email" => $email
        ];

        header("Location: /Discussion-Board");
        exit(); // Prevent further code execution
    } else {
        // Error in the query or insertion
        session_unset();
        header("Location: /Discussion-Board?error=signup");
        exit();
    }
    // Handle login
} elseif (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    // Use prepared statements to fetch user details
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $id = 0;

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password']; // Get the hashed password from the database
        $id =  $row['id'];
        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Store user information in session after successful login
            $_SESSION['user_info'] = ["username" => $row['name'], "email" => $email, "id" => $id];
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
} elseif (isset($_REQUEST['ask'])) {

    $title = $_REQUEST['title'];
    $description = $_REQUEST['description']; // Corrected the typo from 'desertion'
    $category_id = $_REQUEST['category_id'];
    $user_id = $_SESSION['user_info']['id'];

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO `question`(`id`, `title`, `description`, `category_id`, `user_id`) VALUES (Null, ?, ?, ?, ?)");

    // Bind the variables to the statement
    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id); // "ssii" -> 2 strings, 2 integers

    // Execute the statement and handle the result
    if ($stmt->execute()) {
        header("Location: /Discussion-Board");
        exit(); // Ensure further code is not executed after redirect
    } else {
        echo "Error: Question could not be added to the website.";
    }
} else{
    
}
