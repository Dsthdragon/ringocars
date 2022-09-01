<?php $general = new general_model(); ?>
<?php foreach($this->models as $key => $value): ?>
    <?php $modelsCars = $general->get_model_cars($value['id'], 'count') ?>
    <?php if($modelsCars > 0 ): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <label class="custom-control custom-checkbox" style="display: block">
                <input type="checkbox" name="models[]" value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCarsPack" id="modelCheckBox<?= $value['id']; ?>"/>
                <span class="custom-control-indicator"></span>
                <label class="form-check-label" onclick="$('#modelCheckBox<?= $value['id']; ?>').click();">
                    <?= ucfirst($value['model']) ?>
                </label>
            </label>
        </li>
    <?php endif; ?>
<?php endforeach; ?>