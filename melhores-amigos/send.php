<?php

require_once "../php/config/database.php";
require_once "../php/controllers/friends.php";

if(isset($_POST['send'])) {

    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : "";
    $cod = isset($_POST['cod']) ? $_POST['cod'] : "";
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $friends_phone = isset($_POST['phone']) ? $_POST['phone'] : "";

    if(empty($name) || empty($cod) || empty($cpf) || empty($friends_phone)) {
        session_start();
        $_SESSION['err'] = TRUE;
        header('location: ./');
    } else {
        session_start();
        $_SESSION['sended'] = addFriend($cpf, $cod, $name, $friends_phone, $conn);
        header('location: ./');
    }

}

?>