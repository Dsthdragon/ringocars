<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_transmission" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>Transmissions</h3>
    </div>
    <div class="col-12">
        <form id="deleteTransmission" method="POST">
            <input type="hidden" value="deleteTransmission" name="form" form="deleteTransmission" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Transmission</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->transmissions, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['transmission']; ?></td>
                        <td><button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteTransmission" name="id" onclick="return confirm('Are you sure you want to delete the transmission!')"><i class="fa fa-trash"></i></button></td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="4" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'transmissions'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_transmission" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_transmission">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Transmission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addTransmission" method="post">
                    <input type="hidden" value="addTransmission" name="form" form="addTransmission"  />

                    <div class="form-group">
                        <label>Transmission</label>
                        <input type="text" class="form-control" value="" name="transmission" form="addTransmission" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addTransmission">Submit</button>
            </div>
        </div>
    </div>
</div>
