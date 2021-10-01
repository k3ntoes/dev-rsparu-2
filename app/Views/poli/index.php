<?php $this->extend('template/index') ?>

<!-- View CSS -->
<?php $this->section('view_css') ?>

<?php $this->endSection() ?>
<!-- View CSS -->

<!-- View Content -->
<?php $this->section('view_content') ?>

<div class="row row-inline-block small-spacing">
    <div class="col-lg-12">
        <div class="box-content bordered primary">
            <h4 class="box-title">Daftar Tunggu</h4>
            <?= $this->include('daftartunggu/index') ?>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="box-content bordered warning">
            <?= $this->include('poli/form_input') ?>
        </div>

        <div class="box-content card white">
        </div>
    </div>
</div>

<?php $this->endSection() ?>
<!-- View Content -->


<!-- View JS -->
<?php $this->section('view_js') ?>

<?php $this->endSection() ?>
<!-- View JS -->