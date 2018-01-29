<?php
    class Cliente {
		private $id = null;
		private $perfil = null;

		//Filtro de pesquisa
		private $ficaProntoAte = null;
        private $temAcessibilidade = false;
        private $elevadoresDeServico = 0;
        private $elevadoresSociais = 0;
        private $iniciaObrasEm = '';
        private $enderecoImovel = '';
		private $construtora = '';
        private $quartosComSuite = 0;
        private $quartosSemSuite = 0;
        private $tipoImovel = ''; // pode ser 'Casa', 'Apartamento', 'Galpão', 'Armazém', 'Ponto Comercial'
		private $modeloImovel = '';// pode ser 'Novo', 'Usado', 'Aluguel'
		private $salasDeJantar = 0;
        private $andares = 0;
        private $categoriaDeAndares = '';// pode ser 'Normal','Duplex' ou 'Trilex'
        private $temVaranda = false;
        private $temHomeOffice = false;
        private $areaUtil = 0.00;
        private $salasDeEstar = 0;
        private $vagasDeEstacionamento = 0;
        private $banheirosSociais = 0;
        private $posicaoDoSol = '';// pode ser 'Nascente' ou 'Poente'
        private $preco = 0.00;
		
        private $podeReceberNotificacoes = true;
        private $endereco = null;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getPerfil() {
			return $this->perfil;
		}
		public function setPerfil($perfil) {
			$this->perfil = $perfil;
		}
		public function getUltimaProcura() {
			return $this->ultimaProcura;
		}
		public function setUltimaProcura($ultimaProcura) {
			$this->ultimaProcura = $ultimaProcura;
		}
		public function getPodeReceberNotificacoes() {
			return $this->podeReceberNotificacoes;
		}
		public function setPodeReceberNotificacoes($podeReceberNotificacoes) {
			$this->podeReceberNotificacoes = $podeReceberNotificacoes;
		}
		public function getEndereco() {
			return $this->endereco;
		}
		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}

        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);

            if($this->perfil != null) {
				$str = str_replace('"perfil":{}','"perfil":'.$this->perfil->serialize(),$str);
            }
            
            if($this->ultimaProcura != null) {
				$str = str_replace('"ultimaProcura":{}','"ultimaProcura":'.$this->ultimaProcura->serialize(),$str);
            }
            
            if($this->endereco != null) {
				$str = str_replace('"endereco":{}','"endereco":'.$this->endereco->serialize(),$str);
			}

            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'cliente';
        }
    }
?>
