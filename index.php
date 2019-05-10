<?php
session_start();

require_once('php/config/database.php');
require_once('php/controllers/options.php');
require_once('php/controllers/plans.php');
require_once('php/controllers/cities.php');

$plans = getPlans($conn);
$cities = getCities($conn);

if (isset($_GET['local'])) {
    $_SESSION['local'] = $_GET['local'];
    header('location: ./');
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo getOption('sitename', $conn)['value']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.tablet.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/styles.desktop.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>

<body>
    <script type="text/javascript" src="https://toolsnet.mktzap.com.br/webchat/"></script>
    <?php
    if (!isset($_SESSION['local'])) {
        ?>
        <div id="local-container">
            <img src="assets/logo.png" class="logo" alt="Logotipo ToolsNET">
            <h2 class="bold white">Onde você está?</h2>
            <select name="city" id="local-picker">
                <option selected disabled>Selecione sua cidade</option>
                <?php
                foreach ($cities as $city) {
                    ?>
                    <option value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>
                <?php
            }
            ?>
            </select>
        </div>
    <?php
} else {
    ?>

        <header>
            <img src="assets/logo.png" class="logo" alt="Logotipo ToolsNET">
            <span id="site-title" class="bold white"><?php echo getOption('sitename', $conn)['value']; ?></span>
            <i id="menu" class="fas fa-bars white"></i>
            <nav id="nav">
                <ul>
                    <li><a href="empresa">Empresa</a></li>
                    <li><a href="planos">Planos</a></li>
                    <li><a href="servicos">Serviços</a></li>
                    <li><a href="contato">Contato</a></li>
                    <li><a href="https://portal.toolsnet.com.br/person_users/login">Assinante</a></li>
                </ul>
            </nav>
        </header>

        <nav id="mobile-wrap">
            <ul>
                <li><a href="empresa">Empresa</a></li>
                <li><a href="planos">Planos</a></li>
                <li><a href="servicos">Serviços</a></li>
                <li><a href="contato">Contato</a></li>
                <li><a href="https://portal.toolsnet.com.br/person_users/login">Assinante</a></li>
            </ul>
        </nav>

        <section id="top" class="container">
            <div id="slider-top">
                <img src="assets/BANNER_1.png" alt="slide 1" class="active">
                <img src="assets/BANNER_2.png" alt="slide 1" class="">
                <img src="assets/BANNER_3.png" alt="slide 1" class="">
            </div>
            <div id="top-container">
                <div id="actions-plans">
                    <div id="landing-text">
                        <span class="white bold">Quem tem <?php echo getOption('sitename', $conn)['value']; ?> tem</span><br>
                        <span class="green bold"> ultravelocidade em fibra óptica</span>
                        <p class="white">Escolha um de nossos planos e ganhe um roteador!</p>
                    </div>
                    <div id="actions-buttons">
                        <a href="contato" class="button white bold">Nós ligamos pra você</a>
                        <a href="planos" class="button green bold">Todos os planos</a>
                    </div>
                </div>
                <div id="slider-plans">
                    <div class="arrow"><i id="prev" class="fas fa-angle-left"></i></div>
                    <?php
                    foreach ($plans as $plan) {
                        $name = explode(' ', $plan['name']);
                        $price = explode(',', number_format($plan['price'], 2, ',', '.'));
                        ?>
                        <div class="plan">
                            <img onclick="window.open('planos', '_self')" src="./assets/plans/<?php echo $plan['img']; ?>" alt="<?php echo $plan['name']; ?>">
                        </div>
                    <?php
                }
                ?>
                    <div class="arrow"><i id="next" class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </section>

        <section id="about" class="container">
            <img src="assets/milha-info-01.png" alt="conexão mais rápida com o mundo" class="site-info-img">
            <div class="text-box">
                <p id="about-title">
                    <span class="bold blue uppercase"><?php echo getOption('sitename', $conn)['value']; ?>:</span><br>
                    <span class="blue uppercase">Uma empresa do grupo milha telecom</span>
                </p>
                <p id="about-description" class="blue"><?php echo getOption('enterprise', $conn)['value']; ?></p>
            </div>
        </section>

        <section id="fiber" class="container">
            <div class="side-reverse">
                <img src="assets/milha-info-02.png" alt="celular na mão" class="site-info-img">
                <div class="text-box">
                    <p class="fiber-title">
                        <span class="bold blue uppercase"><?php echo getOption('sitename', $conn)['value']; ?> fibra:</span><br>
                        <span class="blue uppercase">Ultravelocidade ao seu alcance</span>
                    </p>
                    <p class="fiber-description white"><?php echo getOption('fiber', $conn)['value']; ?></p>
                </div>
            </div>
            <div class="text-box">
                <p class="fiber-title f-start">
                    <span class="bold blue uppercase">Maior velocidade</span>
                    <span class="blue uppercase">em vídeos e filmes</span>
                </p>
                <p class="fiber-description white"><?php echo getOption('velocity', $conn)['value']; ?></p>
            </div>
        </section>

        <section id="advantages" class="container">
            <img src="assets/milha-vantagens.png" alt="vantagens" class="site-landing-img">
            <p id="advantages-title" class="bold blue uppercase">Vantagens</p>
            <p id="advantages-description" class="blue">Suporte telefônico de segunda a domingo ⦿ Empresa Local ⦿ Proximidade com o cliente ⦿ Atendimento local ⦿ Garantia da velocidade contratada</p>
            <div id="advantages-labels">
                <div class="label blue">Maior velocidade de transmissão de dados</div>
                <div class="label blue">É imune a interferências eletromagnéticas externas</div>
                <div class="label blue">Menor degradação do sinal</div>
                <div class="label blue">Mais qualidade para o seu acesso</div>
                <div class="label blue">Segurança ao transportar informações</div>
                <div class="label blue">Suporte telefônico de segunda a domingo</div>
                <div class="label blue">Empresa local</div>
                <div class="label blue">Proximidade com o cliente</div>
                <div class="label blue">Atendimento local</div>
                <div class="label blue">Garantia da velocidade contratada</div>
            </div>
        </section>

        <section id="contact" class="container">
            <div class="side">
                <img src="assets/milha-info-03.png" alt="fale conosco" class="site-info-img">
                <div class="column">
                    <a href="#" class="button green bold">assine já</a>
                    <div id="more-info">
                        <span class="blue" id="more-info-label">Mais informações:</span><br>
                        <span class="blue bold"><?php echo getOption('phone', $conn)['value']; ?></span>
                    </div>
                </div>
            </div>
        </section>

        <section id="our-local" class="container">
            <span id="our-local-title" class="white bold uppercase">Nossa presença</span>
            <iframe style="width: 100%;" src="https://www.google.com/maps/d/embed?mid=1ENYSIl4WxtFHNp2iqe2S8mQemS6a6C_g" height="480"></iframe>
        </section>

        <footer>
            <div class="col">
                <img style="width: 100%; padding-right: 30px;" src="./assets/logo.transparent.png" alt="logotipo">
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

            <div id="local-container-footer" style="font-size: .75rem; margin-top: 20px;">
                <span>Você está em: </span>
                <select id="local-picker">
                    <?php
                    foreach ($cities as $city) {
                        ?>
                        <option value="<?php echo $city['id'] ?>" <?php if ($city['id'] == $_SESSION['local']) echo 'selected'; ?>><?php echo $city['city']; ?></option>
                    <?php
                }
                ?>
                </select>
            </div>

            <div id="brands" class="row">
                <img src="assets/logo-raf.jpg" alt="logotipo raf">
                <div id="social-networks">
                    <i class="fab fa-facebook blue" onclick="window.open('<?php echo getOption('facebook', $conn)['value']; ?>', '_blank');"></i>
                    <i class="fab fa-instagram blue" onclick="window.open('<?php echo getOption('instagram', $conn)['value']; ?>', '_blank');"></i>
                </div>
            </div>
        </footer>
    <?php } ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="js/functions.js"></script>

</html>