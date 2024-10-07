<?php

include("../common/db.php");

if (isset($_REQUEST['signup'])) {

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $address = $_REQUEST['address'];
}

?>