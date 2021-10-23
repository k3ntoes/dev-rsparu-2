import { DaftarTunggu } from "../API/daftarTunggu.js"
import { diagnosa } from "../API/diagnosa.js"
import { kunjungan } from "../API/kunjungan.js"
import { petugas } from "../API/petugas.js"
import { trans_petugas } from "../API/trans_petugas.js"
import { tujuan } from "../API/tujuan.js"
import { Api } from "../core/Api.js"
import { MainApp } from "../core/main.js"
import { biodata } from "../tensi/biodata.js"

const Module = {
    init: () => {
        Module.setData.reset()
    },
    action: {
        simpan: async () => {
            const frm = document.getElementById('frmInputPoli')
            const frmData = MainApp.formDatatoObj(new FormData(frm))
            const formData = Module.setData.checkCheckbox(frmData)
            let res = await Api.post('TransPoli', formData)
            toastr['success'](res.response.message)
            Module.setData.reset()
            return MainApp.autoScroll('formPanel')
        },
        detPasien: async norm => {
            NProgress.start()
            const formData = {
                frmlama: norm
            }

            return Api.post('Pasien/form/cari', formData)
        },
        doEdit: async id => {
            const resKunj = await kunjungan.find(id)
            if (resKunj.metaData.code !== 200) return alert(resKunj.response.message)
            const dataKunj = resKunj.response.data
            const t_petugas = await trans_petugas.find(id)
            const dataTransPoli = await Api.showById('TransPoli', id)
            const pasien = await Module.action.detPasien(dataKunj.norm)
            const dataPasien = pasien.response.data[0]

            biodata.setdata(dataPasien, dataKunj)
            Module.setData.setForm(dataKunj, dataTransPoli, t_petugas)
            MainApp.autoScroll('formPanel')
            NProgress.done()
            return
        }
    },
    setData: {
        reset: async () => {
            const p_admin_poli = $('#p_admin_poli').val()
            const p_dokter_poli = $('#p_dokter_poli').val()
            $('#frmInputPoli')[0].reset()
            $('.cbox').val(0)
            $('#p_admin_poli').val(p_admin_poli)
            $('#p_dokter_poli').val(p_dokter_poli)
            $('select').trigger('change')
            await DaftarTunggu.action.showList('Tensi', $('#tgl').val(), 2)
            DaftarTunggu.setData.data_table()
        },
        setModal: notrans => {
            $('#notrans-pindah').val(notrans)
            NProgress.done()
            return
        },
        setForm: (kunj, dataPoli, t_petugas) => {
            $('#norm').val(kunj.norm)
            $('#norm').attr('readonly', 'readonly')
            $('#notrans').val(kunj.notrans)
            if (dataPoli.metaData.code === 200) {
                const poli = dataPoli.response.data
                const petugas = t_petugas.response.data
                $("#inspeksi").val(poli.inspeksi)
                $("#perkusi").val(poli.perkusi)
                $("#palpasi").val(poli.palpasi)
                $("#auskultasi").val(poli.auskultasi)
                $(`#anemis${poli.anemis}`).trigger('click')
                $(`#cyanosis${poli.cyanosis}`).trigger('click')
                $(`#dyspneu${poli.dyspneu}`).trigger('click')
                $(`#stomatitis${poli.stomatitis}`).trigger('click')
                if (parseInt(poli.rontgen) === 1) $(`#rontgen`).trigger('click')
                if (parseInt(poli.konsul) === 1) $(`#konsul`).trigger(`click`)
                if (parseInt(poli.tcm) === 1) $(`#tcm`).trigger(`click`)
                if (parseInt(poli.bta) === 1) $(`#bta`).trigger(`click`)
                if (parseInt(poli.hematologi) === 1) $(`#hematologi`).trigger(`click`)
                if (parseInt(poli.kimiaDarah) === 1) $(`#kimiaDarah`).trigger(`click`)
                if (parseInt(poli.imunoSerologi) === 1) $(`#imunoSerologi`).trigger(`click`)
                if (parseInt(poli.mantoux) === 1) $(`#mantoux`).trigger(`click`)
                if (parseInt(poli.ekg) === 1) $(`#ekg`).trigger(`click`)
                if (parseInt(poli.mikroCo) === 1) $(`#mikroCo`).trigger(`click`)
                if (parseInt(poli.spirometri) === 1) $(`#spirometri`).trigger(`click`)
                $(`#spo2`).val(poli.spo2)
                $("#diagnosa1").val(poli.diagnosa1).trigger('change')
                $("#diagnosa2").val(poli.diagnosa2).trigger('change')
                $("#diagnosa3").val(poli.diagnosa3).trigger('change')
                $("#nebulizer").val(poli.nebulizer)
                $("#infus").val(poli.infus)
                $("#oksigenasi").val(poli.oksigenasi)
                $("#injeksi").val(poli.injeksi)
                $("#terapi").val(poli.terapi)
                $("#ktujuan").val(poli.ktujuan).trigger('change')
                $('#p_admin_poli').val(petugas.p_admin_poli).trigger('change')
                $('#p_dokter_poli').val(petugas.p_dokter_poli).trigger('change')
                $('#p_admin_poli_konsul').val(petugas.p_admin_poli_konsul).trigger('change')
                $('#p_dokter_poli_konsul').val(petugas.p_dokter_poli_konsul).trigger('change')
            }
        },
        checkCheckbox: (frmData) => {
            const checkboxes = document.getElementsByClassName('cbox')
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    checkboxes[i].value = 1
                } else {
                    checkboxes[i].value = 0
                }
                frmData[checkboxes[i].name] = checkboxes[i].value
            }

            return frmData
        }
    }
}

await petugas.find()
await tujuan.find()
await diagnosa.find()
$('.select2').select2({ "width": "100%" })
Module.init()


//Button Event
$('#cariDaftarTunggu').on('click', async () => {
    await DaftarTunggu.action.showList('Tensi', $('#tgl').val(), 2)
    DaftarTunggu.setData.data_table()
})

$('.nav-tabs').on('click', 'li', e => {
    setTimeout(DaftarTunggu.setData.data_table, 100)
})

$('#listDaftarTunggu tbody').on('click', 'span.btn', async e => {
    NProgress.start()
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'edit') return Module.action.doEdit(id)
    if (aksi === 'pindah') return Module.setData.setModal(id)
})

$('#listDaftarSelesai tbody').on('click', 'span.btn', async e => {
    NProgress.start()
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'cetak') return MainApp.cetak()
    Module.setData.setModal(id)
})

$('#batal_poli').on('click', Module.setData.reset)
$('#frmInputPoli').on('submit', e => {
    if (!e.isDefaultPrevented()) Module.action.simpan()
    return false
})

