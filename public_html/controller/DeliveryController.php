<?php

include_once("lib/Validation.php");
include_once("model/CustomerModel.php");
include_once("model/PizzaModel.php");

class DeliveryController {
  public $customer_model;
  public $pizza_model;

  public function __construct() {
    $this->customer_model = new CustomerModel();
    $this->pizza_model = new PizzaModel();
  }

  /**
  * invoke
  *
  * Rudimentary "routing".
  **/
  public function invoke() {

    $vals = array_merge($_POST, $_GET);

    //what are we doing?
    $action = isset($vals['action']) ? $vals['action'] : "index";

    switch ($action) {
      case "index":
        $this->index();
        break;

      case "showCustomers":
        $this->showCustomers();
        break;

      case "newCustomer":
        $this->newCustomer();
        break;

      case "updateCustomer":
        $id = $vals['id'];
        $this->updateCustomer($id);
        break;

      case "deleteCustomer":
        $id = $vals['id'];
        $this->deleteCustomer($id);
        break;

      case "showDelivery":
        $id = $vals['id'];
        $this->showDelivery($id);
        break;

      case "showDeliveries":
        $this->showDeliveries();
        break;

      case "newDelivery":
        $this->newDelivery();
        break;

      case "deleteDelivery":
        $id = $vals['id'];
        $this->deleteDelivery($id);
        break;
    }
  }

  /**
  * index
  *
  * Display the application to the user.
  *
  **/
  public function index() {
    include("view/header.php");
    include("view/index.php");
    include("view/footer.php");
  }

  /**
  * newDelivery
  *
  * Create a new order for a pizza.
  **/
  public function newDelivery() {

    $customers = $this->customer_model->getAll();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $pizza = new Pizza();

      $validation = new Validation();
      $validation->required_field('customer_id', "Customer is required.");

      //validate the data
      $errors = $validation->run($_POST);

      if (count($errors) == 0) {

        $pizza->setCustomerId($_POST['customer_id']);
        $pizza->setTopping1($_POST['topping1']);
        $pizza->setTopping2($_POST['topping2']);
        $pizza->setTopping3($_POST['topping3']);

        $pizza = $this->pizza_model->save($pizza);

        $this->showDelivery($pizza->getId());

      } else {
        include("view/header.php");
        include("view/delivery_new.php");
        include("view/footer.php");
      }
    } else {
      include("view/header.php");
      include("view/delivery_new.php");
      include("view/footer.php");
    }
  }

  /**
  * showDelivery
  *
  * Show the details of a delivery.
  **/
  public function showDelivery($id) {

    $pizza = $this->pizza_model->getById($id);
    $customer = $this->customer_model->getById($pizza->getCustomerId());

    include("view/header.php");
    include("view/delivery_show.php");
    include("view/footer.php");
  }

  /**
  * showDeliveries
  *
  * Show the details of a delivery.
  **/
  public function showDeliveries() {

    $pizzas = $this->pizza_model->getAll($id);

    include("view/header.php");
    include("view/delivery_list.php");
    include("view/footer.php");
  }

  /**
  * deleteDelivery
  *
  * Delete a delivery.
  **/
  public function deleteDelivery($id) {

    $this->pizza_model->deleteById($id);

    $this->showDeliveries();
  }

  /**
  * showCustomers
  *
  * Show a list of pizzeria customers.
  **/
  public function showCustomers() {

    $customers = $this->customer_model->getAll();

    include("view/header.php");
    include("view/customer_list.php");
    include("view/footer.php");
  }

  /**
  * newCustomer
  *
  * Create a new customer.
  **/
  public function newCustomer() {

    $customer = new Customer();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $validation = new Validation();
      $validation->required_field('name', "Name is required.");
      $validation->required_field('phone', "Phone is required.");
      $validation->required_field('address', "Address is required.");

      //validate the data
      $errors = $validation->run($_POST);

      if (count($errors) == 0) {
        $customer->setName($_POST['name']);
        $customer->setPhone($_POST['phone']);
        $customer->setAddress($_POST['address']);

        $customer = $this->customer_model->save($customer);

        $this->showCustomers();

      } else {
        include("view/header.php");
        include("view/customer_new.php");
        include("view/footer.php");
      }
    } else {
      include("view/header.php");
      include("view/customer_new.php");
      include("view/footer.php");
    }
  }

  /**
  * updateCustomer
  *
  * Update a customer.
  **/
  public function updateCustomer($id) {

    $customer = $this->customer_model->getById($id);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $customer->setName($_POST['name']);
      $customer->setPhone($_POST['phone']);
      $customer->setAddress($_POST['address']);

      $validation = new Validation();
      $validation->required_field('name', "Name is required.");
      $validation->required_field('phone', "Phone is required.");
      $validation->required_field('address', "Address is required.");

      //validate the data
      $errors = $validation->run($_POST);

      if (count($errors) == 0) {
        $customer->setName($_POST['name']);
        $customer->setPhone($_POST['phone']);
        $customer->setAddress($_POST['address']);

        $customer = $this->customer_model->update($customer);

        $this->showCustomers();

      } else {
        include("view/header.php");
        include("view/customer_update.php");
        include("view/footer.php");
      }
    } else {
      include("view/header.php");
      include("view/customer_update.php");
      include("view/footer.php");
    }
  }

  /**
  * deleteCustomer
  *
  * Delete a customer.
  **/
  public function deleteCustomer($id) {

    $this->customer_model->deleteById($id);

    $this->showCustomers();
  }
}
