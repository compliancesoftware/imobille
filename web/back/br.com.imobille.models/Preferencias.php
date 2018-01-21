<?php
    class Preferencias {
        private $id = null;
        private $nome = '';
        private $cpfCnpj = '';
        private $logo = '';
        private $email = '';
        private $telefone1 = '';
        private $telefone2 = '';
        private $blog = '';
        private $whatsapp = '';
        private $instagram = '';
        private $twitter = '';
        private $facebook = '';
        private $sobre = '';

		public function getId() {
			return $this->id;
		}
		public function setId($id) {
			$this->id = $id;
		}
		public function getNome() {
			return $this->nome;
		}
		public function setNome($nome) {
			$this->nome = $nome;
		}
		public function getCpfCnpj() {
			return $this->cpfCnpj;
		}
		public function setCpfCnpj($cpfCnpj) {
			$this->cpfCnpj = $cpfCnpj;
		}
		public function getLogo() {
			return $this->logo;
		}
		public function setLogo($logo) {
			$this->logo = $logo;
		}
		public function getEmail() {
			return $this->email;
		}
		public function setEmail($email) {
			$this->email = $email;
		}
		public function getTelefone1() {
			return $this->telefone1;
		}
		public function setTelefone1($telefone1) {
			$this->telefone1 = $telefone1;
		}
		public function getTelefone2() {
			return $this->telefone2;
		}
		public function setTelefone2($telefone2) {
			$this->telefone2 = $telefone2;
		}
		public function getBlog() {
			return $this->blog;
		}
		public function setBlog($blog) {
			$this->blog = $blog;
		}
		public function getWhatsapp() {
			return $this->whatsapp;
		}
		public function setWhatsapp($whatsapp) {
			$this->whatsapp = $whatsapp;
		}
		public function getInstagram() {
			return $this->instagram;
		}
		public function setInstagram($instagram) {
			$this->instagram = $instagram;
		}
		public function getTwitter() {
			return $this->twitter;
		}
		public function setTwitter($twitter) {
			$this->twitter = $twitter;
		}
		public function getFacebook() {
			return $this->facebook;
		}
		public function setFacebook($facebook) {
			$this->facebook = $facebook;
		}
		public function getSobre() {
			return $this->sobre;
		}
		public function setSobre($sobre) {
			$this->sobre = $sobre;
		}

        public function serialize() {
            $str = json_encode($this->read());
            $str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
                return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
            }, $str);
            return $str;
        }

        public function read() {
            return get_object_vars($this);
        }

        public function entityName() {
            return 'preferencias';
        }
    }
?>
