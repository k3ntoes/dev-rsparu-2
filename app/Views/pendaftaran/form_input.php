<div class="card-content">
    <form action="#" method="post" id="frm" class="form-horizontal box-body" onsubmit="return false;">
        <?= $this->include('pendaftaran/form/1-antrian'); ?>
        <!--NoRM-->
        <div class="form-group" style="margin-bottom: 3px;">
            <label for="norm" class="col-sm-3 col-form-label">NO. RM</label>
            <div class="col-sm-4">
                <div class="input-group input-group-sm">
                    <input type="text" name="norm" maxlength="6" class="form-control input-sm" id="norm" placeholder="NO RM">
                    <div class="input-group-addon btn" id="find_norm">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
            <label for="rmlama" class="col-sm-2 col-form-label text-right">RM Lama</label>
            <div class="col-sm-3">
                <input type="text" name="rmlama" maxlength="11" class="form-control input-sm toUpper" id="rmlama" placeholder="NO RM Lama">
            </div>
        </div>
        <div class="form-group">
            <label for="tgldaftar" class="col-sm-3 col-form-label">Tanggal</label>
            <div class="col-sm-4">
                <div class="input-group date" data-date-format="yyyy-mm-dd">
                    <input type="text" name="tgldaftar" id="tgldaftar" class="form-control input-sm datepicker" required="true" placeholder="yyyy-mm-dd" readonly="">
                    <span class="input-group-addon bg-primary text-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
            <label for="jamdaftar" class="col-sm-2 col-form-label text-right">Jam Daftar</label>
            <div class="col-sm-3">
                <input type="text" name="jamdaftar" id="jamdaftar" class="form-control input-sm" required="true" placeholder="hh:mm::ss" value="<?php echo date("h:i:s"); ?>" readonly="">
            </div>
        </div>
        <!--Kelompok-->
        <div class="form-group">
            <label for="kkelompok" class="col-sm-3 col-form-label">Kelompok</label>
            <div class="col-sm-4">
                <select name="kkelompok" id="kkelompok" class="form-control select2" required="true">
                    <option value="" class="optIni">1</option>
                    <option value="" class="optIni">2</option>
                    <option value="" class="optIni">3</option>
                </select>
            </div>
            <label for="kunj" class="col-sm-2 col-form-label text-right">Kunjungan</label>
            <div class="col-sm-3">
                <select name="kunj" id="kunj" class="form-control">
                    <option value="B">Baru</option>
                    <option value="L">Lama</option>
                </select>
            </div>
        </div>
        <!--No Asuransi-->
        <div class="form-group">
            <label for="noasuransi" class="col-sm-3 col-form-label">No Asuransi</label>
            <div class="col-sm-9">
                <div class="input-group input-group-sm">
                    <input type="text" name="noasuransi" class="form-control input-sm" id="noasuransi" placeholder="No Asuransi">
                    <div class="input-group-addon btn">
                        <span class="glyphicon glyphicon-search" id="find_noasuransi"></span>
                    </div>
                </div>
            </div>
        </div>
        <!--No KTP-->
        <div class="form-group">
            <label for="noktp" class="col-sm-3 col-form-label">NIK</label>
            <div class="col-sm-9">
                <div class="input-group input-group-sm">
                    <input type="text" name="noktp" class="form-control input-sm" id="noktp" placeholder="NIK">
                    <div class="input-group-addon btn">
                        <span class="glyphicon glyphicon-search" id="find_noktp"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
            <div class="col-sm-9">
                <div class="input-group input-group-sm">
                    <input name="nama" type="text" class="form-control input-sm toUpper" required="true" id="nama" placeholder="Nama Pasien">
                    <div id="stat_tb" class="input-group-addon">
                        <span class="text-bold">NTB</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
                <input type="text" name="alamat" class="form-control input-sm toUpper" id="alamat" placeholder="alamat">
            </div>
        </div>
        <div class="form-group">
            <label for="kprovinsi" class="col-sm-3 col-form-label">Provinsi</label>
            <div class="col-sm-8">
                <select name="kprovinsi" id="kprovinsi" class="form-control select2" required="true"></select>
            </div>
            <div class="col-sm-1" id="fProv"></div>
        </div>
        <div class="form-group">
            <label for="kkabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
            <div class="col-sm-8">
                <select name="kkabupaten" id="kkabupaten" class="form-control select2" required="true">
                    <option value="">--Pilih--</option>
                </select>
            </div>
            <div class="col-sm-1" id="fKab"></div>
        </div>
        <div class="form-group">
            <label for="kkecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
            <div class="col-sm-8">
                <select name="kkecamatan" id="kkecamatan" class="form-control select2" required="true">
                    <option value="">--Pilih--</option>
                </select>
            </div>
            <div class="col-sm-1" id="fKec"></div>
        </div>
        <div class="form-group">
            <label for="kkelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
            <div class="col-sm-8">
                <select name="kkelurahan" id="kkelurahan" class="form-control select2" required="true">
                    <option value="">--Pilih--</option>
                </select>
            </div>
            <div class="col-sm-1" id="fKel"></div>
        </div>
        <div class="form-group">
            <label for="rtrw" class="col-sm-3 col-form-label">RT/RW</label>
            <div class="col-sm-3">
                <input type="text" name="rtrw" class="form-control input-sm" required="true" id="rtrw" placeholder="RT/RW">
            </div>
            <label for="kdAgama" class="col-sm-2 col-form-label text-right">Agama</label>
            <div class="col-sm-4">
                <select name="kdAgama" id="kdAgama" class="form-control select2" required="true">
                    <option value="">--Pilih--</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="jeniskel" class="col-sm-3 col-form-label">Jenis Kel</label>
            <div class="col-sm-3">
                <select name="jeniskel" id="jeniskel" class="form-control">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <label for="statKawin" class="col-sm-2 col-form-label text-right">Status</label>
            <div class="col-sm-4">
                <select name="statKawin" id="statKawin" class="form-control select2" required>
                    <option value="">--Pilih Status--</option>
                    <option value="BK">Belum Kawin</option>
                    <option value="K">Kawin</option>
                    <option value="CH">Cerai Hidup</option>
                    <option value="CM">Cerai Mati</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="tmptlahir" class="col-sm-3 col-form-label">Tampat Lahir</label>
            <div class="col-sm-3">
                <input type="text" name="tmptlahir" id="tmptlahir" class="form-control toUpper" required="true" placeholder="Tempat lahir">
            </div>
            <label for="tgllahir" class="col-sm-2 col-form-label text-right">Tgl Lahir</label>
            <div class="col-sm-4">
                <div class="input-group date" data-date-format="yyyy-mm-dd">
                    <input type="text" name="tgllahir" id="tgllahir" class="form-control datepicker" required="true" placeholder="yyyy-mm-dd" value="" readonly="">
                    <span class="input-group-addon bg-primary text-white">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
        <div class="form-group" style="margin-bottom: 3px;">
            <label for="umur" class="col-sm-3 col-form-label">Umur</label>
            <div class="col-sm-3">
                <div class=" input-group">
                    <input type="text" name="umurthn" class="form-control input-sm" required="true" id="umurthn" placeholder="0" aria-describedby="inputGroupPrepend2" readonly="">
                    <div class="input-group-addon">
                        <span class="input-group-text" id="inputGroupPrepend2">TH</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" name="umurbln" class="form-control input-sm" required="true" id="umurbln" placeholder="0" aria-describedby="inputGroupPrepend2" readonly="">
                    <div class="input-group-addon">
                        <span class="input-group-text" id="inputGroupPrepend2">Bl</span>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class=" input-group">
                    <input type="text" name="umurhr" class="form-control input-sm" required="true" id="umurhr" placeholder="0" aria-describedby="inputGroupPrepend2" readonly="">
                    <div class="input-group-addon">
                        <span class="input-group-text" id="inputGroupPrepend2">Hr</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="kdPendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
            <div class="col-sm-4">
                <select name="kdPendidikan" id="kdPendidikan" class="form-control select2" required>
                    <option value="">--Pilih--</option>
                </select>
            </div>
            <label id="lNohp" for="nohp" class="col-sm-2 col-form-label text-right">Nomor Telp</label>
            <div class="col-sm-3">
                <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Nomor Telp" data-toggle='password'>
            </div>
        </div>
        <div class="form-group">
            <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
            <div class="col-sm-4">
                <input type="text" name="pekerjaan" class="form-control input-sm toUpper" id="pekerjaan" placeholder="Pekerjaan">
            </div>
            <label for="goldarah" class="col-sm-2 col-form-label text-right">Gol. Darah</label>
            <div class="col-sm-3">
                <select name="goldarah" class="form-control" id="goldarah">
                    <option value="">--Pilih--</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="pjwb" class="col-sm-3 col-form-label">Penanggungjawab</label>
            <div class="col-sm-4">
                <input type="text" name="pjwb" class="form-control input-sm toUpper" id="pjwb" placeholder="Penanggungjawab">
            </div>
            <label for="biaya" class="col-sm-2 col-form-label text-right">Biaya</label>
            <div class="col-sm-3">
                <input type="text" name="biaya" class="form-control input-sm" id="biaya" placeholder="biaya">
            </div>
        </div>
        <div class="form-group">
            <label for="pjwb" class="col-sm-3 col-form-label">Ibu Kandung</label>
            <div class="col-sm-4">
                <input type="text" name="ibuKandung" class="form-control input-sm toUpper" id="ibuKandung" placeholder="Ibu Kandung">
            </div>
            <label for="ktujuan" class="col-sm-2 col-form-label text-right">Tujuan</label>
            <div class="col-sm-3">
                <select name="ktujuan" id="ktujuan" class="form-control select2" required>
                    <option value=" ">--Pilih--</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="p_loket" class="col-sm-3 col-form-label">Petugas</label>
            <div class="col-sm-4">
                <select id="p_loket" name="p_loket" class="select2 petugas form-control"></select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3"></div>
            <div class="col-sm-3"></div>
            <div class="col-sm-6 text-right">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" id="bt_grup">
                    <span class="btn btn-warning mdi mdi-printer" id="cetak">Cetak</span>
                    <span class="btn btn-primary mdi mdi-update" id="update">UPDATE</span>
                    <span class="btn btn-danger mdi mdi-reload" id="batal">Batal</span>
                    <button class="btn btn-success mdi mdi-content-save" id="simpan"> SIMPAN</button>
                </div>
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example" id="rst">
                    <span class="btn btn-danger mdi mdi-reload" id="rst-bt">Batal</span>
                    <button class="btn btn-success mdi mdi-content-save" id="save-bt">SIMPAN</button>
                </div>
            </div>
        </div>
        <input type="hidden" id="sts_pasien" value="1">
        <input type="hidden" id="frm_edited" value="0">
        <input type="hidden" name="jctkkartu" id="jctkkartu" value="0">
        <input type="hidden" name="updKunj" id="updKunj" value="0">
    </form>
</div>