<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_shop" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>Stores</h3>
    </div>
    <div class="col-12">
        <form id="deleteShop" method="POST">
            <input type="hidden" value="deleteShop" name="form" form="deleteShop" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Shop</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->shop, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['shop']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewShop<?= $value['id']; ?>" >
                                <i class="fa fa-binoculars"></i>
                            </button>
                            <button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteShop" name="id" onclick="return confirm('Are you sure you want to delete the feature!')"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                    <div id="viewShop<?= $value['id']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_feature">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Store Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="">
                                        <h5>Address</h5>
                                        <p>
                                            <?= $value['address']; ?>
                                        </p>
                                        <h5>SHOWROOM HOURS</h5>
                                        <p>
                                            <?= $value['sh_hours']; ?>
                                        </p>
                                        <h5>SERVICE CENTER HOURS</h5>
                                        <p>
                                            <?= $value['sc_hours']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="4" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'stores'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_shop" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_shop">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Store</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addShop" method="post">
                    <input type="hidden" value="addShop" name="form" form="addShop"  />
                    <div class="form-group">
                        <label>Store</label>
                        <input type="text" class="form-control" value="" name="shop" form="addShop" />
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" value="" name="phone" form="addShop" />
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" form="addShop"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Showroom Hours</label>
                        <textarea class="form-control" name="sh_hours" form="addShop"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Service Center Hours</label>
                        <textarea class="form-control" name="sc_hours" form="addShop"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addShop">Submit</button>
            </div>
        </div>
    </div>
</div>
