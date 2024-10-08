<?php
session_start();
include("../common/db.php"); 


if (isset($_REQUEST['signup'])) {
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT); 
    $address = $_REQUEST['address'];

  
    $stmt = $conn->prepare("INSERT INTO `users`(`id`, `name`, `email`, `password`, `address`) VALUES (null, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $address);

    if ($stmt->execute()) {
       
        $new_user_id = $conn->insert_id;
      
        $_SESSION['user_info'] = [
            "id" => $new_user_id,      
            "username" => $name,
            "email" => $email
        ];
        header("Location: /Discussion-Board");
      
    } else {
        session_unset();
        header("Location: /Discussion-Board?error=signup");
    }
    // Handle login
} elseif (isset($_REQUEST['login'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $id = 0;

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $id =  $row['id'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_info'] = ["username" => $row['name'], "email" => $email, "id" => $id];
            header("Location: /Discussion-Board");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with the given email.";
    }

} elseif (isset($_REQUEST['logout'])) {

    session_unset();
    session_destroy();
    header("Location: /Discussion-Board");
    exit();
} elseif (isset($_REQUEST['ask'])) {

    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $category_id = $_REQUEST['category_id'];
    $user_id = $_SESSION['user_info']['id'];

    $stmt = $conn->prepare("INSERT INTO `question`(`id`, `title`, `description`, `category_id`, `user_id`) VALUES (Null, ?, ?, ?, ?)");

    $stmt->bind_param("ssii", $title, $description, $category_id, $user_id);

    if ($stmt->execute()) {
        header("Location: /Discussion-Board");
        exit();
    } else {
        echo "Error: Question could not be added to the website.";
    }
} elseif (isset($_REQUEST['answer_btn'])) {
    $answer = $_REQUEST['answer_text'];
    $question_id = $_REQUEST['question_hidden'];
    $user_id = $_SESSION['user_info']['id'];

    $stmt = $conn->prepare("INSERT INTO `answers`(`id`, `answer`, `question_id`, `user_id`) VALUES (Null, '$answer', '$question_id', '$user_id')");

    if ($stmt->execute()) {
        header("Location: /Discussion-Board/?question_id=$question_id");
        exit();
    } else {
        echo "Error: Question could not be added to the website.";
    }

}
