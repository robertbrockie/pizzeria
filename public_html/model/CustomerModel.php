<?php

include_once("lib/Database.php");
include_once("model/Customer.php");

class CustomerModel {

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

    $customer = new Customer();
    $customer->setId($row['id']);
    $customer->setName($row['name']);
    $customer->setPhone($row['phone']);
    $customer->setAddress($row['address']);

    return $customer;
  }

  /**
  *   getById
  *
  *   Get a customer by id
  **/
  public function getById($id) {
      $query = sprintf("SELECT * FROM customer WHERE id='%d'", $id);
      $result = $this->db->query($query);

      $row = mysql_fetch_assoc($result);

      return $this->loadFromRow($row);
  }

  /**
  *   getAll
  *
  *   Get all customers.
  **/
  public function getAll($field = "name", $order = "asc") {
      $query = sprintf("SELECT * FROM customer ORDER BY %s %s ",
                  mysql_real_escape_string($field),
                  mysql_real_escape_string($order));

      $result = $this->db->query($query);

      $customers = array();
      while ($row = mysql_fetch_assoc($result)) {
          $customers[] = $this->loadFromRow($row);
      }

      return $customers;
  }

  /**
  *   save
  *
  *   Save a new customer.
  **/
  public function save($customer) {
      $query = sprintf("INSERT INTO customer (name, phone, address) VALUES ('%s', '%s', '%s')",
          mysql_real_escape_string($customer->getName()),
          mysql_real_escape_string($customer->getPhone()),
          mysql_real_escape_string($customer->getAddress()));

      $id = $this->db->insert($query);

      $customer->setId($id);

      return $customer;
  }

  /**
  *   update
  *
  *   Update customer.
  **/
  public function update($customer) {
      $query = sprintf("UPDATE customer SET name='%s', phone='%s', address='%s' WHERE id='%s'",
          mysql_real_escape_string($customer->getName()),
          mysql_real_escape_string($customer->getPhone()),
          mysql_real_escape_string($customer->getAddress()),
          mysql_real_escape_string($customer->getId()));

      $result = $this->db->query($query);

      return $customer;
  }

  /**
  *   deleteById
  *
  *   Delete a customer.
  **/
  public function deleteById($id) {
      $query = sprintf("DELETE FROM customer WHERE id='%d'", $id);
      $result = $this->db->query($query);
  }
}
