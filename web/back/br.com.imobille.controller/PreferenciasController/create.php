<?php
    require('../../classloader.php');
    header('Content-type: application/json; charset=UTF-8');

    ClassLoader::load();
    
    // $service = new PreferenciasService();

    // $preferencias = new Preferencias();

    // $preferencias->setNome('Imobille Site');
    // $preferencias->setCpfCnpj('08468331406');
    // $logo = base64_encode(file_get_contents('logo.jpg'));
    // $preferencias->setLogo($logo);
    // $preferencias->setEmail('douglasf.filho@gmail.com');
    // $preferencias->setTelefone1('81996729491');
    // $preferencias->setTelefone2('81988874815');
    // $preferencias->setBlog('');
    // $preferencias->setWhatsapp('81988874815');
    // $preferencias->setInstagram('douglas.fernandes.filho');
    // $preferencias->setTwitter('FilhoEu');
    // $preferencias->setFacebook('Douglas.Fernandes.da.Silva.Filho');
    // $preferencias->setSobre('Empresa renomada do ramo imobiliário com mais de 25 anos de mercado.');

    // echo $service->createPreferencias($preferencias);

    echo '{"message":"Service Unavailable","status":"Erro"}';
?>