<?php 
    include_once "header.php";
?>

<body>  
       <div class="wrapper">
           <section class="form signup">
            <header>Chat App</header>
                 <form action="#">
                     <div class="error-text"></div>
                     <div class="name-details">
                         <div class="field">
                             <label for="firstName" >Nome</label>
                             <input required type="text" name="nome" placeholder="Digite o Nome">

                              <label for="lastName">Sobrenome</label>
                            <input required type="text" name="sobrenome" placeholder="Digite o Sobrenome">
                         </div>
                       
                           
                       
                        <div class="field">
                            <label for="email">Email</label>
                            <input required type="email" name="email" placeholder="Digite o Email">
                        </div>
                        <div class="field">
                            <label for="password">Palavra-passe</label>
                            <input type="password" minlength="8"  name="password" required placeholder="Digite a Palavra-passe"> 
                            <i class="fas fa-eye"></i>
                        </div>
                     </div>
                     <div class="field button">
                         <input type="submit" value="Continue to chat">
                     </div>
                 </form>

                 <div class="link">Já Cadastrado? <a href="../html/login.php">Entrar</a></div>
           </section>
       </div>


       <script src="../js/password-show-hide.js"></script>
       <script src="../js/signup.js"></script>
</body>
</html> 