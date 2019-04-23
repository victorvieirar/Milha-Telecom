<?php

function addPlan($name, $description, $price, $img, $conn)
{
    $sql = "INSERT INTO plans VALUES (default, :name, :description, :price, :img)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':description', $description);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':img', $img);

    $success = $stmt->execute();

    if ($success) {
        $plans = getPlans($conn);
        return end($plans);
    } else {
        return $success;
    }
}

function getPlans($conn)
{
    $sql = "SELECT * FROM plans";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
