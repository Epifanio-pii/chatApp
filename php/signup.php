<?php 

    session_start();
   include_once 'Config.php';
   $nome = mysqli_real_escape_string($conn, $_POST['nome']);
   $sobrenome = mysqli_real_escape_string($conn, $_POST['sobrenome']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   if(!empty( $nome) && !empty( $sobrenome) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $sql = mysqli_query($conn, "SELECT email FROM tbl_usuario WHERE email = '{$email}' ");
            if(mysqli_num_rows($sql)>0){
                echo " '{$email}' - Este Email já está Cadastrado!";
            }else{ 
                $pattern = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
                if(!preg_match($pattern, $password)) {
                    echo " Palavra-passe deve conter, pelo menos, 1 letra ou número";
                }else{
                    $status = "Online";
                    $random_id = rand(time(), 10000000);

                    $sql2 = mysqli_query($conn, "INSERT INTO tbl_usuario(unique_id, nome, sobrenome, email, password, status) 
                    VALUES('{$random_id}', '{$nome}','{$sobrenome}', '{$email}', '{$password}', '{$status}') ");

                if($sql2){
                     $sql3 = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE email = '{$email}' ");

                    if(mysqli_num_rows($sql3)>0){
                        $row = mysqli_fetch_assoc($sql3); 
                        $_SESSION['unique_id'] = $row['unique_id'];
                        echo "sucesso";
                    }
                }else{
                    echo "Não Funcionou";
                }
            }
            
        }
        }else{
            echo "Este email não é válido";
        }
   }else{
       echo "Preencha todos os campos";
   }

?>