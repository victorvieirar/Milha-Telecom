<?php

function updateOption($tag, $value, $conn) {
    $sql = "UPDATE fields SET value = :value WHERE tag = :tag";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':value', $value);
    $stmt->bindValue(':tag', $tag);

    return $stmt->execute();
}

function getOption($tag, $conn) {
    $sql = "SELECT * FROM fields WHERE tag = :tag";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':tag', $tag);
    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetch();
}

?>