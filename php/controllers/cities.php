<?php

function addCity($name, $state, $conn) {
    $sql = "INSERT INTO cities VALUES (default, :name, :state)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':state', $state);
    
    return $stmt->execute();
}

function getCities($conn) {
    $sql = "SELECT * FROM cities";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}

?>