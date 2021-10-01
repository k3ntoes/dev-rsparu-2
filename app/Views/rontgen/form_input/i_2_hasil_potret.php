<fieldset class="scheduler-border">
    <legend class="scheduler-border">Hasil Pemotretan</legend>

    <div class="form-group col-lg-6 col-sm-12">
        <label class="col-lg-3 col-sm-2" for="pasienRawat">Pasien Rawat</label>
        <div class="col-lg-8 col-sm-7">
            <ul class="list-inline">
                <li>
                    <div class="radio primary">
                        <input type="radio" name="pasienRawat" id="pasienRawat0" value="0" checked="">
                        <label for="pasienRawat0">IRJA</label>
                    </div>
                </li>
                <li>
                    <div class="radio primary">
                        <input type="radio" name="pasienRawat" id="pasienRawat1" value="1">
                        <label for="pasienRawat1">IGD / IRNA</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="noreg" class="col-lg-3 col-sm-4">No. Reg.</label>
        <div class="col-lg-4 col-sm-8">
            <input type="text" name="noreg" maxlength="6" class="form-control input-sm" id="noreg" placeholder="NO. Reg." required="">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="kdKondisiRo" class="col-lg-3 col-sm-4">Kondisi</label>
        <div class="col-lg-6 col-sm-8">
            <select name="kdKondisiRo" id="kdKondisiRo" class="form-control select2">
                <option value="">--Pilih--</option>
            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label class="col-lg-3 col-sm-4">Nama Foto</label>
        <div class="col-lg-6 col-sm-8">
            <select name="kdFoto" id="kdFoto" class="form-control select2">
                <option value="">--Pilih--</option>
            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="kdFilm" class="col-lg-3 col-sm-4">Ukuran Film</label>
        <div class="col-lg-6 col-sm-8">
            <select name="kdFilm" id="kdFilm" class="form-control select2">
                <option value="">--Pilih--</option>
            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="jmlExpose" class="col-lg-3 col-sm-4">Jml Expose</label>
        <div class="col-lg-4 col-sm-6">
            <input type="text" name="jmlExpose" id="jmlExpose" class="form-control" placeholder="Jml Expose" value="1">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="jmlFilmDipakai" class="col-lg-3 col-sm-4">Jml Film Dipakai</label>
        <div class="col-lg-4 col-sm-8">
            <input type="text" name="jmlFilmDipakai" id="jmlFilmDipakai" class="form-control" placeholder="Jml Film Dipakai" value="1">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="jmlFilmRusak" class="col-lg-3 col-sm-4">Jml Film Rusak</label>
        <div class="col-lg-4 col-sm-8">
            <input type="text" name="jmlFilmRusak" id="jmlFilmRusak" class="form-control" placeholder="Jml Film Rusak" value="0">
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-6">
        <label for="kdMesin" class="col-lg-3 col-sm-4">Mesin</label>
        <div class="col-lg-6 col-sm-8">
            <select name="kdMesin" id="kdMesin" class="form-control select2" required="">
                <option value="">--Pilih--</option>
            </select>
        </div>
    </div>

    <div class="form-group col-lg-6 col-sm-12">
        <label for="proyeksi" class="col-lg-3 col-sm-2">Proyeksi</label>
        <div class="col-lg-9 col-sm-8">
            <ul class="list-inline">
                <li>
                    <div class="checkbox primary">
                        <input type="checkbox" name="pa" id="pa" value="1">
                        <label for="pa">PA</label>
                    </div>
                </li>
                <li>
                    <div class="checkbox primary">
                        <input type="checkbox" name="ap" id="ap" value="1">
                        <label for="ap">AP</label>
                    </div>
                </li>
                <li>
                    <div class="checkbox primary">
                        <input type="checkbox" name="lateral" id="lateral" value="1">
                        <label for="lateral">Lateral</label>
                    </div>
                </li>
                <li>
                    <div class="checkbox primary">
                        <input type="checkbox" name="obliq" id="obliq" value="1">
                        <label for="obliq">Obliq</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="form-group col-lg-12 col-sm-12">
        <label for="catatan" class="col-lg-2">Catatan</label>
        <div class="col-lg-12">
            <textarea name="catatan" id="catatan" class="form-control textarea" rows="5"></textarea>
        </div>
    </div>
</fieldset>