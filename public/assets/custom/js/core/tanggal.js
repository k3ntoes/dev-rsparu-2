const skrng = () => {
    const mydate = new Date();
    let tahun = mydate.getFullYear();
    let bulan = mydate.getMonth();
    bulan = bulan + 1;
    if (bulan < 10) {
        bulan = `0${bulan}`;
    }
    let tgl = mydate.getDate();
    if (tgl < 10) {
        tgl = `0${tgl}`;
    }
    let tglnya = `${tahun}-${bulan}-${tgl}`;

    return tglnya;
}

const jam = id => {
    setInterval(function () {
        var jam = new Date();
        var j = jam.getHours();
        if (j < 10) {
            j = "0" + j;
        }
        var m = jam.getMinutes();
        if (m < 10) {
            m = "0" + m;
        }
        var d = jam.getSeconds();
        if (d < 10) {
            d = "0" + d;
        }
        $(`#${id}`).val(j + ":" + m + ":" + d);
    }, 1000);
}

let src_umur = () => {
    //cari umur
    var dob = new Date($('#tgllahir').val());
    var today = new Date();
    if ($('#ttgllahir').val() != "") {
        var umurBulan;
        var umurHari;
        var lahir = new Date($('#tgllahir').val());
        var today = new Date();
        //1tahun dalam ms
        var oneth = 365.25 * 24 * 60 * 60 * 1000;
        //1bulan dalam ms
        var onebl = 30.43 * 24 * 60 * 60 * 1000;
        //1hari dalam ms
        var onehr = 24 * 60 * 60 * 1000;
        //umur dalam ms
        var selisih = today - lahir;
        //Umur Tahun
        var umurTh = Math.floor(selisih / oneth);
        var umutThInms = umurTh * oneth;
        //Umur Bulan dalam Ms
        var selisihBulan = selisih - umutThInms;
        //Umur Bulan
        var umurBl = Math.floor(selisihBulan / onebl);
        var umurBlInms = umurBl * onebl;
        //Umur Hari dalam ms
        var selisihHr = selisihBulan - umurBlInms;
        //Umur Hari
        var umurHr = Math.floor(selisihHr / onehr);
        $('#umurthn').val(umurTh);
        $('#umurbln').val(umurBl);
        $('#umurhr').val(umurHr);
    }
}

const tanggal = {
    skrng: skrng(),
    jam: (id) => jam(id),
    src_umur: () => src_umur()
}

export { tanggal }