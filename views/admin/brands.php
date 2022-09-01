<?php $general = new general_model(); ?>
<div class="row">
    <div class=" col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_make" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>Brands</h3>
    </div>
    <div class="col-12">
        <form id="deleteMake" method="POST">
            <input type="hidden" value="deleteMake" name="form" form="deleteMake" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Brand</th>
                    <th>Models</th>
                    <th>Cars</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->brands, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data as $key => $value): ?>

                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['make']; ?></td>
                        <td><?= $general->get_models($value['id'], "count"); ?></td>
                        <td>
                            <a href="<?= URL ?>admin/cars/1/<?= $value['id'] . '_'.$value['make']; ?>">
                                <?= $general->get_make_cars($value['id'], "count"); ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= URL ?>admin/brand/<?= $value['id'] ?>" class="btn btn-primary" >
                                <i class="fa fa-binoculars"></i>
                            </a>
                            <button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteMake" name="id" onclick="return confirm('Are you sure you want to delete the Brand!')"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="6" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'brands'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_make" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_make">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addMake" method="post">
                    <input type="hidden" value="addMake" name="form" form="addMake"  />
                    <div class="form-group">
                        <label>Brand</label>
                        <input type="text" class="form-control" value="" name="make" form="addMake" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addMake">Submit</button>
            </div>
        </div>
    </div>
</div>
