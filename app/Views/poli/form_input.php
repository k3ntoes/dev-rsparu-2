<hr class="garisBawah">
<button id="bRiwayat" class="btn btn-xs btn-block btn-warning" onclick="getRiwayat('');">RIWAYAT</button>
<hr class="garisBawah">

<form id="frmInputPoli" method="post" class="form-horizontal">
    <?= $this->include('poli/form_input/i_transaksi') ?>

    <?= $this->include('poli/form_input/i_1_pemeriksaan_fisik') ?>

    <?= $this->include('poli/form_input/i_2_pemeriksaan_penunjang') ?>

    <?= $this->include('poli/form_input/i_3_diagnosa') ?>

    <?= $this->include('poli/form_input/i_4_tindakan_medis') ?>

    <?= $this->include('poli/form_input/i_5_edukasi') ?>

    <?= $this->include('poli/form_input/i_6_petugas') ?>

    <?= $this->include('poli/form_input/i_7_konsul') ?>

    <?= $this->include('poli/form_input/i_8_poli_tujuan') ?>

    <hr class="garisBawah">

    <div class="form-group">
        <div class="col-sm-3">
            <input type="hidden" id="updPoli" name="updPoli" value="0">
        </div>
        <div class="col-sm-3"></div>

        <div class="col-sm-6 text-right">
            <div class="btn-group" role="group" aria-label="Basic example" id="rst">
                <span class="btn btn-danger" id="batal_poli">Batal</span>
                <button class="btn btn-success" id="save-bt">SIMPAN</button>
            </div>
        </div>
    </div>
</form>