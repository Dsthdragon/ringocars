<?php if($this->save == 0): ?>
<div class="alert alert-danger">
	Ad not Found!
</div>
<?php elseif($this->save == 1): ?>
<div class="alert alert-warning">
	Already comparing ad!
</div>
<?php elseif($this->save == 2): ?>
<div class="alert alert-success">
	Ad added to compare list!
</div>
<?php endif; ?>