<?php $this->extend('template/index') ?>

<!-- View CSS -->
<?php $this->section('view_css') ?>

<?php $this->endSection() ?>
<!-- View CSS -->

<!-- View Content -->
<?php $this->section('view_content') ?>

<div class="row row-inline-block small-spacing">
    <div class="col-lg-12">
        <div class="box-content bordered primary" id="tungguPanel">
            <h4 class="box-title">DaftarTunggu</h4>
            <hr class="garis-bawah">
            <?= $this->include('daftartunggu/index') ?>
        </div>
    </div>

    <div class="col-lg-12 col-sm-12">
        <div class="box-content bordered warning" id="formPanel">
            <?= $this->include('biodata/index') ?>

            <?= $this->include('poli/form_input') ?>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
<!-- View Content -->


<!-- View JS -->
<?php $this->section('view_js') ?>
<?php if (intval(user()->id) == 2) : ?>
    <script type="module" src="/assets/custom/js/poli/poli_umum.js"></script>
<?php else : ?>
    <script type="module" src="/assets/custom/js/poli/poli_tb.js"></script>
<?php endif ?>
<?php $this->endSection() ?>
<!-- View JS -->