<?php $this->extend('template/index') ?>

<!-- View CSS -->
<?php $this->section('view_css') ?>

<?php $this->endSection() ?>
<!-- View CSS -->

<!-- View Content -->
<?php $this->section('view_content') ?>

<div class="col-lg-12">
    <div class="box-content bordered primary">
        <h4 class="box-title">Daftar Tunggu Rontgen</h4>
        <hr class="garis-bawah">
        <?= $this->include('daftartunggu/tunggu_rontgen') ?>
    </div>
</div>

<div class="col-lg-12">
    <div class="box-content bordered warning">
        <?= $this->include('rontgen/form_input') ?>
    </div>
</div>

<?php $this->endSection() ?>
<!-- View Content -->


<!-- View JS -->
<?php $this->section('view_js') ?>

<?php $this->endSection() ?>
<!-- View JS -->