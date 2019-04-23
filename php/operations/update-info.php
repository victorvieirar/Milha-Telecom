<?php

require_once ('../config/database.php');
require_once ('../controllers/options.php');

if(isset($_POST['update'])) {
    $enterprise = isset($_POST['enterprise']) ? $_POST['enterprise'] : '';
    $about = isset($_POST['about']) ? $_POST['about'] : '';
    $fiber = isset($_POST['fiber']) ? $_POST['fiber'] : '';
    $velocity = isset($_POST['velocity']) ? $_POST['velocity'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $instagram = isset($_POST['instagram']) ? $_POST['instagram'] : '';
    $facebook = isset($_POST['facebook']) ? $_POST['facebook'] : '';

    $options = array('enterprise' => $enterprise, 'about' => $about, 'fiber' => $fiber, 'velocity' => $velocity, 'phone' => $phone, 'instagram' => $instagram, 'facebook' => $facebook);

    $success = TRUE;
    foreach ($options as $tag => $value) {
        $success = $success && updateOption($tag, $value, $conn);
    }

    if($success) {
        $_SESSION['msg'] = 'Dados atualizados com sucesso!';
    } else {
        $_SESSION['msg'] = 'Falha ao atualizar um ou mais dados, tente novamente!';
    }

    header('location: ../../painel');
} else {
    header('location: ../../');
}

?>