<form id="frmTensi" method="post" class="form-horizontal" onsubmit="return false;">
    <?= $this->include('tensi/form_input/i_0_sumber') ?>

    <h5 class="col-sm-12 text-center"><b>Pengkajian (Assesmen)</b></h5>

    <hr class="garisBawah">

    <?= $this->include('tensi/form_input/i_1_pengukuran_vital') ?>

    <?= $this->include('tensi/form_input/i_2_skrining_nutrisi') ?>

    <?= $this->include('tensi/form_input/i_3_skrining_fungsional') ?>

    <?= $this->include('tensi/form_input/i_4_hasil_periksa_sebelumnya') ?>

    <?= $this->include('tensi/form_input/i_5_anamnesa') ?>

    <?= $this->include('tensi/form_input/i_6_petugas') ?>

    <hr class="garisBawah">

    <div class="form-group">
        <div class="col-sm-3">
            <input type="hidden" name="updTensi" id="updTensi" value="0">
            <input type="hidden" name="f_riwayat" id="f_riwayat" value="0">
        </div>
        <div class="col-sm-3"></div>

        <div class="col-sm-6 text-right">
            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" id="bt_grup">
                <span class="btn btn-xs btn-danger" id="batal_tensi">Batal</span>
                <button class="btn btn-xs btn-success" id="simpanTensi" tabindex="34">SIMPAN</button>
            </div>
        </div>
    </div>

</form>