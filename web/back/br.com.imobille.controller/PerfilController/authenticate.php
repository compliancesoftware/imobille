<?php
    require('../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PerfilService();

    $login = $_POST['login'];
    $password = $_POST['senha'];

    $response = $service->authenticate($login, $password);

    echo $response;
?>