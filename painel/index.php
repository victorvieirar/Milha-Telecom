<?php

require_once ('../php/config/database.php');
require_once ('../php/controllers/plans.php');
require_once ('../php/controllers/cities.php');
require_once ('../php/controllers/options.php');

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Milha Telecom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/fonts.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/styles.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../css/admin.styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(!isset($_SESSION['admin'])) {
                session_destroy();
        ?>
            <div id="login">
                <h2 class="blue bold uppercase">Toolsnet</h2>
                <form action="../php/operations/auth.php" method="post">
                    <input type="text" name="user" id="user" placeholder="Usuário">
                    <input type="password" name="password" id="password" placeholder="Senha">
                    <button type="submit" class="white bold uppercase" name="login">Entrar</button>
                </form>
            </div>
        <?php
            } else {
        ?>
            <div id="main">
                <h2 class="blue bold uppercase">Toolsnet</h2><br>
                <form action="../php/operations/update-info.php" method="post">
                    <div>
                        <label for="enterprise" class="blue bold uppercase">Texto - A empresa</label>
                        <textarea name="enterprise" id="enterprise" cols="30" rows="10" placeholder="Digite o texto aqui..."><?php echo getOption('enterprise', $conn)['value']; ?></textarea>
                    </div>
                    <div>
                        <label for="about-text" class="blue bold uppercase">Página - A empresa</label>
                        <textarea name="about" id="about-text" cols="30" rows="10" placeholder="Digite o texto aqui..."><?php echo getOption('about', $conn)['value']; ?></textarea>
                    </div>
                    <div>
                        <label for="fiber-text" class="blue bold uppercase">Texto - Fibra</label>
                        <textarea name="fiber" id="fiber-text" cols="30" rows="10" placeholder="Digite o texto aqui..."><?php echo getOption('fiber', $conn)['value']; ?></textarea>
                    </div>
                    <div>
                        <label for="velocity" class="blue bold uppercase">Texto - Maior velocidade</label>
                        <textarea name="velocity" id="velocity" cols="30" rows="10" placeholder="Digite o texto aqui..."><?php echo getOption('velocity', $conn)['value']; ?></textarea>
                    </div>
                    <div>
                        <label for="phone" class="blue bold uppercase">Número de telefone</label>
                        <input type="tel" name="phone" id="phone" placeholder="Número" value="<?php echo getOption('phone', $conn)['value']; ?>">
                    </div>
                    <div>
                        <label for="instagram" class="blue bold uppercase">Instagram</label>
                        <input type="text" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo getOption('instagram', $conn)['value']; ?>">
                    </div>
                    <div>
                        <label for="facebook" class="blue bold uppercase">Facebook</label>
                        <input type="text" name="facebook" id="facebook" placeholder="Facebook" value="<?php echo getOption('facebook', $conn)['value']; ?>">
                    </div>
                    <button type="submit" class="white bold uppercase" name="update">Atualizar dados</button>
                </form>

                <h4 class="green bold uppercase">Cidades</h4>
                <table>
                    <thead>
                        <tr class="blue uppercase">
                            <td class="bold">ID</td>
                            <td class="bold">Cidade</td>
                            <td class="bold">UF</td>
                            <td class="bold">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $cities = getCities($conn);
                        foreach ($cities as $city) {
                        ?>
                        <tr>
                            <td><?php echo $city['id']; ?></td>
                            <td><?php echo $city['city']; ?></td>
                            <td><?php echo $city['state']; ?></td>
                            <td class="delete-city" data-id="<?php echo $city['id']; ?>"><i class="fas fa-trash"></i></td>
                        </tr>
                        <?php
                        }                        
                        ?>
                    </tbody>
                </table>
                <h4 class="green bold uppercase">Adicionar cidade</h4>
                <form action="../php/operations/add-city.php" method="post">
                    <div>
                        <label for="city-name" class="blue bold uppercase">Nome da cidade</label>
                        <input type="text" name="name" id="city-name" placeholder="Nome">
                    </div>
                    <div>
                        <label for="city-state" class="blue bold uppercase">UF</label>
                        <input type="text" name="state" id="city-state" maxlength="2" placeholder="Estado (UF)">
                    </div>
                    <button type="submit" class="white bold uppercase" name="add">Adicionar cidade</button>
                </form>
                
                <h4 class="green bold uppercase">Planos</h4>
                <table>
                    <thead>
                        <tr class="blue uppercase">
                            <td class="bold">ID</td>
                            <td class="bold">Nome</td>
                            <td class="bold">Descrição</td>
                            <td class="bold">Preço</td>
                            <td class="bold">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $plans = getPlans($conn);
                        foreach ($plans as $plan) {
                        ?>
                        <tr>
                            <td><?php echo $plan['id']; ?></td>
                            <td><?php echo $plan['name']; ?></td>
                            <td><?php echo $plan['description']; ?></td>
                            <td><?php echo $plan['price']; ?></td>
                            <td class="delete-plan" data-id="<?php echo $plan['id']; ?>"><i class="fas fa-trash"></i></td>
                        </tr>
                        <?php
                        }                        
                        ?>
                    </tbody>
                </table>
                <h4 class="green bold uppercase">Adicionar plano</h4>
                <form id="plans-form" action="../php/operations/add-plan.php" method="post">
                    <div>
                        <label for="plan-name" class="blue bold uppercase">Nome do plano</label>
                        <input type="text" name="name" id="plan-name" placeholder="Nome">
                    </div>
                    <div>
                        <label for="plan-price" class="blue bold uppercase">Preço do plano</label>
                        <input type="number" name="price" id="plan-price" placeholder="Preço (R$)" step="any">
                    </div>
                    <div>
                        <label for="plan-description" class="blue bold uppercase">Descrição do plano</label>
                        <textarea name="description" id="plan-description" cols="30" rows="10" placeholder="Digite o texto aqui..."></textarea>
                    </div>
                    <div>
                        <label for="plan-description" class="blue bold uppercase">Cidades</label>
                        <select id="cities-picker">
                            <option selected disabled>Selecione a cidade</option>    
                            <?php
                            $cities = getCities($conn);
                            foreach ($cities as $city) {
                            ?>
                            <option uf="<?php echo $city['state']; ?>" value="<?php echo $city['id']; ?>"><?php echo $city['city']; ?></option>    
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div id="cities-container">
                    </div>
                    <button type="submit" class="white bold uppercase" name="add">Adicionar plano</button>
                </form>
            </div>

            <a href="../php/operations/logout.php" id="logout-button" class="button red">Sair</a>
        <?php
            }
        ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../js/functions.js"></script>
</html>