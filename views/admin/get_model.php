<?php $general = new general_model(); ?>
<?php $models = $general->get_models($this->make, "all"); ?>
<option value=""> -- SELECT MODEL -- </option>
<?php foreach($models as $key => $value): ?>
<option value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
<?php endforeach; ?>
