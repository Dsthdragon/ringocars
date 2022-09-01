<?php
$active = null;
if(isset($this->dashPage)){
    $active = $this->dashPage;
}
?>
<div class="row" style="padding: 1rem;">

        <ul class="nav nav-pills nav-fill flex-column nav-justified col-md-2 hidden-sm-down">
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'index')? 'active' : '' ?>" href="<?= URL ?>dashboard/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'appointments')? 'active' : '' ?>" href="<?= URL ?>dashboard/appointments">My Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'saved')? 'active' : '' ?>" href="<?= URL ?>dashboard/saved">Saved Cars</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>dashboard/logout">Log Out</a>
            </li>
        </ul>

        <ul class="nav nav-pills nav-fill nav-justified hidden-md-up">
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'index')? 'active' : '' ?>" href="<?= URL ?>dashboard/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'appointments')? 'active' : '' ?>" href="<?= URL ?>dashboard/appointments">My Appointments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= ($active == 'saved')? 'active' : '' ?>" href="<?= URL ?>dashboard/saved">Saved Cars</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>dashboard/logout">Log Out</a>
            </li>
        </ul>
        <div class="col-sm-12 col-md-10">
            <?php $this->render($this->dashPageLink) ?>
        </div>
</div>
