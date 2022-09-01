<?php $general = new general_model(); ?>

<?php $shop = $general->getShop(); ?>
<style>
#makeAppointment input
{
	background-color: #ddd;
	padding: 1rem;
}
</style>
<div class="container"  style="padding: 1rem 3rem;">
	<div class="row">
		<div class="col-sm-12 text-center">
			<h4 class="" >Schedule your free appraisal </h4>
			<p>At <?= NAME ?>, we'll buy your car even if you don't buy ours.® Get a real offer and leave with payment in hand.</p>
			<hr />
		</div>
		<div class="col-sm-12 col-md-6" style="padding: 2rem;">
			<form id="makeAppointment" method="POST">
				<h5>CONTACT INFORMATION</h5>
				<div class="form-group">
					<input type="text" class="form-control" name="first_name" autocomplete="given-name" form="makeAppointment" placeholder='First Name'>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="last_name" autocomplete="family-name" form="makeAppointment" placeholder='Last Name'>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="email" autocomplete="email" form="makeAppointment" placeholder='Email Address'>
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="phone" autocomplete="tel-national" form="makeAppointment" placeholder='Phone Number'>
				</div>

				<h5>APPOINTMENT DATE</h5>
				<div class="form-group">
					<input type="text" class="form-control" name="date"  form="makeAppointment" placeholder='Select Date' id="singleDatePicker">

				</div>
				<div class="form-group">
					<select class="form-control" name="time"  form="makeAppointment" style="background-color: #ddd;">
						<?php for($h = 9; $h < 17; $h++): ?>
							<?php if(!isset($m)): ?>
								<?php $m = "00"; ?>
							<?php else: ?>
								<?php $m = ($m == "00") ? 30 : "00"; ?>
							<?php endif; ?>
								<?php $ho = (strlen($h) == 1)? '0'.$h : $h; ?>
							<option value="<?= $ho .':'.$m ?>"><?= $ho .':'.$m ?></option>
						<?php endfor; ?>
					</select>
				</div>
			</form>
		</div>
		<div class="col-sm-12 col-md-6" style="border-left: 1px solid #ddd; padding: 2rem;">
			<h5>DURING YOUR VISIT YOU CAN ALSO: (OPTIONAL)</h5>
			<label class="custom-control custom-checkbox" style="display: block">
				<input type="checkbox" name="see_cars" form="makeAppointment" class="custom-control-input" id="seeCarsCheck"/>
				<span class="custom-control-indicator"></span>
				<label class="form-check-label" onclick="$('#seeCarsCheck').click();">
					Check car(s)
				</label>
			</label>
			<label class="custom-control custom-checkbox" style="display: block">
				<input type="checkbox" name="learn_finance" form="makeAppointment" class="custom-control-input" id="learnFinanceCheck"/>
				<span class="custom-control-indicator"></span>
				<label class="form-check-label" onclick="$('#learnFinanceCheck').click();">
					Learn more about financing
				</label>
			</label>
			<hr />

			<div>
				<h5>Your Store</h5>
				<?= strtoupper($shop['shop']) ?><br />
				<?= $shop['address']; ?><br />
				<?= $shop['phone'] ?>
			</div>
			<div class="text-right" style="padding: 1rem;">
				<button class="btn btn-primary" type="submit" form="makeAppointment" value="makeAppointment" name="form">
					<span style="border-right: 1px solid; padding:  1rem; margin-right: 1rem;">Submit </span> <span class="fa fa-arrow-right"></span>
				</button>
			</div>
			
		</div>
	</div>
</div>


<div style="background-color: #eee;"  id="what_to_bring_in">
	<div class="container" style="padding:5rem;">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h4 class="">What To Bring In</h4>
				<p>There are a few items that you’ll need no matter where you’re located. Requirements for selling your car can vary from state to state, so contact your local CarMax if you have any questions about what you’ll need to bring with you. </p>
				<hr />
			</div>
			<div class="col-sm-12">
				<div class="col-sm-12 col-md-6 offset-md-3" style="font-size: 1.5rem;">
					<ul class="fa-ul">
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> Car title and Information</li>
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> Valid and current Registration</li>
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> All Keys and Remotes</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="what_determine_your_offer">
	<div class="container" style="padding:5rem;"">
		<div class="row">
			<div class="col-sm-12 text-center">
				<h4 class="">What Determine Your Offer</h4>
				<p>There are a few items that you’ll need no matter where you’re located. Requirements for selling your car can vary from state to state, so contact your local CarMax if you have any questions about what you’ll need to bring with you. </p>
				<hr />
			</div>
			<div class="col-sm-12">
				<div class="col-sm-12 col-md-6 offset-md-3" style="font-size: 1.5rem;">

					<ul class="fa-ul">
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> Current Market Condition</li>
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> Our Inspection</li>
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> The Testdrive</li>
						<li> <span class="fa-li"><i class="fa fa-check-square text-info"></i></span> Vehicle History & Report</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	
	$(function() {

		$('#singleDatePicker').datetimepicker({
			format: "Y-m-d",
			formatDate: "Y-m-d",
			timepicker: false,
			minDate: Date.now()
		});
	});
</script>