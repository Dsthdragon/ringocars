<?php if($this->save == 0): ?>
<div class="alert alert-danger">
	Ad not Found!
</div>
<?php elseif($this->save == 1): ?>
<div class="alert alert-warning">
	Ad Already Saved!
</div>
<?php elseif($this->save == 2): ?>
<div class="alert alert-success">
	Ad successfully saved!
</div>
<?php endif; ?>