<form method="post" accept-charset="utf-8" action="index.php?action=updateCustomer&id=<?= $customer->getId() ?>" class="form-horizontal" />
  <?php if(isset($errors)) { include('view/errors.php'); } ?>
  <input type="hidden" name="id" value="<?= $customer->getId() ?>" />
  <fieldset>
    <div class="form-group">
      <label class="col-md-4 control-label" for="name">Name</label>
      <div class="col-md-4">
        <input id="name" name="name" type="text" placeholder="name" class="form-control input-md" value="<?= $customer->getName() ?>" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="phone">Phone #</label>
      <div class="col-md-4">
        <input id="phone" name="phone" type="text" placeholder="555-555-5555" class="form-control input-md" value="<?= $customer->getPhone() ?>" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="address">Address</label>
      <div class="col-md-4">
        <textarea class="form-control" id="address" name="address"><?= $customer->getAddress() ?></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="add"></label>
      <div class="col-md-4">
        <button id="add" name="add" class="btn btn-primary">Update Customer</button>
      </div>
    </div>

  </fieldset>
</form>
<p class="text-center"><a class="btn btn-danger btn-md" href="index.php?action=deleteCustomer&id=<?= $customer->getId() ?>" role="button">Delete</a></p>
