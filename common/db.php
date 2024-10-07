<?php

try{

    $conn = new PDO("mysql:host=localhost;dbname=discussion_board", "root", null);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
}catch(PDOException $err){
    echo "some error".$err;
}

?>