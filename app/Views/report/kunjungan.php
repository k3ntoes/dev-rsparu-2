<?php $this->extend('template/index') ?>

<?php $this->section('view_content') ?>

<div class="row row-inline-block small-spacing">
    <div class="col-lg-12">
        <div class="box-content bordered primary">
            <h4 class="box-title">Laporan Kunjungan Pasien</h4>
            <hr class="garis-bawah">
            <div class="box-title">
                <div class="form-group">
                    <label for="tgldaftar" class="col-sm-1 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-2" style="min-width: 180px;">
                        <select name="tahun" id="tahun" class="form-control">
                            <?php for ($i = date('Y'); $i > date('Y') - 4; $i--) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button id="cariDaftarTunggu" class="btn btn-xs btn-primary">CARI</button>
                    </div>
                    <div class="col-md-3 hidden" id="src_daftarTunggu">
                        <div class="input-group">
                            <input type="text" value="Sedang Mencari..." readonly="" hidden="" class="form-control" style="background: red; color: white;">
                            <div class="input-group-addon" style="background: red; color: white;">
                                <span class="fa fa-spinner fa-pulse fa-1x"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr class="garis-bawah col-lg-12">
            <div class="col-lg-12">
                <table class="table bordered hovered" id="listKunjungan">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Kabupaten/Kota</th>
                            <th colspan="12" class="text-center">Bulan</th>
                        </tr>
                        <tr>
                            <th>Jan</th>
                            <th>Feb</th>
                            <th>Mar</th>
                            <th>Apr</th>
                            <th>Mei</th>
                            <th>Jun</th>
                            <th>Jul</th>
                            <th>Agust</th>
                            <th>Sept</th>
                            <th>Okt</th>
                            <th>Nov</th>
                            <th>Des</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <tr>
                            <th colspan="2">Jumlah</th>
                            <th id="jml-1">0</th>
                            <th id="jml-2">0</th>
                            <th id="jml-3">0</th>
                            <th id="jml-4">0</th>
                            <th id="jml-5">0</th>
                            <th id="jml-6">0</th>
                            <th id="jml-7">0</th>
                            <th id="jml-8">0</th>
                            <th id="jml-9">0</th>
                            <th id="jml-10">0</th>
                            <th id="jml-11">0</th>
                            <th id="jml-12">0</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection() ?>

<?php $this->section('view_js') ?>
<script type="module" src="/assets/custom/js/report/kunjungan.js"></script>
<?php $this->endSection() ?>