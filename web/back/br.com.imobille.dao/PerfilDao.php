<?php
    class PerfilDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        public function retrievePerfis() {
            $perfil = new Perfil();
            return parent::retrieve($perfil);
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

        public function search($nomeOuEmail) {
            $perfil = $this->getByNomeOuEmail($nomeOuEmail);
            $perfil->setSenha('<secret>');

            return $perfil;
        }

        public function authenticate($login, $password) {
            $perfil = $this->getByNomeOuEmail($login);
            if($perfil != false && get_class($perfil) != 'ResponseMessage') {
                if($perfil != null && $perfil->getSenha() == $password) {
                    $dateTime = new DateTime();
                    $now = $dateTime->format('Y-m-d H:i:s');
                    $perfil->setUltimoAcesso($now);
                    $this->updatePerfil($perfil);
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
    }
?>