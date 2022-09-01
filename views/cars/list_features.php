<?php $x = 0; ?>
<?php foreach($this->features as $key => $value): ?>
    <li class="pl-4" >
        <label class="custom-control custom-checkbox" style="display: block">
            <input type="checkbox" name="features[]" value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCars searchForCarsPackByFeature"  id="featureCheckBox<?= $value['id']; ?>"/>
            <span class="custom-control-indicator"></span>
            <label class="form-check-label" onclick="$('#featureCheckBox<?= $value['id']; ?>').click() ">
                <?= ucfirst($value['feature']) ?>
            </label>
        </label>
    </li>
    <?php $x++; ?>
<?php endforeach; ?>