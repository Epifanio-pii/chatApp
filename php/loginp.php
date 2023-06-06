<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

   if(!empty($email) && !empty($password)){

        $sql = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE email = '{$email}' AND password = '{$password}'");

        if($sql){
            if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            $status = "Online";
             
            $sql2 = mysqli_query($conn, "UPDATE tbl_usuario SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
             $status = "Offline";
           
            if($sql2){
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }

        }else{
            echo "Email or Password Not valid";
        }
        }else{
            echo "ERRO!";
        }
    }else{
            echo "All input fields are required!";
    }
    
?>