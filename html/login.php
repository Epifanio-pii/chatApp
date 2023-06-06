<?php 
    include_once "header.php";
?>

<body>
    <div class="wrapper">
        <section class="form login">
            <header>Chat App</header>
            <form action="#" >
                <div class="error-text"></div>
                <div class="name-details">
                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" required name="email" placeholder="Digite o Email">
                    </div>
                    <div class="field">
                        <label for="password">Palavra-passe</label>
                        <input type="password" required name="password" placeholder="Digite a Palavra-passe">
                        <i class="fas fa-eye"></i>
                    </div>
                </div>
                <div class="field button">
                    <input type="submit" value="Continue to chat">
                </div>
            </form>

            <div class="link">Cadastre-se já! <a href="../html/index.php">Cadastrar</a>
            </div>
        </section>
    </div>


    <script src="../js/password-show-hide.js"></script>
    <script src="../js/login.js"></script>
</body>
</html>