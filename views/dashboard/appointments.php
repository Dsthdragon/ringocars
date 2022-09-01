<h3>Appointments</h3>
<hr />
<form id="deleteAppointment" method="POST">
	<input type="hidden" value="deleteAppointment" name="form" form="deleteAppointment" />
</form>
<table class="table table-bordered table-strip">
	<thead>
		<tr>
			<th>Date</th>
			<th>Time</th>
			<th>Created Date</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->appointments as $key => $value): ?>
			<tr>
				<td><?= relative_time::wordmonth($value['appointment']); ?></td>
				<td><?= relative_time::justtime($value['appointment']); ?></td>
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