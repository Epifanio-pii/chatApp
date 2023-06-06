<?php
    $conn = mysqli_connect('localhost', 'root', '', 'db_chat');

    if(!$conn){
        echo 'DATABASE CONNECTED' . mysqli_connect_error();
    }

?>