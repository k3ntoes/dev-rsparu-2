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

            <div class="card-content" id="formTensi">
                <div class="card-content">
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" id='liTensi'><a href="#iTensi" aria-controls="iTensi" role="tab" data-toggle="tab">Tensi</a></li>
                        <li role="presentation" id='liRiwayat'><a href="#iRiwayat" aria-controls="iRiwayat" role="tab" data-toggle="tab">Riwayat</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="iTensi">
                            <?= $this->include('tensi/form_input') ?>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="iRiwayat">
                            <?= $this->include('tensi/form_riwayat') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>
<!-- View Content -->


<!-- View JS -->
<?php $this->section('view_js') ?>
<script type="module" src="/assets/custom/js/tensi/script-tensi.js"></script>
<?php $this->endSection() ?>
<!-- View JS -->