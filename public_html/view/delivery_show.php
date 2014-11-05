<div class="panel panel-default">
  <div class="panel-heading">Delivery Address List</div>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Number</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><?= $customer->getId() ?></td>
        <td><?= $customer->getName() ?></td>
        <td><?= $customer->getPhone() ?></td>
        <td><?= $customer->getAddress() ?></td>
      </tr>
    </tbody>
  </table>

  <div class="panel-heading">Order at <?= $pizza->getOrdered() ?></div>
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Topping 1</th>
        <th>Topping 2</th>
        <th>Topping 3</th>
      </tr>
    </thead>
    <tbody>

      <tr>
        <td><?= $pizza->getId() ?></td>
        <td><?= $pizza->getTopping1() ?></td>
        <td><?= $pizza->getTopping2() ?></td>
        <td><?= $pizza->getTopping3() ?></td>
      </tr>
    </tbody>
  </table>
</div>
<p class="text-center"><a class="btn btn-danger btn-lg" href="index.php?action=deleteDelivery&id=<?= $pizza->getId() ?>" role="button">Delivered</a></p>
