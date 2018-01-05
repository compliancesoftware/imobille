<?php
    session_start();
    
    class ClassLoader {
        public static function load() {
            require '../../../back/br.com.imobille.models/Perfil.php';
        
            require '../../../back/br.com.imobille.dao.utils/Jsonify.php';
            require '../../../back/br.com.imobille.dao.utils/ResponseMessage.php';
            require '../../../back/br.com.imobille.dao.utils/Dao.php';

            require '../../../back/br.com.imobille.dao/PerfilDao.php';
        
            require '../../../back/br.com.imobille.services/PerfilService.php';
        }
    }
?>