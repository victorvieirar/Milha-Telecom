<?php

function addFriend($cpf, $cod, $name, $friends_phone, $conn) {
    $sql = "INSERT INTO best_friends VALUES (:cpf, :cod, :name, :phone, default)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(":cpf", $cpf);
    $stmt->bindValue(":cod", $cod);
    $stmt->bindValue(":name", $name);
    $stmt->bindValue(":phone", $friends_phone);

    return $stmt->execute();
}

function getFriends($conn) {
    $sql = "SELECT * FROM best_friends";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

?>