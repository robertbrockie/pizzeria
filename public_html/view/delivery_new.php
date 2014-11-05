<form method="post" accept-charset="utf-8" action="index.php?action=newDelivery" class="form-horizontal" />
  <input type="hidden" name="customer_id" value="<?= $customer->id ?>" />
  <fieldset>
    <legend>How do you want your Zaa?</legend>

    <?php if(isset($errors)) { include('view/errors.php'); } ?>
    
    <div class="form-group">
      <label class="col-md-4 control-label" for="customer">Customer</label>
      <div class="col-md-4">
        <select name="customer_id" class="form-control">
          <option value="">please select a customer</option>
          <?php foreach ($customers as $customer) { ?>
            <option value="<?= $customer->getId() ?>"><?= $customer->getName() ?></option>
          <?php } ?>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="toppings">Toppings</label>
      <div class="col-md-4">
      <div class="checkbox">
        <label for="toppings1">
          <input type="checkbox" name="topping1" value="1">
          Topping 1
        </label>
    	</div>
      <div class="checkbox">
        <label for="toppings2">
          <input type="checkbox" name="topping2" value="1">
          Topping 2
        </label>
    	</div>
      <div class="checkbox">
        <label for="toppings3">
          <input type="checkbox" name="topping3" value="1">
          Topping 3
        </label>
    	</div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-4 control-label" for="order"></label>
      <div class="col-md-4">
        <button id="order" class="btn btn-primary">Order</button>
      </div>
    </div>

  </fieldset>
</form>
