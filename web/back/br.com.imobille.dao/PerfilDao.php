<?php
    class PerfilDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        private function getByNomeOuEmail($nomeOuEmail) {
            try {
                $connection = $this->conn;
                if($connection != null) {
                    $statement = $connection->prepare('SELECT * FROM perfil WHERE nome = :nome or email = :email');
                    $statement->bindParam(':nome',$nomeOuEmail);
                    $statement->bindParam(':email',$nomeOuEmail);
                    $statement->execute();
                    $statement->setFetchMode(PDO::FETCH_CLASS, 'Perfil');
                    $found = $statement->fetch();
                    return $found;
                }
                else {
                    return $this->message;
                }
            } catch(Exception $e) {
                $mensagem = $this->message;
                $mensagem->setMessage('Error: '.$e->getMessage());
                $mensagem->setStatus(ResponseMessage::STATUS_ERROR);
                return $mensagem;
            }
        }

        public function authenticate($login, $password) {
            $perfil = $this->getByNomeOuEmail($login);
            if($perfil != false && get_class($perfil) != 'ResponseMessage') {
                if($perfil != null && $perfil->getSenha() == $password) {
                    $perfil->setSenha('<secret>');
                }
                else {
                    $perfil = null;
                }
            }
            
            return $perfil;
        }

        public function createPerfil($perfil) {
            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $perfil->setCriadoEm($now);
            $perfil->setAtualizadoEm($now);
            $perfil->setUltimoAcesso($now);
            
            return parent::persist($perfil);
        }

        public function updatePerfil($perfil) {
            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $perfil->setAtualizadoEm($now);
            
            return parent::update($perfil);
        }

        public function deletePerfil($perfil) {
            return parent::delete($perfil);
        }
    }
?>