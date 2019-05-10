<?php

require_once('../php/config/database.php');
require_once('../php/controllers/options.php');
require_once('../php/controllers/plans.php');

$plans = getPlans($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getOption('sitename', $conn)['value']; ?> | A Empresa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.tablet.css">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.desktop.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <header>
        <img src="../assets/logo.png" class="logo" alt="Logotipo ToolsNET" onclick="window.open('../', '_self');">
        <span id="site-title" class="bold white" onclick="window.open('../', '_self');"><?php echo getOption('sitename', $conn)['value']; ?></span>
        <i id="menu" class="fas fa-bars white"></i>
        <nav id="nav">
            <ul>
                <li><a href="../empresa">Empresa</a></li>
                <li><a href="../planos">Planos</a></li>
                <li><a href="../servicos">Serviços</a></li>
                <li><a href="../contato">Contato</a></li>
                <li><a href="https://portal.toolsnet.com.br/person_users/login">Assinante</a></li>
            </ul>
        </nav>
    </header>

    <nav id="mobile-wrap">
        <ul>
            <li><a href="../empresa">Empresa</a></li>
            <li><a href="../planos">Planos</a></li>
            <li><a href="../servicos">Serviços</a></li>
            <li><a href="../contato">Contato</a></li>
            <li><a href="https://portal.toolsnet.com.br/person_users/login">Assinante</a></li>
        </ul>
    </nav>

    <section id="enterprise" class="container">
        <p id="enterprise-title" class="blue bold uppercase">A empresa</p>
        <p id="enterprise-description" class="blue"><?php echo getOption('about', $conn)['value']; ?></p>
    </section>

    <footer>
        <div class="col">
            <img style="width: 100%; padding-right: 30px;" src="../assets/logo.transparent.png" alt="logotipo">
            <div class="blue">
                <p class="bold">Atendimento nos escritórios:</p>
                <p>
                    Segunda à sexta: das 08h às 12h - das 13h às 17h
                    <br>
                    Sábados: das 08h às 12h
                </p>
            </div>
            <div class="blue">
                <p class="bold">Suporte telefônico:</p>
                <p>
                    De domingo à domingo, 24h
                </p>
            </div>
        </div>

        <div class="col">
            <input type="text" name="name" id="name" placeholder="Seu nome">
            <div class="blue">
                <p class="bold">Loja 1 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
            <div class="blue">
                <p class="bold">Loja 2 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
        </div>

        <div class="col">
            <input type="email" name="email" id="email" placeholder="Seu e-mail">
            <div class="blue">
                <p class="bold">Loja 1 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
            <div class="blue">
                <p class="bold">Loja 2 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
        </div>

        <div class="col">
            <button type="submit" value="send" class="white bold">Entre em contato!</button>
            <div class="blue">
                <p class="bold">Loja 1 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
            <div class="blue">
                <p class="bold">Loja 2 - Local</p>
                <p>
                    Endereço
                </p>
            </div>
        </div>

        <div class="row">
            <p class="blue"><span class="bold">Comercial:</span> telefones...</p>
            <p class="blue"><span class="bold">Celulares:</span> telefones...</p>
            <p class="blue"><span class="bold">WhatsApp:</span> telefones...</p>
        </div>

        <form action="#" id="mob-newsletter">
            <input type="text" name="name" id="name" placeholder="Seu nome">
            <input type="email" name="email" id="email" placeholder="Seu e-mail">
            <button type="submit" value="send" class="white bold">Entre em contato!</button>
        </form>

        <div id="brands" class="row">
            <img src="../assets/logo-raf.jpg" alt="logotipo raf">
            <div id="social-networks">
                <i class="fab fa-facebook blue" onclick="window.open('<?php echo getOption('facebook', $conn)['value']; ?>', '_blank');"></i>
                <i class="fab fa-instagram blue" onclick="window.open('<?php echo getOption('instagram', $conn)['value']; ?>', '_blank');"></i>
            </div>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="../js/functions.js"></script>

</html>