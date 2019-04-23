<?php

require_once ('../config/database.php');
require_once ('../controllers/cities.php');

if(isset($_POST['add'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';


    if(empty($name) || empty($state)) {
        session_start();
        $_SESSION['msg'] = "Dados inválidos. Por favor, insira os dados corretamente.";
    } else {
        if(addCity($name, $state, $conn)) {
            $_SESSION['msg'] = 'Cidade adicionada com sucesso!';
        } else {
            $_SESSION['msg'] = 'Falha ao adicionar cidade, tente novamente!';
        }
    }

    header('location: ../../painel');
} else {
    header('location: ../../');
}

?>