<?php $features = array(); ?>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="card p-2">
            <div class="card-body">
                <img src="<?= imagedisplay::display($this->car['thumb'], 'car'); ?>" style="width: 100%"alt="Generic placeholder thumbnail">
                <h4 class="card-title text-center"><?= $this->car['title']; ?></h4>
                <span class="card-text"><?= $this->car['description']; ?></span>
            </div>
        </div>
        <div class="card p-2 mt-3">
            <div class="card-body">

                <button type="button" class="pull-right btn btn-primary" data-target="#update_feature" data-toggle="modal">
                    <i class="fa fa-plus"></i>
                </button>
                <?php if(!empty($this->carFeatures)): ?>
                    <button type="button" class="pull-right btn btn-danger mr-2" onclick="return $('.checkToggle').toggle()">
                        <i class="fa fa-minus"></i>
                    </button>
                <?php endif;?>
                <h4 class="card-title">Feature</h4>
                <hr  />
                <form id="deleteCarFeature" method="post">
                    <input type="hidden" value="deleteCarFeature" name="form" form="deleteCarFeature"  />
                </form>
                <ul class="list-group">
                    <?php foreach($this->carFeatures as $key => $value): ?>
                        <?php $features[] = $value['feature']; ?>
                        <li class="list-group-item">
                            <input type="checkbox" name="id[]" value="<?= $value['id']; ?>" form="deleteCarFeature" class="form-check-inline checkToggle" style="display: none;" />
                            <label class="form-check-label"><?= $value['feature_name'] ?></label>
                        </li>
                    <?php endforeach; ?>
                    <li class="list-group-item">
                        <button class="btn btn-danger checkToggle" style="display: none" form="deleteCarFeature" type="submit">
                            <span class="fa fa-trash"></span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="row">
            <form id="editCarDetails" method="post">
                <input type="hidden" value="editCarDetails" name="form" form="editCarDetails"  />
            </form>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Make:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['make_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Model:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['model_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Type:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['type_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Year:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['year']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Cylinders:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['cylinders_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Transmission:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['transmission_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Exterior Color:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['exterior_color_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Interior Color:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['interior_color_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Size:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['size_name']; ?>" />
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Price:</label>
                    <input type="text" disabled class="form-control" value="<?= $this->car['price']; ?>" />
                </div>
            </div>
        </div>

        <div class="mt-5 row">
            <div class="col-sm-12">
                <form id="editCarSpecification" method="post" class="pull-right">
                    <button type="submit" class="btn btn-success" value="editCarSpecification" name="form" form="editCarSpecification">
                        <span class="fa fa-save"></span>
                    </button>
                </form>
                <h4>Specification</h4>
                <hr />
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Drive Type:</label>
                    <input type="text" class="form-control" name="drive_type" value="<?= isset($this->specification) ? $this->specification['drive_type']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Engine Size:</label>
                    <input type="text" class="form-control" name="engine_size" value="<?= isset($this->specification) ? $this->specification['engine_size']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Horse Power:</label>
                    <input type="text" class="form-control" name="horsepower" value="<?= isset($this->specification) ? $this->specification['horsepower']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Torque:</label>
                    <input type="text" class="form-control" name="torque" value="<?= isset($this->specification) ? $this->specification['torque']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Compression Ratio:</label>
                    <input type="text" class="form-control" name="compression_ratio" value="<?= isset($this->specification) ? $this->specification['compression_ratio']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">CamShaft:</label>
                    <input type="text" class="form-control" name="camshaft" value="<?= isset($this->specification) ? $this->specification['camshaft']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Engine Type:</label>
                    <input type="text" class="form-control" name="engine_type" value="<?= isset($this->specification) ? $this->specification['engine_type']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Bore:</label>
                    <input type="text" class="form-control" name="bore" value="<?= isset($this->specification) ? $this->specification['bore']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Stroke:</label>
                    <input type="text" class="form-control" name="stroke" value="<?= isset($this->specification) ? $this->specification['stroke']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Valves Per Cylinders:</label>
                    <input type="text" class="form-control" name="valves_per_cylinders" value="<?= isset($this->specification) ? $this->specification['valves_per_cylinders']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Fuel Capacity:</label>
                    <input type="text" class="form-control" name="fuel_capacity" value="<?= isset($this->specification) ? $this->specification['fuel_capacity']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">EPA MPG (City/Hwy):</label>
                    <input type="text" class="form-control" name="epa_mpg" value="<?= isset($this->specification) ? $this->specification['epa_mpg']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Wheelbase:</label>
                    <input type="text" class="form-control" name="wheelbase" value="<?= isset($this->specification) ? $this->specification['wheelbase']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Overall Length:</label>
                    <input type="text" class="form-control" name="overall_length" value="<?= isset($this->specification) ? $this->specification['overall_length']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Width:</label>
                    <input type="text" class="form-control" name="width" value="<?= isset($this->specification) ? $this->specification['width']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Length:</label>
                    <input type="text" class="form-control" name="length" value="<?= isset($this->specification) ? $this->specification['length']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Curb Weight:</label>
                    <input type="text" class="form-control" name="curb_weight" value="<?= isset($this->specification) ? $this->specification['curb_weight']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Leg Room:</label>
                    <input type="text" class="form-control" name="leg_room" value="<?= isset($this->specification) ? $this->specification['leg_room']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Head Room:</label>
                    <input type="text" class="form-control" name="head_room" value="<?= isset($this->specification) ? $this->specification['head_room']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Seating Capacity:</label>
                    <input type="text" class="form-control" name="seating_capacity" value="<?= isset($this->specification) ? $this->specification['seating_capacity']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Cargo Capacity:</label>
                    <input type="text" class="form-control" name="cargo_capacity" value="<?= isset($this->specification) ? $this->specification['cargo_capacity']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Towing Capacity:</label>
                    <input type="text" class="form-control" name="towing_capacity" value="<?= isset($this->specification) ? $this->specification['towing_capacity']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Payload Capacity Truck:</label>
                    <input type="text" class="form-control" name="payload_capacity_truck" value="<?= isset($this->specification) ? $this->specification['payload_capacity_truck']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Gross Weight Truck:</label>
                    <input type="text" class="form-control" name="gross_weight_truck" value="<?= isset($this->specification) ? $this->specification['gross_weight_truck']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="form-group">
                    <label class="col-form-label">Tires:</label>
                    <input type="text" class="form-control" name="tires" value="<?= isset($this->specification) ? $this->specification['tires']: "" ?>" form="editCarSpecification" />
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="">
                <div style="display: none;">
                    <form method="post" id="addCarImage" enctype="multipart/form-data">
                        <input type="hidden" value="addCarImage" form="addCarImage" name="form"/>
                        <input type="file" form="addCarImage" id="updateImg" onchange="$('#postImg').click()" name="img[]" multiple accept="image/*" style="display: none;">
                        <button form="addCarImage" id='postImg' type="submit">
                            POST
                        </button>
                    </form>
                </div>

                <button class="btn btn-primary pull-right" onclick="$('#updateImg').click()">
                    <i class="fa fa-upload"></i> Image
                </button>
                <?php if(!empty($this->images)): ?>
                    <button class="btn btn-danger pull-right mr-3" onclick="$('.deleteImg').toggle()">
                        <i class="fa fa-minus"></i>
                    </button>
                <?php endif; ?>
                <h4 class="title">Gallery</h4>
                <hr class="my-4" />
            </div>
            <div class="">
                <div class="row">
                    <form id="makeMain" method="POST">
                        <input type="hidden" value="makeMain" name="form" form="makeMain" />
                    </form>
                    <form id="deleteImage" method="POST">
                        <input type="hidden" value="deleteImage" name="form" form="deleteImage" />
                    </form>
                    <?php foreach($this->images as $key => $value): ?>
                        <div class="col-sm col-md text-center">
                            <a  data-toggle="modal" data-target="#imageGallery<?= $value['id']; ?>">
                                <img src="<?= URL . $value['thumb'] ?>" class="img-responsive">
                            </a>
                            <div class="col-12 deleteImg" style="display: none;">
                                <input type="checkbox" value="<?= $value['id']; ?>" name="id[]" form="deleteImage" />
                            </div>
                            <hr />
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row text-center deleteImg" style="display: none;">
                    <button class="btn btn-danger" type="submit" form="deleteImage">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="update_feature" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update_feature">
    <div class="modal-dialog" style="width: 80%; max-width:80%" role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Add Features Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="updateFeature" method="post">
                    <input type="hidden" value="updateFeature" name="form" form="updateFeature"  />
                    <div class="row card-columns">
                        <?php foreach($this->features as $key => $value): ?>
                            <?php if(!in_array($value['id'], $features)): ?>
                                <div class="col-sm-6 col-md card m-1" onclick="$('#checkNow<?= $value['id'] ?>').click()">
                                    <div class="card-body text-center p-2">
                                        <div class="row">
                                            <div class="col-12">
                                                <input id="checkNow<?= $value['id'] ?>" style="text-align: center;" type="checkbox" value="<?= $value['id'] ?>" name="features[]" form="updateFeature" />
                                            </div>
                                            <div class="col-12"><?= $value['feature']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="updateFeature">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php foreach($this->images as $key => $value): ?>
    <!-- Modal -->
    <div class="modal fade" id="imageGallery<?= $value['id']; ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="color: black;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= $this->car['title']; ?> IMAGE</h4>
                </div>
                <div class="modal-body">
                    <img src="<?= imagedisplay::display($value['image'], 'car'); ?>" class="img-responsive" style="width: 100%;">
                </div>
                <div class="modal-footer" >
                    <a href="#" class="btn" data-dismiss="modal"> Close</a>
                    <button class="btn btn-primary" type="submit" name="id" value="<?= $value['id'] ?>"  form="makeMain" onclick="return confirm('Are you sure')">MAKE MAIN</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
