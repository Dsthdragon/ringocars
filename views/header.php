<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        <?=(isset($this->title))?$this->title :NAME; ?>
    </title>

    <!-- Bootstrap core CSS -->

    <link rel="stylesheet" href="<?php echo URL; ?>public/font-awesome/css/font-awesome.css">

    <link rel="shortcut icon" href="<?php echo URL; ?>public/img/favicon.ico" />
    <link rel="stylesheet" href="<?php echo URL;?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?php echo URL;?>public/css/default.css"/>
    <link rel="stylesheet" href="<?php echo URL;?>public/css/jquery.datetimepicker.css"/>


    <script src="<?php echo URL; ?>public/js/jquery.js"></script>

    <script src="<?php echo URL; ?>public/js/tether.min.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.js"></script>

    <script src="<?php echo URL; ?>public/js/default.js" type="text/javascript" ></script>
    <script src="<?php echo URL; ?>public/js/jquery.datetimepicker.js" type="text/javascript" ></script>
    <?php if (isset($this->js)) : ?>

        <?php foreach ($this->js as $js) : ?>
            <script type="text/javascript" src="<?= URL ?>views/<?= $js ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php  if (isset($this->css)) : ?>
        <?php foreach ($this->css as $css): ?>
            <link rel="stylesheet" href="<?= URL ?>views/<?= $css ?>"/>
        <?php endforeach; ?>
    <?php endif; ?>
    <style type="text/css">
</style>
</head>
<body>
    <?php session::init();
    $active = null;
    if(isset($this->activePage)){
        $active = $this->activePage;
    }
    ?>
    <style> .pop .popover { margin-top:7px; } </style>
    <form action="<?= URL ?>cars" method="POST" id="usedOnly" style="display: none;">
        <input type="hidden" name="form" form="usedOnly" value="usedOnly">
        <input type="hidden" name="used" form="usedOnly" value="1">
        <button form="usedOnly" type="submit" id="submitUsedOnly">send</button>
    </form>

    <div class="text-right clearfix" style="background-color: #f7f7f9;">
        <ul class="nav  pull-right mr-5">
            <li class="nav-link">
                <a href="<?= URL ?>dashboard">
                    <span class="fa fa-user"></span> <span class="hidden-sm-down">Account</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="<?= URL ?>dashboard/appointments">
                    <span class="fa fa-clock-o"></span> <span class="hidden-sm-down">Appointments</span>
                </a>
            </li>
            <li class="nav-link">
                <a href="<?= URL ?>dashboard/saved">
                    <span class="fa fa-car"></span> <span class="hidden-sm-down">Saved Cars</span>
                </a>
            </li>
        </ul>
    </div>
    <nav class="navbar navbar-toggleable-md navbar-inverse sticky-top" style="background-color: #672D93;">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="<?= URL ?>">
            <img src="<?= URL ?>public/img/logo.png" class="img-responsive">
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="dropdown nav-item <?= ($active == "cars") ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="<?= URL; ?>cars">CARS FOR SALE</a>
                    <div class="dropdown-menu text-left">
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;">
                                <div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Cars For Sale</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Transfer</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div>  
                                <span class="dropdown-link-text">Service Plan</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="dropdown nav-item <?= ($active == "sells") ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle"  data-toggle="dropdown" href="#">SELL YOUR CAR</a>
                    <div class="dropdown-menu text-left">
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>sell_car" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Schedule Your Free Appraisal</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>sell_car#what_to_bring_in" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">What to Bring in</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>sell_car#what_determine_your_offer" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div>  
                                <span class="dropdown-link-text">What Determine Our Offer</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="nav-item <?= ($active == "used") ? 'active' : '' ?>">
                    <a class="nav-link"  href="#" onclick="$('#submitUsedOnly').click()" >USED CARS</a>
                </li>
                <li class="dropdown nav-item <?= ($active == "finance") ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="<?= URL; ?>finance">CAR FINANCE</a>
                    <div class="dropdown-menu text-left">
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Learn About Ringo Finance</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Articles</span>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="dropdown nav-item <?= ($active == "reviews") ? 'active' : '' ?>">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown"  href="<?= URL; ?>reviews">CAR REVIEWS</a>
                    <div class="dropdown-menu text-left">
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div> 
                                <span class="dropdown-link-text">Our Recommendations</span>
                            </a>
                        </div>
                        <div class="dropdown-div">
                            <a class="dropdown-link" href="<?= URL ?>cars" style="display: block;"><div class="pull-right"><span class="fa fa-arrow-right"></span> </div>  
                                <span class="dropdown-link-text">Car Reviews</span>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="form-inline mt-2 mt-md-0" id="searchForCars" method="POST">
                <input type="hidden" value="searchForCars" name="form" form="searchForCars" />
                <input type="hidden" value="<?= URL ?>search_json" id="searchURL" />
                <input class="form-control mr-sm-2" type="text" class="searchForCarsPack" placeholder="Search" name="title" value="<?= (isset($_POST['form'])&& $_POST['form'] == 'searchForCars') ? $_POST['title'] : '' ?>" form="searchForCars">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" form="searchForCars">Search</button>
            </form>
        </div>
    </nav>
    <div style="border-top: 1rem solid #ffff00">
        <div style="padding: 1rem;">
            <?php $this->render('alert') ?>