<?php $general = new general_model(); ?>
<div class="container">
    <div class="jumbotron col-12">
        <h3 class="text-center text-primary">Used Cars for Sale</h3>
        <div class="col-12">
            <nav class="nav nav-pills justify-content-center" role="tablist">
                <a class="nav-link active" id="byMakeModelTab" data-toggle="tab" role="tab" href="#byMakeModel">Make/Model</a>
                <a class="nav-link" id="byTypeTab" data-toggle="tab" role="tab" href="#byType">Type</a>
            </nav>
            <div class="tab-content my-3" >
                <div class="tab-pane fade show active" id="byMakeModel">
                    <div class="row">
                        <?php $x=0;?>
                        <?php foreach ($this->makes as $key => $value): ?>
                            <div class="col-3 p-3 <?= ($x > 7) ? 'toggleRest' : '' ?>" style="<?= ($x > 7) ? 'display:none' : '' ?>" >
                                <b>
                                    <a href="<?= URL ?>cars/<?= urlencoder::code('_',$value['make']) ?>">
                                        <?= ucfirst($value['make']); ?>
                                    </a>
                                </b>
                                <hr />
                                <?php $y = 0; ?>
                                <ul class="list-unstyled">
                                    <?php foreach($general->get_models($value['id'], 'all') as $k => $v): ?>
                                        <?php if($y < 3): ?>
                                            <li>
                                                <a href="<?= URL ?>cars/<?= urlencoder::code('_',$value['make']) ?>/<?= urlencoder::code('_',$v['model']) ?>">
                                                    <?= ucfirst($v['model']); ?>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php $y++ ?>
                                    <?php endforeach; ?>
                                    <li>

                                        <a style="text-decoration: underline"  href="<?= URL ?>cars/<?= urlencoder::code('_',$value['make']) ?>">
                                            See All <?= ucfirst($value['make']); ?> Models.
                                        </a>
                                    </li>
                                </ul>


                            </div>
                            <?php $x++; ?>
                        <?php endforeach; ?>
                        <div class="col-12 text-center">
                            <button class="btn btn-secondary toggleRest" type="button" onclick="$('.toggleRest').toggle()">SHOW ALL</button>
                            <button class="btn btn-secondary toggleRest" style="display: none" type="button" onclick="$('.toggleRest').toggle()">SHOW LESS</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="byType">
                    <div class="row">
                        <?php foreach ($this->types as $key => $value): ?>
                            <div class="col-4 p-3 text-center">
                                <a href="<?= URL ?>research/<?= urlencoder::code('_', $value['type']) ?>">
                                    <div class="col-12">
                                        <img class="img-responsive m-2" src="<?= URL.$value['img'] ?>" /><br />
                                        <?= $value['type']; ?>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
