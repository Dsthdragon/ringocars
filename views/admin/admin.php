<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_admin" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>
            Adminstrators
            <?php if(isset($this->brand)): ?>
                (
                <?= $this->brand['make']; ?>
                <?php if(isset($this->model)): ?>
                     - <?= $this->model['model']; ?>
                <?php endif; ?>
                )
            <?php endif; ?>
        </h3>
    </div>
    <div class="col-12">
        <form id="deleteAdmin" method="POST">
            <input type="hidden" value="deleteAdmin" name="form" form="deleteAdmin" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Email</th>
                    <th>Fullname</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->admin, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['fullname']; ?></td>
                        <td><?= $value['role']; ?></td>
                        <td>
                            <button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteAdmin" name="id" onclick="return confirm('Are you sure you want to delete the admin!')"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="7" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'adminstrators'); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_admin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_admin">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="createAdmin" method="post">
                    <input type="hidden" value="createAdmin" name="form" form="createAdmin"  />
                    <div class="form-group">
                        <label>Fullname</label>
                        <input type="text" class="form-control" value="" name="fullname" form="createAdmin" />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" value="" name="email" form="createAdmin" />
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role" form="createAdmin">
                            <option value=""> -- SELECT STORE -- </option>
                            <option value="regular">Regular</option>
                            <option value="super">Super</option>
                            <option value="owner">Owner</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="createAdmin">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>