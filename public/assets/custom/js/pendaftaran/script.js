import { kelompok } from "../API/kelompok.js";
import { provinsi } from "../API/provinsi.js";
import { agama } from "../API/agama.js";
import { tanggal } from "../core/tanggal.js";
import { pendidikan } from "../API/pendidikan.js";
import { tujuan } from "../API/tujuan.js";
import { petugas } from "../API/petugas.js";
import { formGenerator } from "./form-generator.js";
import { Cari } from './cari.js'

const frm = document.getElementById('frm')


let pageInit = async () => {
    $('.datepicker').datepicker({
        autoclose: true,
        todayBtn: "linked",
        format: "yyyy-mm-dd"
    })
    await kelompok.find()
    await provinsi.find()
    await agama.find()
    await pendidikan.find()
    await tujuan.find()
    await petugas.find()
    tanggal.jam('jamdaftar')
    await $('.select2').select2()


}
pageInit()

$(window).on("load", function () {
    setTimeout(() => { formGenerator.reset_form() }, 2000)
    $('#kkelompok').on('change', e => kelompok.setBiaya(e))
})

$('#norm').keydown(async e => {
    if (e.keyCode === 13) {
        if (e.target.value === "") return
        return Cari.action.cariFormNew(e.target.value)
    }
})

$('#nourut').keydown(async e => {
    if (e.keyCode === 13) {
        if (e.target.value === "") return
        return $('#save-bt').click()

    }
})

$('#tgllahir').on('change', tanggal.src_umur)
$('#lNohp').dblclick(() => {
    let inptType = $('#nohp').attr('type')
    if (inptType === "password") $('#nohp').attr('type', 'text')
    if (inptType === "text") $('#nohp').attr('type', 'password')
})
$('#rst-bt, #batal').on('click', formGenerator.reset_form)

$('#update').on('click', formGenerator.updatePasien)
$('#cetak').on('click', () => {
    const norm = $('#norm').val()
    formGenerator.cetak(norm)
})
$('#frm').on('submit', formGenerator.simpan)

