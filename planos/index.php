<?php

require_once ('../php/config/database.php');
require_once ('../php/controllers/options.php');
require_once ('../php/controllers/plans.php');

$plans = getPlans($conn);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo getOption('sitename', $conn)['value']; ?> | Planos</title>
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

        <section id="plans-full" class="container"> 
            <p id="enterprise-title" class="white bold uppercase">Nossos Planos</p>
            <div id="slider-plans-full">
                <div class="arrow"><i id="prev" class="fas fa-angle-left"></i></div>
                <?php
                foreach ($plans as $plan) {
                    $price = explode(',', number_format($plan['price'], 2, ',', '.'));
                ?>
                <div class="plan-full">
                    <div class="top">
                        <p class="plan-name white uppercase bold"><?php echo $plan['name']; ?></p>
                    </div>
                    <div class="middle">
                        <span class="white bold uppercase small side-label">A partir de:</span>
                        <div class="plan-price-container">
                            <span class="cipher white bold">R$</span>
                            <span class="white bold value"><?php echo $price[0]; ?></span>
                            <span class="white bold value-decimal"><?php echo ','.$price[1]; ?></span>
                        </div>
                    </div>
                    <div class="bottom">
                        <p class="white"><?php echo $plan['description']; ?></p>
                        <a href="planos" class="button green bold">Assine agora</a>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="arrow"><i id="next" class="fas fa-angle-right"></i></div>
            </div>
        </section>

        <section id="plans" class="container mob"> 
            <p id="enterprise-title" class="white bold uppercase">Nossos Planos</p>
            <div id="slider-plans" class="mob">
                <div class="arrow"><i id="prev" class="fas fa-angle-left"></i></div>
                <?php
                foreach ($plans as $plan) {
                    $price = explode(',', number_format($plan['price'], 2, ',', '.'));
                ?>
                <div class="plan mob">
                    <div class="top">
                        <p class="plan-name white uppercase bold"><?php echo $plan['name']; ?></p>
                    </div>
                    <div class="middle">
                        <span class="white bold uppercase small side-label">A partir de:</span>
                        <div class="plan-price-container">
                            <span class="cipher white bold">R$</span>
                            <span class="white bold value"><?php echo $price[0]; ?></span>
                            <span class="white bold value-decimal"><?php echo ','.$price[1]; ?></span>
                        </div>
                    </div>
                    <div class="bottom">
                        <p class="white"><?php echo $plan['description']; ?></p>
                        <a href="planos" class="button green bold">Assine agora</a>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class="arrow"><i id="next" class="fas fa-angle-right"></i></div>
            </div>
        </section>

        <footer>
            <form action="php/operations/request-contact.php" method="post">
                <input type="text" name="name" id="name" placeholder="Seu nome">
                <input type="email" name="email" id="email" placeholder="Seu e-mail">
                <button type="submit" value="send" class="white bold">Entre em contato!</button>
            </form>

            <p id="credits">
                <span class="blue bold uppercase"><?php echo getOption('sitename', $conn)['value']; ?></span><br>
                <span class="blue">Todos os direitos reservados.</span><br>
                <span class="blue"><?php echo getOption('phone', $conn)['value']; ?></span>
            </p>

            <div id="brands">
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