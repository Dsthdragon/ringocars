<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_color" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>Colors</h3>
    </div>
    <div class="col-12">
        <form id="deleteColor" method="POST">
            <input type="hidden" value="deleteColor" name="form" form="deleteColor" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Color</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->colors, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['color']; ?></td>
                        <td><button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteColor" name="id" onclick="return confirm('Are you sure you want to delete the color!')"><i class="fa fa-trash"></i></button></td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="4" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'colors'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_color" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_color">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addColor" method="post">
                    <input type="hidden" value="addColor" name="form" form="addColor"  />

                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" class="form-control" value="" name="color" form="addColor" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addColor">Submit</button>
            </div>
        </div>
    </div>
</div>
