<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Discussion-Board</title>

    <!-- Common Files  -->
    <?php include("./client/commonFiles.php"); ?>
    
</head>

<body>
    <header>
        <?php include("./client/header.php"); ?>
    </header>

    <main>
        <?php

        if (!isset($_SESSION['user_info']['username'])) {
            if (isset($_REQUEST['signup'])) {

                include("./client/signup.php");
            } elseif (isset($_REQUEST['login'])) {

                include("./client/login.php");
            } else {
                include("./client/home.php");
            }
        } else if (isset($_REQUEST['ask'])) {

            include("./client/ask.php");
        } else if (isset($_REQUEST['question_id'])) {

            $question_id = $_REQUEST['question_id'];
            include("./client/question-details.php");
        } else if (isset($_REQUEST['category_id'])) {

            $category_id = $_REQUEST['category_id'];
            include("./client/questions.php");
        } else if (isset($_REQUEST['user_id'])) {

            $user_id = $_REQUEST['user_id'];
            include("./client/questions.php");
        } else if (isset($_REQUEST['latest'])) {

            include("./client/questions.php");
        } else if (isset($_REQUEST['search'])) {
            $search = $_REQUEST['search'];
            include("./client/questions.php");
        } else {
            include("./client/questions.php");
        }
        ?>
    </main>

    
    <!-- JS Files -->
    <script src="./public/assets/js/vendor.min.js"></script>
    <script src="./public/assets/js/app.js"></script>

    <!-- Additional JavaScript Libraries -->
    <script src="./public/assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="./public/assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="./public/assets/libs/morris.js/morris.min.js"></script>
    <script src="./public/assets/libs/raphael/raphael.min.js"></script>

    <!-- Dashboard Initialization -->
    <script src="./public/assets/js/pages/dashboard.js"></script>
</body>

</html>