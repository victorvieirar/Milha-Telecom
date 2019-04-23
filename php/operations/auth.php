<?php

require_once ('../config/database.php');
require_once ('../controllers/admin.php');

if(isset($_POST['login'])) {
    $user = isset($_POST['user']) ? $_POST['user'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    if(empty($user) || empty($password)) {
        session_start();
        $_SESSION['msg'] = "Dados inválidos. Por favor, insira os dados corretamente.";
    } else {
        $admin = getAdmin($user, $password, $conn);
        
        session_start();
        if($admin) {
            $_SESSION['admin'] = $admin;
        } else {
            $_SESSION['msg'] = "Usuário/Senha incorretos. Por favor, tente novamente.";
        }
    }

    header('location: ../../painel');
} else {
    header('location: ../../');
}

?>