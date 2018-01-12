<?php
    class Endereco {
        private $id = 0;
        private $endereco = '';
        private $bairro = '';
        private $cidade = '';
        private $estado = '';
        private $complemento = '';
        private $numero = '';
		private $cep = '';
		private $latitude = '';
		private $longitude = '';
        private $criadoEm = '';
        private $criadoPor = null;
        private $atualizadoEm = '';
		private $atualizadoPor = null;

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getEndereco() {
			return $this->endereco;
		}
		public function setEndereco($endereco) {
			$this->endereco = $endereco;
		}
		public function getBairro() {
			return $this->bairro;
		}
		public function setBairro($bairro) {
			$this->bairro = $bairro;
		}
		public function getCidade() {
			return $this->cidade;
		}
		public function setCidade($cidade) {
			$this->cidade = $cidade;
		}
		public function getEstado() {
			return $this->estado;
		}
		public function setEstado($estado) {
			$this->estado = $estado;
		}
		public function getComplemento() {
			return $this->complemento;
		}
		public function setComplemento($complemento) {
			$this->complemento = $complemento;
		}
		public function getNumero() {
			return $this->numero;
		}
		public function setNumero($numero) {
			$this->numero = $numero;
		}
		public function getCep() {
			return $this->cep;
		}
		public function setCep($cep) {
			$this->cep = $cep;
		}
		public function getLatitude() {
			return $this->latitude;
		}
		public function setLatitude($latitude) {
			$this->latitude = $latitude;
		}
		public function getLongitude() {
			return $this->longitude;
		}
		public function setLongitude($longitude) {
			$this->longitude = $longitude;
		}
		public function getCriadoEm() {
			return $this->criadoEm;
		}
		public function setCriadoEm($criadoEm) {
			$this->criadoEm = $criadoEm;
		}
		public function getCriadoPor() {
			return $this->criadoPor;
		}
		public function setCriadoPor($criadoPor) {
			$this->criadoPor = $criadoPor;
		}
		public function getAtualizadoEm() {
			return $this->atualizadoEm;
		}
		public function setAtualizadoEm($atualizadoEm) {
			$this->atualizadoEm = $atualizadoEm;
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
			
			if($this->criadoPor != null) {
				$str = str_replace('"criadoPor":{}','"criadoPor":'.$this->criadoPor->serialize(),$str);
			}
			if($this->atualizadoPor!= null) {
				$str = str_replace('"atualizadoPor":{}','"atualizadoPor":'.$this->atualizadoPor->serialize(),$str);
			}

            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'endereco';
        }
    }
?>
