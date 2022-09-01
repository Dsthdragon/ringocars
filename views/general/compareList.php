<?php $general = new general_model(); ?>
<div class="row">
	<?php foreach($this->ads as $key => $value): ?>
		<div class="col-sm" style="border-left: 1px solid #CECECE;">
			<div style="padding: 1rem;">
				<button class="btn btn-danger removeCompare form-control" data-url="<?= URL; ?>general_json/removeCompare/<?= $value['id']; ?>">REMOVE</button>
			</div>
			<h4 style="border-bottom: 1px solid #ccc;" title="Car Title"><?= $value['title']; ?></h4>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Price"><?= MONEY.number_format($value['price'], 2); ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Milage"><?= $value['milage']; ?>K</h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Type"><?= $value['type_name']; ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Transmission"><?= $value['transmission_name']; ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Cylinders"><?= $value['cylinders_name']; ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Size"><?= $value['size_name']; ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Interior Color"><?= $value['interior_color_name']; ?></h5>
			<h5 style="border-bottom: 1px solid #ccc;" title="Car Exterior Color"><?= $value['exterior_color_name']; ?></h5>
			<div title="Car Features">

				<?php $features = ""; ?>
				<?php foreach($general->getCarFeatures($value['id'], false) as $k => $v): ?>
					<?php $features .= ', '.$v['feature_name']; ?>
				<?php endforeach; ?>
				<?php $features = trim($features, ', '); ?>
				<?= $features ?>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<script>
	$(function() {
		$(".removeCompare").click(function(){
			var url = $(this).data(url);
			$.get(url ,function(o){
				$("#compareHolder").html(o);
				if($(".removeCompare").length == 0){
					$("#compareBox").modal('hide');
					$("#compareButton").hide();
				}
			});
		})
	});
</script>