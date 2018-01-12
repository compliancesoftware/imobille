<?php
    class Imovel {
        private $id = 0;
        private $disponivel = false;
        private $progresso = null;
        private $quartosComSuite = 0;
        private $quartosSemSuite = 0;
        private $tipo = 'Apartamento'; // pode ser 'Casa', 'Apartamento', 'Galpão', 'Armazém', 'Ponto Comercial'
		private $modelo = 'Novo';// pode ser 'Novo', 'Usado', 'Aluguel'
		private $captadoEm = '';
        private $criadoEm = '';
        private $descricao = '';
		private $salasDeJantar = 0;
        private $andares = 0;
        private $categoriaDeAndares = '';// pode ser 'Normal','Duplex' ou 'Trilex'
        private $temVaranda = false;
        private $temHomeOffice = false;
        private $area = 0.00;
        private $areaUtil = 0.00;
        private $salasDeEstar = 0;
        private $numero = '';
        private $vagasDeEstacionamento = 0;
        private $banheirosSociais = 0;
        private $posicaoDoSol = '';// pode ser 'Nascente' ou 'Poente'
        private $atualizadoEm = '';
        private $preco = 0.00;
        private $construcao = null;
        private $captadoPor = null;
        private $criadoPor = null;
        private $atualizadoPor = null;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getDisponivel() {
			return $this->disponivel;
		}
		public function setDisponivel($disponivel) {
			$this->disponivel = $disponivel;
		}
		public function getProgresso() {
			return $this->progresso;
		}
		public function setProgresso($progresso) {
			$this->progresso = $progresso;
		}
		public function getQuartosComSuite() {
			return $this->quartosComSuite;
		}
		public function setQuartosComSuite($quartosComSuite) {
			$this->quartosComSuite = $quartosComSuite;
		}
		public function getQuartosSemSuite() {
			return $this->quartosSemSuite;
		}
		public function setQuartosSemSuite($quartosSemSuite) {
			$this->quartosSemSuite = $quartosSemSuite;
		}
		public function getTipo() {
			return $this->tipo;
		}
		public function setTipo($tipo) {
			$this->tipo = $tipo;
		}
		public function getModelo() {
			return $this->modelo;
		}
		public function setModelo($modelo) {
			$this->modelo = $modelo;
		}
		public function getCaptadoEm() {
			return $this->captadoEm;
		}
		public function setCaptadoEm($captadoEm) {
			$this->captadoEm = $captadoEm;
		}
		public function getCriadoEm() {
			return $this->criadoEm;
		}
		public function setCriadoEm($criadoEm) {
			$this->criadoEm = $criadoEm;
		}
		public function getDescricao() {
			return $this->descricao;
		}
		public function setDescricao($descricao) {
			$this->descricao = $descricao;
		}
		public function getSalasDeJantar() {
			return $this->salasDeJantar;
		}
		public function setSalasDeJantar($salasDeJantar) {
			$this->salasDeJantar = $salasDeJantar;
		}
		public function getAndares() {
			return $this->andares;
		}
		public function setAndares($andares) {
			$this->andares = $andares;
		}
		public function getCategoriaDeAndares() {
			return $this->categoriaDeAndares;
		}
		public function setCategoriaDeAndares($categoriaDeAndares) {
			$this->categoriaDeAndares = $categoriaDeAndares;
		}
		public function getTemVaranda() {
			return $this->temVaranda;
		}
		public function setTemVaranda($temVaranda) {
			$this->temVaranda = $temVaranda;
		}
		public function getTemHomeOffice() {
			return $this->temHomeOffice;
		}
		public function setTemHomeOffice($temHomeOffice) {
			$this->temHomeOffice = $temHomeOffice;
		}
		public function getArea() {
			return $this->area;
		}
		public function setArea($area) {
			$this->area = $area;
		}
		public function getAreaUtil() {
			return $this->areaUtil;
		}
		public function setAreaUtil($areaUtil) {
			$this->areaUtil = $areaUtil;
		}
		public function getSalasDeEstar() {
			return $this->salasDeEstar;
		}
		public function setSalasDeEstar($salasDeEstar) {
			$this->salasDeEstar = $salasDeEstar;
		}
		public function getNumero() {
			return $this->numero;
		}
		public function setNumero($numero) {
			$this->numero = $numero;
		}
		public function getVagasDeEstacionamento() {
			return $this->vagasDeEstacionamento;
		}
		public function setVagasDeEstacionamento($vagasDeEstacionamento) {
			$this->vagasDeEstacionamento = $vagasDeEstacionamento;
		}
		public function getBanheirosSociais() {
			return $this->banheirosSociais;
		}
		public function setBanheirosSociais($banheirosSociais) {
			$this->banheirosSociais = $banheirosSociais;
		}
		public function getPosicaoDoSol() {
			return $this->posicaoDoSol;
		}
		public function setPosicaoDoSol($posicaoDoSol) {
			$this->posicaoDoSol = $posicaoDoSol;
		}
		public function getAtualizadoEm() {
			return $this->atualizadoEm;
		}
		public function setAtualizadoEm($atualizadoEm) {
			$this->atualizadoEm = $atualizadoEm;
		}
		public function getPreco() {
			return $this->preco;
		}
		public function setPreco($preco) {
			$this->preco = $preco;
		}
		public function getConstrucao() {
			return $this->construcao;
		}
		public function setConstrucao($construcao) {
			$this->construcao = $construcao;
		}
		public function getCaptadoPor() {
			return $this->captadoPor;
		}
		public function setCaptadoPor($captadoPor) {
			$this->captadoPor = $captadoPor;
		}
		public function getCriadoPor() {
			return $this->criadoPor;
		}
		public function setCriadoPor($criadoPor) {
			$this->criadoPor = $criadoPor;
		}
		public function getAtualizadoPor() {
			return $this->atualizadoPor;
		}
		public function setAtualizadoPor($atualizadoPor) {
			$this->atualizadoPor = $atualizadoPor;
		}
        
        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
			}, $str);
			
			if($this->construcao != null) {
				$str = str_replace('"construcao":{}','"construcao":'.$this->construcao->serialize(),$str);
			}
			if($this->criadoPor != null) {
				$str = str_replace('"criadoPor":{}','"criadoPor":'.$this->criadoPor->serialize(),$str);
			}
			if($this->atualizadoPor != null) {
				$str = str_replace('"atualizadoPor":{}','"atualizadoPor":'.$this->atualizadoPor->serialize(),$str);
			}

            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'construcao';
        }
    }
?>
