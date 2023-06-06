<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: ../html/login.php");
    }
?>
<?php 
    include_once "header.php";
?>
<body>
    <div class="wrapper">
        <section class="user">
            <header>
                <?php
                    include_once "../php/config.php";

                    $sql = mysqli_query($conn, "SELECT * FROM tbl_usuario WHERE unique_id = {$_SESSION['unique_id']}");

                    if(mysqli_num_rows($sql) > 0){
                        $row = mysqli_fetch_assoc($sql); 
                    }
                ?>
                <div class="content">
                       <div class="circle"  style="text-align: center;"><p id ="letter" style="margin-top: 5px; font-size:25px; font-weight:700;">
                       <?php
                            
                            echo substr($row['nome'],0,1)  
                       ?>  </p>
                       </div>
                    <div class="details">
                        <span><?php   echo $row['nome'] . " " . $row['sobrenome']?></span>
                        <p><?php   echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="../php/logout.php?user_id= <?php echo $row['unique_id'] ?>" class="logout">Sair </a>
            </header>

            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fas fa-search" aria-label="pesquisa"></i></button>
            </div>

            <div class="user-list">
              
            </div>
        </section>
    </div>

    <script src="../js/user.js"></script>
</body>
</html>