<div class="panel panel-default">
  <div class="panel-heading clearfix">Customer List <a class="btn btn-primary btn-sm pull-right" href="index.php?action=newDelivery" role="button">New Delivery</a></div>
  <?php if (count($pizzas) > 0) { ?>
    <table class="table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Ordered</th>
          <th>Customer Id</th>
          <th>Topping 1</th>
          <th>Topping 2</th>
          <th>Topping 3</th>
        </tr>
      </thead>
      <tbody>

      <?php foreach($pizzas as $pizza) { ?>
        <tr>
          <td><a href="index.php?action=showDelivery&id=<?= $pizza->getId() ?>"><?= $pizza->getId() ?></a></td>
          <td><?= $pizza->getOrdered() ?></td>
          <td><?= $pizza->getCustomerId() ?></td>
          <td><?= $pizza->getTopping1() ?></td>
          <td><?= $pizza->getTopping2() ?></td>
          <td><?= $pizza->getTopping3() ?></td>
        </tr>
      <?php } ?>
      </tbody>
    </table>
  <?php } ?>
</div>
