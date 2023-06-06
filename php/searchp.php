<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $output ="";

    $sql = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE NOT unique_id = {$outgoing_id} AND (nome LIKE '%{$searchTerm}%' || sobrenome LIKE '%{$searchTerm}%') ");

    if(mysqli_num_rows($sql) > 0){
        include_once "datap.php";
    }else{
        $output .= "Nenhum usuário correspondente";
    }
    echo $output;
?>