<fieldset class="scheduler-border">
    <legend class="scheduler-border">2. Skrining Nutrisi</legend>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="col-lg-4" for="bb">A. Berat Badan</label>
            <div class="col-lg-5">
                <div class="input-group">
                    <input type="text" id="bb" name="bb" class="form-control" placeholder="Berat Badan" required="">
                    <div class="input-group-addon">
                        <span class="">KG</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4" for="tb">B. Tinggi Badan</label>
            <div class="col-lg-5">
                <div class="input-group">
                    <input type="text" id="tb" name="tb" class="form-control" placeholder="Tinggi Badan" required="">
                    <div class="input-group-addon">
                        <span class="">cm</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="form-group">
            <label class="col-lg-4" for="bb" style="margin-left: 15px;">C. BB turun 3 bulan terakhir</label>
            <div class="col-lg-5">
                <ul class="list-inline">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="hilangBB3Bln" id="hilangBB3Bln0" value="0" checked="">
                            <label for="hilangBB3Bln0">Tidak</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="hilangBB3Bln" id="hilangBB3Bln1" value="1">
                            <label for="hilangBB3Bln1">Ya</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-4" for="bb" style="margin-left: 15px;">D. napsu makan turun</label>
            <div class="col-lg-5">
                <ul class="list-inline">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="turunAsupMkn" id="turunAsupMkn0" value="0" checked="">
                            <label for="turunAsupMkn0">Tidak</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="turunAsupMkn" id="turunAsupMkn1" value="1">
                            <label for="turunAsupMkn1">Ya</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</fieldset>