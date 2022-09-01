<div class="row">
    <div class="col-12">
        <h3> Appointments</h3>
        <a <?= ($this->type == "future") ? "style='color: #000;'" : "" ?> href="<?= URL ?>admin/appointments/1/future">Upcoming</a> | <a <?= ($this->type == "past") ? "style='color: #000;'" : "" ?> href="<?= URL ?>admin/appointments/1/past">Past</a>
    </div>
    <div class="col-12">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fullname Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Check Cars</th>
                    <th>Learn Abt Finance</th>
                    <th>Date</th>
                    <th>Shop</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->appointments, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['last_name'].' '.$value['first_name']; ?></td>
                        <td><?= $value['phone']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td>
                            <span class="fa <?= ($value['check_cars'] ==  1) ? "fa-check" : "fa-close"; ?>"></span>
                        </td>
                        <td>
                            <span class="fa <?= ($value['learn_finance'] == 1) ? "fa-check" : "fa-close"; ?>"></span>
                        </td>
                        <td><?= $value['appointment']; ?></td>
                        <td><?= $value['shop_name']; ?></td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="7" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'appointments', $this->type); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>