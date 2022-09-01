<h3>Saved</h3>
<hr />
<form id="deleteAppointment" method="POST">
	<input type="hidden" value="deleteAppointment" name="form" form="deleteAppointment" />
</form>
<table class="table table-bordered table-strip">
	<thead>
		<tr>
			<th>Car</th>
			<th>Price</th>
			<th>Created Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->saves as $key => $value): ?>
			<tr>
				<td><?= $value['title']; ?></td>
				<td><?= MONEY.number_format($value['price'], 2); ?></td>
				<td><?= relative_time::wordmonth($value['created_at']); ?></td>
				<td>
					<button class="btn btn-danger" type="submit" name="id" value="<?= $value['id'] ?>" form="deleteAppointment">
						<span class="fa fa-trash"></span>
					</button>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>

</table>