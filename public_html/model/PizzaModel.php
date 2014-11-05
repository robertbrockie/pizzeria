<?php

  include_once("lib/Database.php");
  include_once("model/Pizza.php");

  class PizzaModel {

      public $db;

      public function __construct() {
          $this->db = new Database();
          $this->db->connect();
      }

      public function __destruct() {
          $this->db->disconnect();
      }

      /**
      * loadFromRow
      *
      * Load object from database row.
      **/
      public function loadFromRow($row) {

        $pizza = new Pizza();
        $pizza->setId($row['id']);
        $pizza->setCustomerId($row['customer_id']);
        $pizza->setTopping1($row['topping1']);
        $pizza->setTopping2($row['topping2']);
        $pizza->setTopping3($row['topping3']);
        $pizza->setOrdered($row['ordered']);

        return $pizza;
      }

      /**
      *   getById
      *
      *   Get a pizza by id
      **/
      public function getById($id) {
          $query = sprintf("SELECT * FROM pizza WHERE id='%d'", $id);
          $result = $this->db->query($query);

          $row = mysql_fetch_assoc($result);

          return $this->loadFromRow($row);
      }

      /**
      *   deleteById
      *
      *   Delete a pizza.
      **/
      public function deleteById($id) {
          $query = sprintf("DELETE FROM pizza WHERE id='%d'", $id);
          $result = $this->db->query($query);
      }

      /**
      *   getAll
      *
      *   Get all orders.
      **/
      public function getAll() {
          $query = sprintf("SELECT * FROM pizza");

          $result = $this->db->query($query);

          $pizzas = array();
          while ($row = mysql_fetch_assoc($result)) {
              $pizzas[] = $this->loadFromRow($row);
          }

          return $pizzas;
      }

      /**
      *   save
      *
      *   Save a new pizza order.
      **/
      public function save($pizza) {
          $query = sprintf("INSERT INTO pizza (customer_id, topping1, topping2, topping3) VALUES ('%d', '%d', '%d', '%d')",
              mysql_real_escape_string($pizza->getCustomerId()),
              mysql_real_escape_string($pizza->getTopping1()),
              mysql_real_escape_string($pizza->getTopping2()),
              mysql_real_escape_string($pizza->getTopping3()));

          $id = $this->db->insert($query);

          $pizza->setId($id);

          return $pizza;

      }

      /**
      *   update
      *
      *   Update pizza order.
      **/
      public function update($pizza) {
          $query = sprintf("UPDATE pizza SET customer_id='%d', topping1='%d', topping2='%d', topping3='%d' WHERE id='%d'",
              mysql_real_escape_string($pizza->getCustomerId()),
              mysql_real_escape_string($pizza->getPhone()),
              mysql_real_escape_string($pizza->getAddress()),
              mysql_real_escape_string($pizza->getId()));

          $result = $this->db->query($query);

          return $pizza;
      }
  }
