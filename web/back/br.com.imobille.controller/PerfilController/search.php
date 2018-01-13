<?php
    require('../../classloader.php');
    
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PerfilService();

    $nome = $_GET['nome'];

    $response = $service->search($nome);
    
    echo $response;
?>