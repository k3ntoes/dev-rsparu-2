<form action="#" id="frmRiwayat" method="post" class="form-horizontal" data-toggle="validator" role="form">
    <h4 class="col-sm-12 text-center"><b>Riwayat</b></h4>
    <hr class="garisBawah">

    <div class="form-group">
        <label for="rw_norm" class="col-sm-3">Norm.</label>
        <div class="col-sm-2">
            <input type="text" name="rw_norm" maxlength="6" class="form-control input-sm" id="rw_norm" placeholder="NO RM" readonly="" required="">
        </div>
    </div>
    <hr class="garisBawah">

    <?= $this->include('tensi/riwayat/r_1_cacat') ?>
    <?= $this->include('tensi/riwayat/r_2_alat_bantu') ?>
    <?= $this->include('tensi/riwayat/r_3_penyakit_dahulu') ?>
    <?= $this->include('tensi/riwayat/r_4_pengobatan') ?>
    <?= $this->include('tensi/riwayat/r_5_penyakit_keluarga') ?>
    <?= $this->include('tensi/riwayat/r_6_alergi') ?>
    <?= $this->include('tensi/riwayat/r_7_operasi') ?>
    <?= $this->include('tensi/riwayat/r_8_kebiasaan') ?>
    <?= $this->include('tensi/riwayat/r_9_pekerjaan') ?>

    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-3">
            <input type="hidden" name="ins_rw" id="ins_rw" value="0">
        </div>

        <div class="col-sm-6 text-right">
            <div class="btn-group" role="group" aria-label="Basic example" id="bt_grup">
                <!--<span class="btn btn-danger" id="batal" onclick="reset_form_riwayat();" >Batal</span>-->
                <button class="btn btn-xs btn-success" id="simpanRiwayat">SIMPAN</button>
            </div>
        </div>
    </div>
</form>