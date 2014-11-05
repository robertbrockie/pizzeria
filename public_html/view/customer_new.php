<form method="post" accept-charset="utf-8" action="index.php?action=newCustomer" class="form-horizontal" />
  <?php if(isset($errors)) { include('view/errors.php'); } ?>
  <fieldset>
    <div class="form-group">
      <label class="col-md-4 control-label" for="name">Name</label>
      <div class="col-md-4">
        <input id="name" name="name" type="text" placeholder="name" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="phone">Phone #</label>
      <div class="col-md-4">
        <input id="phone" name="phone" type="text" placeholder="555-555-5555" class="form-control input-md" required="">
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="address">Address</label>
      <div class="col-md-4">
        <textarea class="form-control" id="address" name="address"></textarea>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="add"></label>
      <div class="col-md-4">
        <button id="add" name="add" class="btn btn-primary">Add Customer</button>
      </div>
    </div>

  </fieldset>
</form>
