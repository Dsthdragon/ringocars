<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_cylinders" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>Cylinders</h3>
    </div>
    <div class="col-12">
        <form id="deleteCylinders" method="POST">
            <input type="hidden" value="deleteCylinders" name="form" form="deleteCylinders" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cylinders</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->cylinders, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['cylinders']; ?></td>
                        <td><button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteCylinders" name="id" onclick="return confirm('Are you sure you want to delete the cylinders!')"><i class="fa fa-trash"></i></button></td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="4" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'cylinders'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_cylinders" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_cylinders">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Cylinders</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCylinders" method="post">
                    <input type="hidden" value="addCylinders" name="form" form="addCylinders"  />

                    <div class="form-group">
                        <label>Cylinders</label>
                        <input type="text" class="form-control" value="" name="cylinders" form="addCylinders" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addCylinders">Submit</button>
            </div>
        </div>
    </div>
</div>
