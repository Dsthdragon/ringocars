<?php
$current = "";
if(isset($this->currentLink)) {
    $current = $this->currentLink;
}
?>
<div class="row">
    <div class="col-md-2 nav nav-pills flex-column adminNavLink" style="margin-left:0; padding-right:0; border-style: solid; border-width: 1px;  border-color: #ddd">

        <div class="nav-item">
            <a class="nav-link <?= ($current == "profile" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/profile">Profile</a>
        </div>
        <div class="nav-item">
            <a class="nav-link <?= ($current == "stores" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/stores">Stores</a>
        </div>
        <div class="nav-item">
            <a class="nav-link <?= ($current == "cars" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/cars">Cars</a>
        </div>
        <div class="nav-item">
            <a class="nav-link <?= ($current == "appointments" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/appointments">Appointment</a>
        </div>

        <div class="nav-item">
            <a class="nav-link <?= ($current == "adminstrators" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/adminstrators">Adminstrators</a>
        </div>
        <div class="nav-item">
            <a class="nav-link <?= ($current == "brands" ) ? 'active' : '' ?>" href="<?= URL ?>admin/brands">Brands</a>
        </div>

        <div class="nav-item">
            <a class="nav-link collapsed dropdown-toggle  <?= ($current == "properties" ) ? 'active' : '' ?>" data-target="#propertiesNav" data-toggle="collapse" href="#" role="button" aria-haspopup="true" aria-expanded="false">Properties</a>
            <div class="collapse <?= ($current == "properties" ) ? 'show' : '' ?>" role="navigation" id="propertiesNav">
                <a class="nav-link" href="<?= URL ?>admin/colors" >Colors</a>
                <a class="nav-link" href="<?= URL ?>admin/cylinders" >Cylinders</a>
                <a class="nav-link" href="<?= URL ?>admin/features">Features</a>
                <a class="nav-link" href="<?= URL ?>admin/sizes">Size</a>
                <a class="nav-link" href="<?= URL ?>admin/types">Types</a>
                <a class="nav-link" href="<?= URL ?>admin/transmissions">Transmission</a>
            </div>
        </div>
        <div class="nav-item">
            <a class="nav-link <?= ($current == "index" ) ? 'active' : '' ?>" href="<?= URL  ?>admin/logout">Logout</a>
        </div>
    </div>
    <div class="col-md-10" style="border-style: solid; border-width: 1px; border-left: 0; padding: 30px; border-color: #ddd">

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade show active">
