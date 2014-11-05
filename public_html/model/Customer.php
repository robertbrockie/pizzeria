<?php
	/**
	*	Customer
	*
	*	Simple customer object.
	**/
	class Customer {

		private $id = 0;
		private $name = '';
		private $phone = '';
		private $address = '';

		public function getId() {
			return $this->id;
		}

		public function setId($val) {
			$this->id = $val;
		}

		public function getName() {
			return $this->name;
		}

		public function setName($val) {
			$this->name = $val;
		}

		public function getPhone() {
			return $this->phone;
		}

		public function setPhone($val) {
			$this->phone = $val;
		}

		public function getAddress() {
			return $this->address;
		}

		public function setAddress($val) {
			$this->address = $val;
		}
	}
