<?php
    require('../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    $service = new PreferenciasService();

    $preferencias = new Preferencias();

    $preferencias->setId($_POST['preferencias']['id']);
    $preferencias->setNome($_POST['preferencias']['nome']);
    $preferencias->setCpfCnpj($_POST['preferencias']['cpfCnpj']);
    $preferencias->setLogo($_POST['preferencias']['logo']);
    $preferencias->setCapa($_POST['preferencias']['capa']);
    $preferencias->setEmail($_POST['preferencias']['email']);
    $preferencias->setTelefone1($_POST['preferencias']['telefone1']);
    $preferencias->setTelefone2($_POST['preferencias']['telefone2']);
    $preferencias->setBlog($_POST['preferencias']['blog']);
    $preferencias->setWhatsapp($_POST['preferencias']['whatsapp']);
    $preferencias->setInstagram($_POST['preferencias']['instagram']);
    $preferencias->setTwitter($_POST['preferencias']['twitter']);
    $preferencias->setFacebook($_POST['preferencias']['facebook']);
    $preferencias->setSobre($_POST['preferencias']['sobre']);

    echo $service->updatePreferencias($preferencias);
?>