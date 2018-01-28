<?php
    require('../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PerfilService();

    $perfil = new Perfil();

    $perfil->setNome($_POST['conta']['nome']);
    $perfil->setSenha($_POST['conta']['senha']);
    $perfil->setEmail($_POST['conta']['email']);
    $perfil->setTelefone($_POST['conta']['telefone']);
    $perfil->setFoto($_POST['conta']['foto']);
    $perfil->setPermissao($_POST['conta']['permissao']);

    echo $service->createPerfil($perfil);
?>