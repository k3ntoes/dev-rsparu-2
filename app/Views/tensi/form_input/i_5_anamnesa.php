<fieldset class="scheduler-border">
    <legend class="scheduler-border">5. Anamnesa</legend>
    <div class="col-lg-12">
        <div class="form-group">
            <label class="col-lg-12">A. Keluhan Utama/Riwayat Penyakit Sekarang</label>
        </div>

        <div class="form-group">
            <label class="col-lg-2" style="margin-left: 15px;">- Batuk </label>
            <div class="col-lg-2">
                <input type="text" id="batuk" name="batuk" class="form-control" placeholder="Batuk Hari/Bulan, Intensitas" required="">
            </div>
            <label class="col-lg-1">, Berdahak</label>
            <div class="col-lg-5">
                <ul class="list-inline">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDahak" id="batukDahak0" value="0" checked="">
                            <label for="batukDahak0">Tidak Berdahak</label>
                        </div>
                    </li>

                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDahak" id="batukDahak1" value="1">
                            <label for="batukDahak1">Putih</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDahak" id="batukDahak2" value="2">
                            <label for="batukDahak2">Keruh</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDahak" id="batukDahak3" value="3">
                            <label for="batukDahak3">Hijau</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2" style="margin-left: 15px;">- Batuk Darah</label>
            <div class="col-lg-2">
                <input type="text" id="batukDarah" name="batukDarah" class="form-control" placeholder="Hari/Bulan, Kuantitas" required="">
            </div>

            <label class="col-lg-1">, Kualitas</label>
            <div class="col-lg-6">
                <ul class="list-inline">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDarahKualitas" id="batukDarahKualitas0" value="0">
                            <label for="batukDarahKualitas0">Bercak</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDarahKualitas" id="batukDarahKualitas1" value="1">
                            <label for="batukDarahKualitas1">Kental</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDarahKualitas" id="batukDarahKualitas2" value="2">
                            <label for="batukDarahKualitas2">Cair</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="batukDarahKualitas" id="batukDarahKualitas3" value="3" checked="">
                            <label for="batukDarahKualitas3">Tidak Ada Darah</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="sesak" class="col-lg-2" style="margin-left: 15px;">- Sesak nafas</label>
            <div class="col-lg-2">
                <input type="text" id="sesak" name="sesak" class="form-control" placeholder="Sesak Nafas Hari/Bulan, Intensitas" required="">
            </div>
            <label for="sesakSuara" class="col-lg-1">, Suara</label>
            <div class="col-lg-3">
                <select id="sesakSuara" name="sesakSuara" class="form-control select2">
                    <option value="Vesikular (normal)">Vesikular (normal)</option>
                    <option value="Wheezing (mengi)">Wheezing (mengi)</option>
                    <option value="Ronchi (ngorok)">Ronchi (ngorok)</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nyeriDada" class="col-lg-2" style="margin-left: 15px;">- Nyeri Dada</label>
            <div class="col-lg-2">
                <input type="text" id="nyeriDada" name="nyeriDada" class="form-control" placeholder="Nyeri Dada Hari/Bulan, Intensitas" required="">
            </div>
            <label class="col-lg-1">, Lokasi</label>
            <div class="col-lg-6">
                <ul class="list-inline">
                    <li>
                        <div class="radio info">
                            <input type="radio" name="nyeriDadaLok" id="nyeriDadaLok0" value="0">
                            <label for="nyeriDadaLok0">Kanan</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="nyeriDadaLok" id="nyeriDadaLok1" value="1">
                            <label for="nyeriDadaLok1">Kiri</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="nyeriDadaLok" id="nyeriDadaLok2" value="2">
                            <label for="nyeriDadaLok2">Uluhati</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="nyeriDadaLok" id="nyeriDadaLok3" value="3">
                            <label for="nyeriDadaLok3">Semua Area</label>
                        </div>
                    </li>
                    <li>
                        <div class="radio info">
                            <input type="radio" name="nyeriDadaLok" id="nyeriDadaLok4" value="4" checked="">
                            <label for="nyeriDadaLok4">Tidak Bisa Ditentukan</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="demam" class="col-lg-2" style="margin-left: 15px;">- Demam</label>
            <div class="col-lg-2">
                <input type="text" id="demam" name="demam" class="form-control" placeholder="Demam Hari/Bulan" required="">
            </div>
            <label class="col-lg-1">, Waktu</label>
            <div class="col-lg-6">
                <input type="hidden" name="demamWaktuPagi" id="demamWaktuPagi">
                <ul class="list-inline">
                    <li>
                        <div class="checkbox info">
                            <input type="checkbox" name="demamWaktuPagi[]" id="demamWaktuPagi0" value="0">
                            <label for="demamWaktuPagi0">Pagi</label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox info">
                            <input type="checkbox" name="demamWaktuPagi[]" id="demamWaktuPagi1" value="1">
                            <label for="demamWaktuPagi1">Siang</label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox info">
                            <input type="checkbox" name="demamWaktuPagi[]" id="demamWaktuPagi2" value="2">
                            <label for="demamWaktuPagi2">Sore</label>
                        </div>
                    </li>
                    <li>
                        <div class="checkbox info">
                            <input type="checkbox" name="demamWaktuPagi[]" id="demamWaktuPagi3" value="3">
                            <label for="demamWaktuPagi3">Malam</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="keluhanLain" class="col-lg-2" style="margin-left: 15px;">- Keluhan Lain</label>
            <div class="col-lg-8">
                <input type="text" id="keluhanLain" name="keluhanLain" class="form-control" placeholder="Keluhan Lain">
            </div>
        </div>
    </div>
</fieldset>