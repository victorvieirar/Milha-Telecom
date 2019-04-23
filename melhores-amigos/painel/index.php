<?php

require_once ('../../php/config/database.php');
require_once ('../../php/controllers/plans.php');
require_once ('../../php/controllers/cities.php');
require_once ('../../php/controllers/options.php');
require_once ('../../php/controllers/friends.php');

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Milha Telecom</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="../../css/fonts.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../../css/styles.css">
        <link rel="stylesheet" type="text/css" media="screen" href="../../css/admin.styles.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        <?php
            if(!isset($_SESSION['admin'])) {
                session_destroy();
        ?>
            <div id="login">
                <h2 class="blue bold uppercase">Toolsnet</h2>
                <form action="../../php/operations/auth-melhores.php" method="post">
                    <input type="text" name="user" id="user" placeholder="Usuário">
                    <input type="password" name="password" id="password" placeholder="Senha">
                    <button type="submit" class="white bold uppercase" name="login">Entrar</button>
                </form>
            </div>
        <?php
            } else {
        ?>
            <div id="main">
                <h2 class="blue bold uppercase">Melhores-Amigos - Toolsnet</h2><br>
                <h4 class="green bold uppercase">Lista de Inscritos</h4>
                <table>
                    <thead>
                        <tr class="blue uppercase">
                            <td class="bold">CPF</td>
                            <td class="bold">Cód</td>
                            <td class="bold">Nome do Amigo</td>
                            <td class="bold">Telefone do Amigo</td>
                            <td class="bold">Status</td>
                            <td class="bold">Ações</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $friends = getFriends($conn);
                        foreach ($friends as $friend) {
                            $statusText = '';
                            $statusColor = '';
                            switch($friend['status']) {
                                case 0:
                                $statusText = "aguardando";
                                $statusColor = '#ffcc00';
                                break;
                                case 1:
                                $statusText = "confirmado";
                                $statusColor = '#00dd33';
                                break;
                                case 2:
                                $statusText = "negado";
                                $statusColor = '#ee0000';
                                break;
                            }
                        ?>
                        <tr>
                            <td><?php echo $friend['cpf']; ?></td>
                            <td><?php echo $friend['cod']; ?></td>
                            <td><?php echo $friend['name']; ?></td>
                            <td><?php echo $friend['phone']; ?></td>
                            <td style="text-transform: capitalize;"><i class="fas fa-circle" style="color: <?php echo $statusColor; ?>"></i> <?php echo $statusText; ?></td>
                            <td class="action-friend" data-id="<?php echo $friend['cpf']; ?>"><i class="fas fa-check"></i> <i class="fas fa-times"></i> <i class="fas fa-trash"></i></td>
                        </tr>
                        <?php
                        }                        
                        ?>
                    </tbody>
                </table>

            <a href="../../php/operations/logout.php" id="logout-button" class="button red">Sair</a>
        <?php
            }
        ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../functions.js"></script>
</html>