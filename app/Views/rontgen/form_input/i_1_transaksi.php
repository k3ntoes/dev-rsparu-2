<fieldset class="scheduler-border">
    <legend class="scheduler-border">Transaksi</legend>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="tgltrans" class="col-lg-4 col-sm-4">Tanggal</label>
        <div class="col-lg-4 col-sm-8">
            <div class="input-group date" data-date-format="yyyy-mm-dd">
                <input type="text" name="tgltrans" id="tgltrans" class="form-control input-sm datepicker" required="required" placeholder="yyyy-mm-dd" value="2019-08-16" readonly="">
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="jamdaftar" class="col-lg-2 col-sm-4">Jam Daftar</label>
        <div class="col-lg-4 col-sm-8">
            <input type="text" name="jamdaftar" id="jamdaftar" class="form-control input-sm" required="required" placeholder="hh:mm::ss" value="<?php echo date("h:i:s"); ?>" readonly="">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="notrans" class="col-lg-4 col-sm-4">notransaksi</label>
        <div class="col-lg-4 col-sm-8">
            <input type="text" id="notrans" name="notrans" class="form-control input-sm" readonly="" placeholder="NO Transaksi">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="norm" class="col-lg-2 col-sm-4">norm</label>
        <div class="col-lg-4 col-sm-8">
            <div class="input-group input-group-sm">
                <input type="text" name="norm" maxlength="6" class="form-control input-sm" id="norm" placeholder="NO RM" required="">
                <div id="bt_norm" class="input-group-addon btn">
                    <span class="glyphicon glyphicon-search" id="find_norm"></span>
                </div>
            </div>
        </div>
    </div>
</fieldset>