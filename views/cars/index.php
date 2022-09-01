<?php $general = new general_model(); ?>
<?php if($this->activePage == "used"): ?>
    <input type="hidden" name="used" value="1" form="searchForCars" class="custom-control-input searchForCars searchForCarsPack updateModels" />
<?php endif; ?>
    <input type="hidden" id="checkCompare" value="<?= URL ?>general_json/checkCompare"/>
<div class="container">
    <div class="row">
        <div class="col-md-4" id="accordion" role="tablist">
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForMake">
                    <a  href="#makeCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Make
                        </h5>
                    </a>
                </div>
                <div class="collapse show" id="makeCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body p-3">
                        <input type="hidden" value="<?= URL ?>search_json/updateModels" id="searchModelURL">
                        <ul class="list-unstyled" style="height: 14rem; overflow-y: scroll">
                            <?php $x = 0; ?>
                            <?php foreach($this->makes as $key => $value): ?>
                                <li class="pl-4 <?= ($x > 6) ? 'toggleMakeRest' : '' ?>" style="<?= ($x > 6) ? 'display:none' : '' ?>" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" name="makes[]" <?= (isset($_POST['makes']) && in_array($value['id'], $_POST['makes'] )) ? 'checked' : '' ?> value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCars searchForCarsPack updateModels" id="makeCheckBox<?= $value['id']; ?>"/>
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#makeCheckBox<?= $value['id']; ?>').click();">
                                            <?= ucfirst($value['make']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                        <div class="text-center">
                            <hr />
                            <button class="btn btn-secondary toggleMakeRest" type="button" onclick="$('.toggleMakeRest').toggle()">SHOW ALL</button>
                            <button class="btn btn-secondary toggleMakeRest" style="display: none" type="button" onclick="$('.toggleMakeRest').toggle()">SHOW LESS</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForModel">
                    <a class="collapsed" href="#modelCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Model
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="modelCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-group" style="height: 14rem; overflow-y: scroll" id="modelsBox">
                            <?php foreach($this->models as $key => $value): ?>
                                <?php $modelsCars = $general->get_model_cars($value['id'], 'count') ?>
                                <?php if($modelsCars > 0 ): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <label class="custom-control custom-checkbox" style="display: block">
                                            <input type="checkbox" name="models[]" <?= (isset($_POST['models']) && in_array($value['id'], $_POST['models'] )) ? 'checked' : '' ?>  value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCars searchForCarsPack" id="modelCheckBox<?= $value['id']; ?>"/>
                                            <span class="custom-control-indicator"></span>
                                            <label class="form-check-label" onclick="$('#modelCheckBox<?= $value['id']; ?>').click();">
                                                <?= ucfirst($value['model']) ?>
                                            </label>
                                        </label>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForPrice">
                    <a class="collapsed" href="#priceCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Price
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="priceCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col ">
                                <label class="col-form-label p-2">Minimun Price</label>
                                <input type="text" placeholder="No Min" value="<?= (isset($_POST['min_price'])) ? $_POST['min_price'] : '' ?>" name="min_price" form="searchForCars" class="form-control searchForCars searchForCarsPack" />
                            </div>
                            <div class="col">
                                <label class="col-form-label p-2">Maximun Price</label>
                                <input type="text" placeholder="No Max"value="<?= (isset($_POST['max_price'])) ? $_POST['max_price'] : '' ?>" name="max_price" form="searchForCars" class="form-control  searchForCars searchForCarsPack" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForYear">
                    <a class="collapsed" href="#yearCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Years
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="yearCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col ">
                                <label class="col-form-label p-2">Minimun Year</label>
                                <input type="text" placeholder="No Min"value="<?= (isset($_POST['min_year'])) ? $_POST['min_year'] : '' ?>" name="min_year" form="searchForCars" class="form-control  searchForCars searchForCarsPack" />
                            </div>
                            <div class="col">
                                <label class="col-form-label p-2">Maximun Year</label>
                                <input type="text" placeholder="No Max" name="max_year" form="searchForCars" class="form-control  searchForCars searchForCarsPack" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForType">
                    <a class="collapsed" href="#typeCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Types
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="typeCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row p-2 card-columns">
                            <?php foreach ($this->types as $key => $value): ?>
                                <div class="col-6 p-3 text-center">
                                    <div class="card h-100 typeCard  <?= (isset($_POST['type']) && in_array($value['id'], $_POST['type'] )) ? 'card-selected-blue' : '' ?> " data-id="<?= $value['id']; ?>">
                                        <div class="col-12 card-body">
                                            <img class="img-responsive m-2" src="<?= URL.$value['img'] ?>" />
                                            <?= $value['type']; ?>
                                            <input type="checkbox" style="display: none" id="typeCheckBox<?= $value['id']; ?>" name="type[]" <?= (isset($_POST['type']) && in_array($value['id'], $_POST['type'] )) ? 'checked' : '' ?>  value="<?= $value['id']; ?>" class=" searchForCars searchForCarsPack" form="searchForCars" />
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForMilage">
                    <a class="collapsed" href="#milageCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Milage
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="milageCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <div class="row p-2">
                            <div class="col ">
                                <label class="col-form-label p-2">Maximum Milage</label>
                                <input type="text" placeholder="No Max" value="<?= (isset($_POST['max_milage'])) ? $_POST['max_milage'] : '' ?>" name="max_milage" form="searchForCars" class="form-control  searchForCars searchForCarsPack" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForFeature">
                    <a class="collapsed" href="#featureCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Features
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="featureCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <input type="hidden" value="<?= URL ?>search_json/updateFeature" id="searchFeaturesURL">
                        <ul class="list-unstyled" style="height: 14rem; overflow-y: scroll" id="featureBox">
                            <?php $x = 0; ?>
                            <?php foreach($this->features as $key => $value): ?>
                                <li class="pl-4" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" name="features[]" <?= (isset($_POST['features']) && in_array($value['id'], $_POST['features'] )) ? 'checked' : '' ?>  value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input  searchForCars searchForCarsPackByFeature"  id="featureCheckBox<?= $value['id']; ?>"/>
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#featureCheckBox<?= $value['id']; ?>').click() ">
                                            <?= ucfirst($value['feature']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForExterior">
                    <a class="collapsed" href="#exteriorCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Exterior Color
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="exteriorCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled" style="height: 14rem; overflow-y: scroll">
                            <?php $x = 0; ?>
                            <?php foreach($this->colors as $key => $value): ?>
                                <li class="pl-4 pt-2" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" name="exterior_color[]" value="<?= $value['id'] ?>" form="searchForCars" <?= (isset($_POST['exterior_color']) && in_array($value['id'], $_POST['exterior_color'] )) ? 'checked' : '' ?>  class="custom-control-input searchForCarsPack searchForCars" id="extColorCheckBox<?= $value['id']; ?>" />
                                        <span class="custom-control-indicator"></span>

                                        <label class="form-check-label" onclick="$('#extColorCheckBox<?= $value['id']; ?>').click() ">
                                            <span style="padding:1px 10px; margin-right: 10px; border-radius: 50%; border: 1px solid ; background-color: <?= $value['color'] ?>"></span>
                                            <?= ucfirst($value['color']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForCylinders">
                    <a class="collapsed" href="#cylindersCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Cylinders
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="cylindersCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php $x = 0; ?>
                            <?php foreach($this->cylinders as $key => $value): ?>
                                <li class="pl-4 pt-2" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" <?= (isset($_POST['cylinders']) && in_array($value['id'], $_POST['cylinders'] )) ? 'checked' : '' ?>  name="cylinders[]" value="<?= $value['id'] ?>" id="cylindersCheckBox<?= $value['id']; ?>" form="searchForCars" class="custom-control-input searchForCarsPack searchForCars"/>
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#cylindersCheckBox<?= $value['id']; ?>').click()" >
                                            <?= ucfirst($value['cylinders']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForSize">
                    <a class="collapsed" href="#sizeCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Sizes
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="sizeCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php $x = 0; ?>
                            <?php foreach($this->sizes as $key => $value): ?>
                                <li class="pl-4 pt-2" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" <?= (isset($_POST['size']) && in_array($value['id'], $_POST['size'] )) ? 'checked' : '' ?>  name="size[]" value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCarsPack searchForCars" id="sizesCheckBox<?= $value['id']; ?>"/>
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#sizesCheckBox<?= $value['id']; ?>').click() ">
                                            <?= ucfirst($value['size']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForTransmission">
                    <a class="collapsed" href="#transmissionCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Transmission
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="transmissionCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php $x = 0; ?>
                            <?php foreach($this->transmissions as $key => $value): ?>
                                <li class="pl-4 pt-2" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" <?= (isset($_POST['transmission']) && in_array($value['id'], $_POST['transmission'] )) ? 'checked' : '' ?> name="transmission[]" value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCarsPack searchForCars" id="transmissionCheckBox<?= $value['id']; ?>" />
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#transmissionCheckBox<?= $value['id']; ?>').click()" >
                                            <?= ucfirst($value['transmission']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card m-2">
                <div class="card-header" role="tab" id="headingForInterior">
                    <a class="collapsed" href="#interiorCollapse" data-toggle="collapse">
                        <h5 class="card-title">
                            Interior Color
                        </h5>
                    </a>
                </div>
                <div class="collapse" id="interiorCollapse" role="tabpanel" data-parent="#accordion">
                    <div class="card-body">
                        <ul class="list-unstyled" style="height: 14rem; overflow-y: scroll">
                            <?php $x = 0; ?>
                            <?php foreach($this->colors as $key => $value): ?>
                                <li class="pl-4 pt-2" >
                                    <label class="custom-control custom-checkbox" style="display: block">
                                        <input type="checkbox" name="interior_color[]" <?= (isset($_POST['interior_color']) && in_array($value['id'], $_POST['interior_color'] )) ? 'checked' : '' ?>  value="<?= $value['id'] ?>" form="searchForCars" class="custom-control-input searchForCars searchForCarsPack" id="intColorCheckBox<?= $value['id']; ?>" />
                                        <span class="custom-control-indicator"></span>
                                        <label class="form-check-label" onclick="$('#intColorCheckBox<?= $value['id']; ?>').click() ">
                                            <span style="padding:1px 10px; margin-right: 10px; border-radius: 50%; border: 1px solid ; background-color: <?= $value['color'] ?>"></span>
                                            <?= ucfirst($value['color']) ?>
                                        </label>
                                    </label>
                                </li>
                                <?php $x++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8" id="replaceCarBox">

            <?php
            $data = paginator::paginate($this->cars, 5, $this->currentPage);
            $count = $data[1];
            $data = $data[0];
            ?>
            <?php foreach($data as $key => $value ): ?>
                <div class="card mt-2 mb-2">
                    <div class="card-header">
                        <h4 class="card-title">
                            <?= $value['title']; ?>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row p-3">
                            <div class="col-sm-12 col-md-4">
                                <img style="width: 100%;" src="<?= imagedisplay::display($value['thumb'], 'car') ?>" class="img-thumbnail" />
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="text-muted"><?= $value['negotiable'] ? 'Negotiable' : 'Fixed Price' ?></h6>
                                        <h4 class="text-primary"><?= MONEY.number_format($value['price']); ?></h4>
                                    </div>
                                    <div class="col-6 text-right pr-5">
                                        <h6 class="text-muted">Milage</h6>
                                        <h4 class="text-primary"><?= number_format($value['milage']); ?>K</h4>
                                    </div>
                                    <div class="col-12">
                                        <h5 class="text-primary">Features</h5>
                                        <?php $features = ""; ?>
                                        <?php foreach($general->getCarFeatures($value['id']) as $k => $v): ?>
                                            <?php $features .= ', '.$v['feature_name']; ?>
                                        <?php endforeach; ?>
                                        <?php $features = trim($features, ', '); ?>
                                        <?= $features ?>
                                        <div class="row p-2">
                                            <hr  />
                                            <div id="notificationSaveBox_<?= $value['id']; ?>" class="col-12">
                                            </div>
                                            <a href="<?= URL ?>car/<?= $value['id'].'-'.urlencoder::code('_', $value['title']) ?>" class="btn btn-secondary col m-2">
                                                VIEW
                                            </a>
                                            <button class="btn btn-secondary col m-2 savedTheCar"  value="<?= URL.'general_json/compare/' .$value['id']; ?>" data-id="<?= $value['id']; ?>">
                                                COMPARE
                                            </button>
                                            <?php if(session::get('loggedIn') && !session::get('admin')): ?>
                                                <button class="btn btn-secondary col m-2 savedTheCar" value="<?= URL.'general_json/save/' .$value['id']; ?>" data-id="<?= $value['id']; ?>" >
                                                    SAVE
                                                </button>
                                            <?php else: ?>
                                                <button href="<?= URL ?>login" class="btn btn-secondary col m-2">
                                                    LOGIN
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="col-12 p-2 text-center" style="color: #fff">
                <?php

                if(!empty($this->make) && !empty($this->model)){
                    $cars = "cars/".urlencoder::code('_', $this->make['make']).'/'.urlencoder::code('_', $this->model['model']).'/';
                } if(!empty($this->make)){
                    $cars = "cars/".urlencoder::code('_', $this->make['make']).'/empty/';
                } else {
                    $cars = "cars/empty/empty/";

                }
                ?>
                <hr />
                <?php if($this->currentPage > 2): ?>
                    <a  class="btn btn-primary paginateCars" data-current-page="1">First</a>
                <?php endif; ?>
                <?php if($this->currentPage > 1): ?>
                    <a  class="btn btn-primary paginateCars" data-current-page="<?= $this->currentPage - 1 ?>"><span class="fa fa-arrow-left" ></span></a>
                <?php endif; ?>
                <?php if($this->currentPage < $count): ?>
                    <a  class="btn btn-primary paginateCars" data-current-page="<?= $this->currentPage + 1 ?>"><span class="fa fa-arrow-right" ></span></a>
                <?php endif; ?>
                <?php if($this->currentPage < $count - 1): ?>
                    <a  class="btn btn-primary paginateCars" data-current-page="<?= $count; ?>">Last</a>
                <?php endif; ?>
            </div>

            <script>
                $('.paginateCars').click(function(){
                    $("#replaceCarBox").html("<div class='p-5 text-center'><span class='fa fa-refresh fa-spin fa-5x'></span></div>");
                    var currentPage = $(this).data('current-page');
                    var data = $(".searchForCars:input").serializeArray();
                    var url = $("#searchURL").val();
                    $.post(url +'/index/'+currentPage, data, function(e){
                        $("#replaceCarBox").html(e);
                    });
                })
            </script>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.updateModels').change(function(){
            $("#modelsBox").html("<div class='p-5 text-center'><span class='fa fa-refresh fa-spin fa-5x'></span></div>");
            var data = $(".searchForCars:input").serializeArray();
            var url = $("#searchModelURL").val();
            $.post(url, data, function(e){
                $("#modelsBox").html(e);
            });
        })
        $("#accordion").on('change', '.searchForCarsPack:input', function(){
            $("#featureBox").html("<div class='p-5 text-center'><span class='fa fa-refresh fa-spin fa-5x'></span></div>");
            var data = $(".searchForCars:input").serializeArray();
            var url = $("#searchFeaturesURL").val();
            $.post(url, data, function(e){
                $("#featureBox").html(e);
            });
            searchCars();
            

        })
        $("#accordion").on('change', '.searchForCarsPackByFeature:input', function(e){
            e.stopPropagation()
            searchCars();
        })
        $("#replaceCarBox").on('click', '.savedTheCar', function(e){
            var url = $(this).val();
            var id = $(this).data('id');
            $.get(url, function(o){
                $("#notificationSaveBox_" + id).html(o);
            })
            var url1 = $("#checkCompare").val();

            $.get(url1, function(o){
                if(o == true){
                    console.log("Show BUtton");
                    $("#compareButton").show();
                } else {
                    console.log("Hide BUtton");
                    $("#compareButton").hide();
                }
            })
        })
        $('.typeCard').click(function(){
            var id = $(this).attr("data-id");
            var checked = $("#typeCheckBox"+id).prop('checked');

            $("#typeCheckBox"+id).attr('checked', checked ? false : true);
            $(this).toggleClass('card-selected-blue');
            searchCars();
        });

        function searchCars(){
            $("#replaceCarBox").html("<div class='p-5 text-center'><span class='fa fa-refresh fa-spin fa-5x'></span></div>");
            var data = $(".searchForCars:input").serializeArray();
            var url = $("#searchURL").val();
            $.post(url, data, function(e){
                $("#replaceCarBox").html(e);
            });
        }
    });
</script>