//Search Umur
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

let getBulan = bln => {
    arrBulan = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember",
    ]

    return arrBulan[bln - 1]
}

let getHari = hr => {
    arrHari = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu",
    ]

    return arrHari[hr]
}

let generateTanggal = tgl => {
    var nTgl = new Date(tgl)
    var tanggal = nTgl.getDate();
    var hari = getHari(nTgl.getDay())
    var bulan = getBulan(nTgl.getMonth())
    var tahun = nTgl.getFullYear()
    var jam = nTgl.toLocaleTimeString()

    return `${hari}, ${tanggal} ${bulan} ${tahun} ${jam}`
}

let generateYmd = tgl => {
    var nTgl = new Date(tgl)
    var tanggal = nTgl.getDate();
    if (tanggal < 10) tanggal = `0${tanggal}`
    var bulan = nTgl.getMonth() + 1;
    if (bulan < 10) bulan = `0${bulan}`
    var tahun = nTgl.getFullYear();

    return `${tahun}-${bulan}-${tanggal}`
}

let tgl_sekarang = () => {
    const mydate = new Date()
    const tahun = mydate.getFullYear()
    let bulan = mydate.getMonth()
    bulan = bulan + 1
    if (bulan < 10) {
        bulan = `0${bulan}`
    }
    let tgl = mydate.getDate()
    if (tgl < 10) {
        tgl = `0${tgl}`
        // return window.location.origin + "/"
    }
    let tglnya = `${tahun}-${bulan}-${tgl}`

    return tglnya
}

let jam_sekarang = () => {
    var mydate = new Date();
    var jam = mydate.getHours();
    var menit = mydate.getMinutes();
    //var detik=mydate.getSeconds();
    var detik = 1;

    if (jam.toString().length == 1) {
        jam = `0${jam}`;
    }
    if (menit.toString().length == 1) {
        menit = `0${menit}`;
    }
    if (detik.toString().length == 1) {
        detik = `0${detik}`;
    }

    var jamnya = `${jam}:${menit}:${detik}`;

    return jamnya;
}

export { src_umur, getBulan, getHari, generateTanggal, generateYmd, tgl_sekarang, jam_sekarang }