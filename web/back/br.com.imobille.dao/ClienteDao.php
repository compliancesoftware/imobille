<?php
    class ClienteDao extends Dao{
        public function __construct() {
            parent::__construct();
        }

        public function retrieveClientes($filtro) {
            $cliente = new Cliente();
            $clientes = parent::retrieve($cliente);

            $response = array();

            

            return $response;
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
            $perfilParaAtualizar = parent::getById($perfil->getId(), $perfil);

            $perfilParaAtualizar->setNome($perfil->getNome());
            if($perfil->getSenha() != '<secret>') {
                $perfilParaAtualizar->setSenha($perfil->getSenha());
            }
            
            $perfilParaAtualizar->setEmail($perfil->getEmail());
            $perfilParaAtualizar->setTelefone($perfil->getTelefone());
            $perfilParaAtualizar->setFoto($perfil->getFoto());
            $perfilParaAtualizar->setPermissao($perfil->getPermissao());

            $dateTime = new DateTime();
            $now = $dateTime->format('Y-m-d H:i:s');
            $perfilParaAtualizar->setAtualizadoEm($now);
            
            return parent::update($perfilParaAtualizar);
        }
    }
?>