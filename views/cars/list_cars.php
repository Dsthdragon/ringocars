

<?php
$general = new general_model();
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
                                    <button class="btn btn-secondary col savedTheCar m-2"  name="link" value="<?= URL.'general_json/save/' .$value['id']; ?>" data-id="<?= $value['id']; ?>" >
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
<div class="col-12 pt-2 text-center" style="color: #fff;">
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
        var data = $(".searchForCarsPack:input").serializeArray();
        var url = $("#searchURL").val();
        $.post(url +'/index/'+currentPage, data, function(e){
            $("#replaceCarBox").html(e);
        });
    })
</script>