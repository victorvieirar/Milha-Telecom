<<?php

function addCityPlan($city, $plan, $conn) {
    $sql = "INSERT INTO cities_plans VALUES (:city, :plan)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':city', $city);
    $stmt->bindValue(':plan', $plan);
    
    return $stmt->execute();
}

?>