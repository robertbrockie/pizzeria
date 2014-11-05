<div class="panel panel-default">
  <div class="panel-heading clearfix">Customer List <a class="btn btn-primary btn-sm pull-right" href="index.php?action=newCustomer" role="button">New Customer</a></div>
  <?php if (count($customers) > 0) { ?>
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

      <?php foreach($customers as $customer) { ?>
        <tr>
          <td><a href="index.php?action=updateCustomer&id=<?= $customer->getId() ?>"><?= $customer->getId() ?></a></td>
          <td><?= $customer->getName() ?></td>
          <td><?= $customer->getPhone() ?></td>
          <td><?= $customer->getAddress() ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
