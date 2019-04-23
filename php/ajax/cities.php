<?php

require_once '../config/database.php';

session_start();

if(!isset($_SESSION['admin'])) {
    session_destroy();

    echo json_encode(array('success' => false));
    exit;
}

if(isset($_POST['delete'])) {
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    
    if(empty($id)) {
        echo json_encode(array('success' => false));
        exit;
    } else {
        $sql = 'DELETE FROM plans WHERE id = :id';
        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id);
        $success = $stmt->execute();

        echo json_encode(array('success' => $success));
        exit;
    }
}

?>