<?php
    class Construcao {
        private $id = 0;
        private $criadoEm = '';
        private $ficaProntoEm = '';
        private $temAcessibilidade = false;
        private $nome = '';
        private $capa = '';
        private $elevadoresDeServico = 0;
        private $elevadoresSociais = 0;
        private $iniciaObrasEm = '';
        private $atualizadoEm = '';
        private $endereco = null;
		private $construtora = null;
		private $anunciarLancamento = false;
        private $criadoPor = null;
		private $atualizadoPor = null;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getCriadoEm() {
			return $this->criadoEm;
		}
		public function setCriadoEm($criadoEm) {
			$this->criadoEm = $criadoEm;
		}
		public function getFicaProntoEm() {
			return $this->ficaProntoEm;
		}
		public function setFicaProntoEm($ficaProntoEm) {
			$this->ficaProntoEm = $ficaProntoEm;
		}
		public function getTemAcessibilidade() {
			return $this->temAcessibilidade;
		}
		public function setTemAcessibilidade($temAcessibilidade) {
			$this->temAcessibilidade = $temAcessibilidade;
		}
		public function getNome() {
			return $this->nome;
		}
		public function setNome($nome) {
			$this->nome = $nome;
		}
		public function getCapa() {
			return $this->capa;
		}
		public function setCapa($capa) {
			$this->capa = $capa;
		}
		public function getElevadoresDeServico() {
			return $this->elevadoresDeServico;
		}
		public function setElevadoresDeServico($elevadoresDeServico) {
			$this->elevadoresDeServico = $elevadoresDeServico;
		}
		public function getElevadoresSociais() {
			return $this->elevadoresSociais;
		}
		public function setElevadoresSociais($elevadoresSociais) {
			$this->elevadoresSociais = $elevadoresSociais;
		}
		public function getIniciaObrasEm() {
			return $this->iniciaObrasEm;
		}
		public function setIniciaObrasEm($iniciaObrasEm) {
			$this->iniciaObrasEm = $iniciaObrasEm;
		}
		public function getAtualizadoEm() {
			return $this->atualizadoEm;
		}
		public function setAtualizadoEm($atualizadoEm) {
			$this->atualizadoEm = $atualizadoEm;
		}
		public function getEndereco() {
			return $this->endereco;
		}
		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}
		public function getConstrutora() {
			return $this->construtora;
		}
		public function setConstrutora($construtora) {
			$this->construtora = $construtora;
		}
		public function getAnunciarLancamento() {
			return $this->anunciarLancamento;
		}
		public function setAnunciarLancamento($anunciarLancamento) {
			$this->anunciarLancamento = $anunciarLancamento;
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
			$str = str_replace('"endereco":{}','"endereco":'.$this->endereco->serialize(),$str);
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
