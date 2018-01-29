<?php
    session_start();
    
    class ClassLoader {
        public static function load() {
            require '../../../back/br.com.imobille.models/Preferencias.php';
            require '../../../back/br.com.imobille.models/Perfil.php';
            require '../../../back/br.com.imobille.models/Endereco.php';
            require '../../../back/br.com.imobille.models/Construtora.php';
            require '../../../back/br.com.imobille.models/Construcao.php';
            require '../../../back/br.com.imobille.models/Imovel.php';
            require '../../../back/br.com.imobille.models/Cliente.php';
        
            require '../../../back/br.com.imobille.dao.utils/Jsonify.php';
            require '../../../back/br.com.imobille.dao.utils/ResponseMessage.php';
            require '../../../back/br.com.imobille.dao.utils/Dao.php';

            require '../../../back/br.com.imobille.dao/PreferenciasDao.php';
            require '../../../back/br.com.imobille.dao/PerfilDao.php';
            require '../../../back/br.com.imobille.dao/ClienteDao.php';
        
            require '../../../back/br.com.imobille.services/PreferenciasService.php';
            require '../../../back/br.com.imobille.services/PerfilService.php';
            require '../../../back/br.com.imobille.services/ClienteService.php';
        }
    }
?>