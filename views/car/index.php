<?php $features = array(); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card p-2">
                <div class="card-body">
                    <img src="<?= imagedisplay::display($this->car['thumb'], 'car'); ?>" style="width: 100%" alt="Generic placeholder thumbnail">
                    <h4 class="card-title text-center">
                        <?= $this->car['title']; ?> 
                    </h4>

                    <span class="card-text"><?= $this->car['description']; ?></span>
                </div>
            </div>
            <div class="card p-2 mt-3">
                <div class="card-body">
                    <h4 class="card-title">Feature</h4>
                    <hr  />
                    <form id="deleteCarFeature" method="post">
                        <input type="hidden" value="deleteCarFeature" name="form" form="deleteCarFeature"  />
                    </form>
                    <ul class="list-group">
                        <?php foreach($this->carFeatures as $key => $value): ?>
                            <?php $features[] = $value['feature']; ?>
                            <li class="list-group-item">
                                <label class="form-check-label"><?= $value['feature_name'] ?></label>
                            </li>
                        <?php endforeach; ?>
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
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="col-form-label">Size:</label>
                        <input type="text" disabled class="form-control" value="<?= $this->car['size_name']; ?>" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="col-form-label">Condition:</label>
                        <input type="text" disabled class="form-control" value="<?= ($this->car['used'] == 1) ? 'Used' : 'New' ?>" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="form-group">
                        <label class="col-form-label">Price:</label>
                        <input type="text" disabled class="form-control" value="<?= $this->car['price']; ?>" />
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="">
                    <h4 class="title">Gallery</h4>
                    <hr class="my-4" />
                </div>
                <div class="">
                    <div class="row">
                        <?php foreach($this->images as $key => $value): ?>
                            <div class="col-sm col-md text-center">
                                <a  data-toggle="modal" data-target="#imageGallery<?= $value['id']; ?>">
                                    <img src="<?= URL . $value['thumb'] ?>" class="img-responsive">
                                </a>
                                <hr />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h3>Specification</h3>
                <hr />
                <table class="table table-striped">
                    <tr>
                        <th>Drive Type:</th>
                        <td><?= $this->specification['drive_type'] ?></td>
                        <th>Engine Size:</th>
                        <td><?=$this->specification['engine_size'] ?></td>
                    </tr>
                    <tr>
                        <th>Horse Power:</th>
                        <td><?=$this->specification['horsepower'] ?></td>
                        <th>Torque:</th>
                        <td><?=$this->specification['torque'] ?></td>
                    </tr>
                    <tr>
                        <th>Compression Ratio:</th>
                        <td><?=$this->specification['compression_ratio'] ?></td>
                        <th>CamShaft:</th>
                        <td><?=$this->specification['camshaft'] ?></td>
                    </tr>
                    <tr>
                        <th>Engine Type:</th>
                        <td><?=$this->specification['engine_type'] ?></td>
                        <th>Bore:</th>
                        <td><?=$this->specification['bore'] ?></td>
                    </tr>
                    <tr>
                        <th>Stroke:</th>
                        <td><?=$this->specification['stroke'] ?></td>
                        <th>Valves Per Cylinders:</th>
                        <td><?=$this->specification['valves_per_cylinders'] ?></td>
                    </tr>
                    <tr>
                        <th>Fuel Capacity:</th>
                        <td><?=$this->specification['fuel_capacity'] ?></td>
                        <th>EPA MPG (City/Hwy):</th>
                        <td><?=$this->specification['epa_mpg'] ?></td>
                    </tr>
                    <tr>
                        <th>Wheelbase:</th>
                        <td><?=$this->specification['wheelbase'] ?></td>
                        <th>Overall Length:</th>
                        <td><?=$this->specification['overall_length'] ?></td>
                    </tr>
                    <tr>
                        <th>Width:</th>
                        <td><?=$this->specification['width'] ?></td>
                        <th>Length:</th>
                        <td><?=$this->specification['length'] ?></td>
                    </tr>
                    <tr>
                        <th>Curb Weight:</th>
                        <td><?=$this->specification['curb_weight'] ?></td>
                        <th>Leg Room:</th>
                        <td><?=$this->specification['leg_room'] ?></td>
                    </tr>
                    <tr>
                        <th>Head Room:</th>
                        <td><?=$this->specification['head_room'] ?></td>
                        <th>Seating Capacity:</th>
                        <td><?=$this->specification['seating_capacity'] ?></td>
                    </tr>
                    <tr>
                        <th>Cargo Capacity:</th>
                        <td><?=$this->specification['cargo_capacity'] ?></td>
                        <th>Towing Capacity:</th>
                        <td><?=$this->specification['towing_capacity'] ?></td>
                    </tr>
                    <tr>
                        <th>Payload Capacity Truck:</th>
                        <td><?=$this->specification['payload_capacity_truck'] ?></td>
                        <th>Gross Weight Truck:</th>
                        <td><?=$this->specification['gross_weight_truck'] ?></td>
                    </tr>
                    <tr>
                        <th>Tires:</th>
                        <td><?=$this->specification['tires'] ?></td>
                    </tr>
                </table>
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
            </div>
        </div>
    </div>
<?php endforeach; ?>
