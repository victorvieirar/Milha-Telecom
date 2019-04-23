<?php

function getAdmin($user, $password, $conn) {
    $sql = "SELECT * FROM admin WHERE user = :user AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':user', $user);
    $stmt->bindValue(':password', $password);

    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    return $stmt->fetch();
}

?>