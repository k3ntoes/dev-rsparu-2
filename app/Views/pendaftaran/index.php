<?= $this->extend('template/index') ?>

<!-- View CSS -->
<?= $this->section('view_css') ?>

<?= $this->endSection() ?>
<!-- View CSS -->

<!-- View Content -->
<?= $this->section('view_content') ?>

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <h4 class="box-title">Form Input</h4>
        <?= $this->include('pendaftaran/form_input') ?>
    </div>
</div>

<div class="col-lg-6 col-xs-12">
    <div class="box-content card white">
        <?= $this->include('pendaftaran/form_cari') ?>
    </div>

    <div class="box-content card white">
        <?= $this->include('pendaftaran/riwayat') ?>
    </div>
</div>

<?= $this->endSection() ?>
<!-- View Content -->


<!-- View JS -->
<?= $this->section('view_js') ?>
<script defer type="module" src="/assets/custom/js/pendaftaran/script.js"></script>
<script defer type="module" src="/assets/custom/js/pendaftaran/cari.js"></script>
<script defer type="module" src="/assets/custom/js/pendaftaran/kunjungan.js"></script>
<?= $this->endSection() ?>
<!-- View JS -->