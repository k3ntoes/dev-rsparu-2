import { agama } from '../API/agama.js'
import { kabupaten, kecamatan, kelurahan, provinsi } from '../API/alamat.js'
import { kelompok } from '../API/kelompok.js'
import { pendidikan } from '../API/pendidikan.js'
import { petugas } from '../API/petugas.js'
import { tujuan } from '../API/tujuan.js'
import { cariPasien, cariPasienBy } from '../Main/pasien.js'
import { src_umur, tgl_sekarang } from '../core/srcUmur.js'
import FormModule from './form.js'

const fm = new FormModule()

// const frm = document.querySelector('#frm_cari')
const src_data_pas = $('#src_data_pas')
//Text
const fNama = $('#fNama')
const fdesa = $('#fdesa')
const fkecamatan = $('#fkecamatan')
const fkabupaten = $('#fkabupaten')
const frmlama = $('#frmlama')

let pageInit = async () => {
    await kelompok()
    await agama()
    await pendidikan()
    await tujuan()
    await provinsi()
    await petugas()
    $('.select2').select2()

    fm.reset_form()

    $('#tgldaftar').val(tgl_sekarang())

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
        $('#jamdaftar').val(j + ":" + m + ":" + d);
    }, 1000);

    $('#listPasien').DataTable({
        'paging': true,
        "scrollX": true,
        "order": [[0, "desc"]]
    });
}

// Select Event =====================================================================
$('#kkelompok').on("change", (e) => {
    const i = e.currentTarget.options.selectedIndex
    const biaya = e.currentTarget.options[i].title
    $('#biaya').val(biaya)
})

$('#kprovinsi').on('change', async (e) => {
    const i = e.currentTarget.options.selectedIndex
    const kdProv = e.currentTarget.options[i].value
    $('#kkabupaten').find('.optKab').remove().end()
    $('#kkecamatan').find('.optKec').remove().end()
    $('#kkelurahan').find('.optKel').remove().end()
    await kabupaten(kdProv)
})

$('#kprovinsi').on('select2:select', async (e) => {
    const i = e.currentTarget.options.selectedIndex
    const kdProv = e.currentTarget.options[i].value
    $('#kkabupaten').find('.optKab').remove().end()
    $('#kkecamatan').find('.optKec').remove().end()
    $('#kkelurahan').find('.optKel').remove().end()
    await kabupaten(kdProv)
})

$('#kkabupaten').on('select2:select', async (e) => {
    const i = e.currentTarget.options.selectedIndex
    const kdKab = e.currentTarget.options[i].value
    await kecamatan(kdKab)
})

$('#kkecamatan').on('select2:select', async (e) => {
    const i = e.currentTarget.options.selectedIndex
    const kdKec = e.currentTarget.options[i].value
    await kelurahan(kdKec)
})
// Select Event =====================================================================

//Text Event ========================================================================
$('#norm').on("keydown", e => {
    const norm = $('#norm').val()
    const req = {
        new: {
            norm: norm
        }
    }
    if (e.keyCode === 13) cariPasien(req)
})

$('#tgllahir').on('change', e => {
    src_umur(e.target.value)
})

$('#lNohp').dblclick(() => {
    var x = document.getElementById("nohp");
    if (x.type === 'text') {
        x.type = 'password';
    } else {
        x.type = 'text';
    }
})

$('#fnama').on("keydown", e => {
    if (e.keyCode === 13) cariPasienBy()
})
//Text Event ========================================================================

// Button Event =====================================================================
$('#find_norm').on("click", async e => {
    const norm = $('#norm').val()
    const req = {
        new: {
            norm: norm
        }
    }

    await cariPasien(req)
})

$('#simpan,#save-bt').on("click", () => {
    fm.doSimpan()
})

$('#batal,#rst-bt').on('click', () => {
    fm.reset_form()
})

$('#daftarTunggu').on('click', () => {

})

// Button Event
$('#srcNama, #srcDesa, #srcKecamatan, #srcKabupaten').on('click', () => {
    cariPasienBy()
})

$('#srcNorm').on('click', () => {
    console.log("nyahaha")
})
// Button Event =====================================================================

pageInit()

