<?php

	/**
	*	Pizza
	*
	*	Simple customer Pizza.
	**/
	class Pizza {

		private $id = 0;
		private $customer_id = 0;
		private $topping1 = 0;
		private $topping2 = 0;
		private $topping3 = 0;
		private $ordered = '';

		public function getId() {
			return $this->id;
		}

		public function setId($val) {
			$this->id = $val;
		}

		public function getCustomerId() {
			return $this->customer_id;
		}

		public function setCustomerId($val) {
			$this->customer_id = $val;
		}

		public function getTopping1() {
			return $this->topping1;
		}

		public function setTopping1($val) {
			$this->topping1 = $val;
		}

		public function getTopping2() {
			return $this->topping2;
		}

		public function setTopping2($val) {
			$this->topping2 = $val;
		}

		public function getTopping3() {
			return $this->topping3;
		}

		public function setTopping3($val) {
			$this->topping3 = $val;
		}

		public function getOrdered() {
			return $this->ordered;
		}

		public function setOrdered($val) {
			$this->ordered = $val;
		}
	}
