<?php

require_once '../config/database.php';
require_once '../controllers/friends.php';

session_start();

if(!isset($_SESSION['admin'])) {
    session_destroy();

    echo json_encode(array('success' => false));
    exit;
}

if(isset($_POST['delete'])) {
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    
    if(empty($cpf)) {
        echo json_encode(array('success' => false));
        exit;
    } else {
        $sql = 'DELETE FROM best_friends WHERE cpf = :cpf';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':cpf', $cpf);
        $success = $stmt->execute();

        echo json_encode(array('success' => $success));
        exit;
    }
} elseif(isset($_POST['approve'])) {
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    
    if(empty($cpf)) {
        echo json_encode(array('success' => false));
        exit;
    } else {
        $sql = 'UPDATE best_friends SET status = 1 WHERE cpf = :cpf';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':cpf', $cpf);
        $success = $stmt->execute();

        echo json_encode(array('success' => $success));
        exit;
    }
} elseif(isset($_POST['negate'])) {
    $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    
    if(empty($cpf)) {
        echo json_encode(array('success' => false));
        exit;
    } else {
        $sql = 'UPDATE best_friends SET status = 2 WHERE cpf = :cpf';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':cpf', $cpf);
        $success = $stmt->execute();

        echo json_encode(array('success' => $success));
        exit;
    }
}

?>