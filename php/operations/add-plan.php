<?php

require_once ('../config/database.php');
require_once ('../controllers/plans.php');
require_once ('../controllers/cities_plans.php');

if(isset($_POST['add'])) {
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';

    $cities = isset($_POST['city']) ? $_POST['city'] : '';

    if(empty($name) || empty($description) || empty($price)) {
        session_start();
        $_SESSION['msg'] = "Dados inválidos. Por favor, insira os dados corretamente.";
    } else {
        $plan = addPlan($name, $description, $price, $conn);
        if($plan) {
            foreach($cities as $city) {
                addCityPlan($city, $plan['id'], $conn);
            }
            $_SESSION['msg'] = 'Plano adicionado com sucesso!';
        } else {
            $_SESSION['msg'] = 'Falha ao adicionar plano, tente novamente!';
        }
    }

    header('location: ../../painel');
} else {
    header('location: ../../');
}

?>