<?php $general = new general_model(); ?>
<div class="row">
    <div class=" col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_model" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3><?= $this->brand['make']; ?></h3>
    </div>
    <div class="col-12">
        <form id="deleteModel" method="POST">
            <input type="hidden" value="deleteModel" name="form" form="deleteModel" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Model</th>
                    <th>Cars</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->models, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['model']; ?></td>
                        <td>
                            <a href="<?= URL ?>admin/cars/1/<?= $this->brand['id'] . '_'.$this->brand['make']; ?>/<?= $value['id'] . '_'.$value['model']; ?>">
                                <?= $general->get_model_cars($value['id'], 'count'); ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?= URL ?>admin/cars/1/<?= $this->brand['id'] . '_'.$this->brand['make']; ?>/<?= $value['id'] . '_'.$value['model']; ?>" class="btn btn-primary" >
                                <i class="fa fa-binoculars"></i>
                            </a>
                            <button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteModel" name="id" onclick="return confirm('Are you sure you want to delete the Brand!')"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="5" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'brand/'. $this->brand['id']); ?>
                    </td>
                </tr>
            </tfoot>
        </table>

        <nav>
            <?php if(!empty($this->next)): ?>
                <a class="pull-right btn btn-primary" href="<?= URL.'admin/brand/'.$this->next['id'] ?>"><?= $this->next['make'] ?> <span aria-hidden="true">→</span></a>
            <?php endif; ?>
            <?php if(!empty($this->previous)): ?>
                <a class="btn btn-primary" href="<?= URL.'admin/brand/'. $this->previous['id'] ?>"><span aria-hidden="true">←</span> <?= $this->previous['make']; ?></a>
            <?php endif; ?>
        </nav>
    </div>
</div>
<div id="add_model" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_model">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Model</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addModel" method="post">
                    <input type="hidden" value="addModel" name="form" form="addModel"  />
                    <div class="form-group">
                        <label>Model</label>
                        <input type="text" class="form-control" value="" name="model" form="addModel" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addModel">Submit</button>
            </div>
        </div>
    </div>
</div>
