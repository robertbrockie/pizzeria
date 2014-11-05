<?php if(count($errors) > 0) { ?>
	<div class="alert alert-error">
		<?php foreach (array_values($errors) as $message) { ?>
			<p><?= $message ?></p>
		<?php } ?>
    </div>
<?php } ?>
