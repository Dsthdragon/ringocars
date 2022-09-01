<div class="row">
    <div class="col-12">
        <button type="button" class="pull-right btn btn-primary" data-target="#add_car" data-toggle="modal">
            <i class="fa fa-plus"></i>
        </button>
        <h3>
            Cars
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
        <form id="deleteCar" method="POST">
            <input type="hidden" value="deleteCar" name="form" form="deleteCar" />
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Car</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Shop</th>
                    <th>Action</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = paginator::paginate($this->cars, 10, $this->currentPage);
                $count = $data[1];
                $data = $data[0];
                ?>
                <?php foreach($data  as $key => $value): ?>
                    <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['title']; ?></td>
                        <td><?= $value['make_name']; ?></td>
                        <td><?= $value['model_name']; ?></td>
                        <td><?= $value['shop_name']; ?></td>
                        <td>
                            <a class="btn btn-primary" href="<?= URL ?>admin/car/<?= $value['id']; ?>">
                                <span class="fa fa-binoculars"></span>
                            </a>
                            <button class="btn btn-danger" value="<?= $value['id']; ?>" form="deleteCar" name="id" onclick="return confirm('Are you sure you want to delete the car!')"><i class="fa fa-trash"></i></button>
                        </td>
                        <td><?= $value['created_at']?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot style="padding: 0">
                <tr>
                    <td colspan="7" class="text-right">
                        <?php paginator::view($count, $this->currentPage, "admin", 'cars', $this->link); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div id="add_car" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="add_car">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCar" method="post">
                    <input type="hidden" value="addCar" name="form" form="addCar"  />
                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description" form="addCar"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" value="" name="price" form="addCar" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-check-inline" value="1" name="negotiable" form="addCar" />
                        <label class="form-check-label">Negotiable</label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-check-inline" value="1" name="used" form="addCar" />
                        <label class="form-check-label">Used</label>
                    </div>
                    <div class="form-group">
                        <label>Store</label>
                        <select class="form-control" name="shop" form="addCar">
                            <option value=""> -- SELECT STORE -- </option>
                            <?php foreach($this->stores as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['shop']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="make" form="addCar" id="getBrand">
                            <option value=""> -- SELECT BRAND -- </option>
                            <?php foreach($this->brands as $key => $value): ?>
                                <option <?= (isset($this->brand) && $this->brand['id'] == $value['id'])? 'selected=""' : '' ?> value="<?= $value['id'] ?>"><?= $value['make']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group" id="modelBox" style="<?= (isset($this->models))? '' : 'display: none;' ?>">
                        <label>Model</label>
                        <select class="form-control" name="model" id="modelSelect" form="addCar">
                            <?php if(isset($this->models)): ?>
                                <option value=""> -- SELECT MODEL -- </option>
                                <?php foreach($this->models as $key => $value): ?>
                                <option <?= (isset($this->model) && $this->model['id'] == $value['id'])? 'selected=""' : '' ?> value="<?= $value['id']; ?>"><?= $value['model']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select class="form-control" name="type" form="addCar">
                            <option value=""> -- SELECT TYPE -- </option>
                            <?php foreach($this->types as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['type']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cylinders</label>
                        <select class="form-control" name="cylinders" form="addCar">
                            <option value=""> -- SELECT CYLINDERS -- </option>
                            <?php foreach($this->cylinders as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['cylinders']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Size</label>
                        <select class="form-control" name="size" form="addCar">
                            <option value=""> -- SELECT SIZE -- </option>
                            <?php foreach($this->sizes as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['size']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Transmission</label>
                        <select class="form-control" name="transmission" form="addCar">
                            <option value=""> -- SELECT TRANSMISSION -- </option>
                            <?php foreach($this->transmissions as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['transmission']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Exterior Color</label>
                        <select class="form-control" name="exterior_color" form="addCar">
                            <option value=""> -- SELECT EXTERIOR COLOR -- </option>
                            <?php foreach($this->colors as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['color']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Interior Color</label>
                        <select class="form-control" name="interior_color" form="addCar">
                            <option value=""> -- SELECT INTERIOR COLOR -- </option>
                            <?php foreach($this->colors as $key => $value): ?>
                                <option value="<?= $value['id'] ?>"><?= $value['color']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input type="text" class="form-control" value="" name="year" form="addCar" />
                    </div>
                    <div class="form-group">
                        <label>Milage</label>
                        <input type="text" class="form-control" value="" name="milage" form="addCar" />
                    </div>
                    <div class="form-group">
                        <label>MPG Highway</label>
                        <input type="text" class="form-control" value="" name="mpg_highway" form="addCar" />
                    </div>
                    <div class="form-group">
                        <label>MPG City</label>
                        <input type="text" class="form-control" value="" name="mpg_city" form="addCar" />
                    </div>
                    <div class="form-group">
                        <input type="checkbox" class="form-check-inline" value="1" name="redirect" form="addCar" />
                        <label class="form-check-label">Redirect to profile</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="addCar">Submit</button>
            </div>
        </div>
    </div>
</div>
<script>

$('#getBrand').on('change', function() {
    var brand = this.value;
    var url = "<?= URL ?>admin/get_models/"+brand;
    console.log(url);
    $.get(url, function(o) {

        $('#modelSelect').html(o);
        $('#modelBox').show();
    })
})
</script>
