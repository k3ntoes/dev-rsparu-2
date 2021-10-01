<h3 class="box-title">Form Input Rontgen</h3>

<hr class="garis-bawah">

<?= $this->include('biodata/index') ?>
<form id="frmInputRontgen" method="post" class="form-horizontal" onsubmit="return false;">
    <?= $this->include('rontgen/form_input/i_1_transaksi') ?>
    <?= $this->include('rontgen/form_input/i_2_hasil_potret') ?>
    <?= $this->include('rontgen/form_input/i_3_petugas') ?>

    <div class="form-group">
        <div class="col-sm-3">
            <input type="hidden" id="updRontgen" name="updRontgen" value="0">
        </div>
        <div class="col-sm-3"></div>

        <div class="col-sm-6 text-right">
            <div class="btn-group" role="group" aria-label="Basic example" id="rst">
                <span class="btn btn-danger" id="rst-bt" onclick="batal();">Batal</span>
                <button class="btn btn-success" id="save-bt">SIMPAN</button>
            </div>
        </div>
    </div>
</form>