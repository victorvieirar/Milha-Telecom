<?php
session_start();

require_once '../php/config/database.php';
require_once '../php/controllers/options.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Promoção Melhores Amigos | <?php echo getOption('sitename', $conn)['value']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/fonts.css">
        <link rel="stylesheet" type="text/css" media="screen" href="styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <section id="main">
            <img id="logo" src="logo.png" alt="logotipo melhores amigos">
            <img id="indica" src="indica.png" alt="instruções">
            <div id="form-container">
                <form action="send.php" method="post">
                    <div class="form-group">
                        <input type="text" name="cpf" id="cpf" placeholder=" ">
                        <label for="cpf" class="gray regular">Seu CPF</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="cod" id="cod" placeholder=" ">
                        <label for="cod" class="gray regular">Cód. do assinante</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="name" id="name" placeholder=" ">
                        <label for="name" class="gray regular">Nome do amigo</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" id="phone" placeholder=" ">
                        <label for="phone" class="gray regular">Telefone do amigo</label>
                    </div>
                    <button type="submit" name="send" class="background blue medium">enviar</button>
                </form>
                <a href="regulamento.pdf" id="regulamento" target="_blank">Acesse nosso regulamento <i class="fas fa-external-link-alt"></i></a>
            </div>
        </section>

        <div id="background">
            <img src="homem.png" alt="homem">
            <img src="mulher.png" alt="mulher">
        </div>

        <?php if(isset($_SESSION['sended'])) { ?>
            <div id="frame"></div>
            <div id="success">
                <p>Amigo indicado com sucesso!<br><br>Obrigado! 😄</p>
                <a class="button" href="../" target="_self">Ok, fechar</a>
            </div>
        <?php } elseif(isset($_SESSION['err'])) { ?>
            <div id="frame"></div>
            <div id="err">
                <p>Falha ao indicar amigo.<br><br>Tente novamente!</p>
                <a class="button" href="../melhores-amigos" target="_self">Ok, fechar</a>
            </div>
        <?php } ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="functions.js"></script>
</html>

<?php
session_destroy();
?>