<div class="form-group">
    <label for="tgltrans" class="col-lg-1">Tanggal</label>
    <div class="col-lg-2">
        <div class="input-group date" data-date-format="yyyy-mm-dd">
            <input type="text" name="tgltrans" id="tgltrans" class="form-control input-sm datepicker" required="required" placeholder="yyyy-mm-dd" value="<?= date('Y-m-d') ?>" readonly="">
            <span class="input-group-addon bg-info text-white">
                <i class="fa fa-calendar"></i>
            </span>
        </div>
    </div>
    <label for="jamdaftar" class="col-lg-1 col-form-label text-right">Jam Daftar</label>
    <div class="col-lg-1">
        <input type="text" name="jamdaftar" id="jamdaftar" class="form-control input-sm" required="required" placeholder="hh:mm::ss" value="<?php echo date("h:i:s"); ?>" readonly="">
    </div>
</div>

<hr class="garisBawah">

<div class="form-group">
    <label for="norm" class="col-lg-1">Norm.</label>
    <div class="col-lg-2">
        <div class="input-group input-group-sm">
            <input type="text" name="norm" maxlength="6" class="form-control input-sm" id="norm" placeholder="NO RM" required="required">
            <div class="input-group-addon btn">
                <span class="glyphicon glyphicon-search" id="find_norm_tensi"></span>
            </div>
        </div>
    </div>

    <label for="notrans" class="col-lg-1 text-right">No. Trans.</label>
    <div class="col-lg-2">
        <input type="text" id="notrans" name="notrans" class="form-control" placeholder="No. Transaksi" readonly="" required="">
    </div>
</div>

<hr class="garisBawah">

<div class="form-group">
    <label class="col-lg-2">Sumber</label>
    <div class="col-lg-3">
        <ul class="list-inline">
            <li>
                <div class="radio info">
                    <input type="radio" name="smbrData" id="smbrData0" value="0" checked>
                    <label for="smbrData0">Pasien Sendiri</label>
                </div>
            </li>
            <li>
                <div class="radio info">
                    <input type="radio" name="smbrData" id="smbrData1" value="1">
                    <label for="smbrData1">Orang Lain</label>
                </div>
            </li>
        </ul>
    </div>

    <div class="col-lg-2">
        <input type="text" id="ketSmbrData" name="ketSmbrData" class="form-control" placeholder="Nama Sumber">
    </div>

    <label for="hubSmbrData" class="col-lg-1">Hubungan</label>
    <div class="col-lg-2">
        <input type="text" id="hubSmbrData" name="hubSmbrData" class="form-control" placeholder="Hubungan">
    </div>
</div>

<div class="form-group">
    <label class="col-lg-2" for="">Masuk Ke RS</label>
    <div class="col-lg-3">
        <ul class="list-inline">
            <li>
                <div class="radio info">
                    <input type="radio" name="statRujuk" id="statRujuk0" value="0" checked>
                    <label for="statRujuk0">Datang Sendiri</label>
                </div>
            </li>
            <li>
                <div class="radio info">
                    <input type="radio" name="statRujuk" id="statRujuk1" value="1">
                    <label for="statRujuk1">Rujuk Dari Sendiri</label>
                </div>
            </li>
        </ul>
    </div>
    <div class="col-lg-2">
        <input type="text" id="ketStatRujuk" name="ketStatRujuk" class="form-control" placeholder="Rujukan Dari">
    </div>
</div>

<hr class="garisBawah">