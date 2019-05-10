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
    <title><?php echo getOption('sitename', $conn)['value']; ?> | Contato</title>
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

    <section id="contact" class="container">
        <p class="title blue bold uppercase">Contato</p>
        <form id="contact-form" action="../php/operations/contact.php" method="post">
            <div class="row">
                <div class="form-group">
                    <label for="name">Nome completo:</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Nome">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="text" name="email" id="email" placeholder="exemplo@email.com">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="cpf">CPF:</label>
                    <input class="form-control" type="text" name="cpf" id="cpf" placeholder="000.000.000-00">
                </div>
                <div class="form-group">
                    <label for="birth">Data de nascimento:</label>
                    <input class="form-control" type="text" name="birth" id="birth" placeholder="mm/dd/aaaa">
                </div>
                <div class="form-group">
                    <label for="gender">Sexo:</label>
                    <span>Outro</span> <input class="form-control" type="radio" name="gender" id="gender" value="o">
                    <span>Masculino</span> <input class="form-control" type="radio" name="gender" id="gender" value="m">
                    <span>Feminino</span> <input class="form-control" type="radio" name="gender" id="gender" value="f">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="address">Endereço:</label>
                    <input class="form-control" type="text" name="address" id="address" placeholder="Endereço">
                </div>
                <div class="form-group">
                    <label for="neighborhood">Bairro:</label>
                    <input class="form-control" type="text" name="neighborhood" id="neighborhood" placeholder="Bairro">
                </div>
                <div class="form-group">
                    <label for="city">Cidade:</label>
                    <input class="form-control" type="text" name="city" id="city" placeholder="Cidade">
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="state">Estado:</label>
                    <input class="form-control" type="text" name="state" id="state" placeholder="Estado">
                </div>
                <div class="form-group">
                    <label for="reference">Ponto de referência:</label>
                    <input class="form-control" type="text" name="reference" id="reference" placeholder="Ponto de referência">
                </div>
                <div class="form-group">
                    <label for="phone">Telefone:</label>
                    <input class="form-control" type="text" name="phone" id="phone" placeholder="(00) 00000-0000">
                </div>
            </div>
            <button type="submit">enviar</button>
        </form>
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