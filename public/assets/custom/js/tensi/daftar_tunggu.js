import { DaftarTunggu } from '../API/daftarTunggu.js'
import { kunjungan } from '../API/kunjungan.js'
import { trans_petugas } from '../API/trans_petugas.js'
import { Api } from '../core/Api.js'
import { MainApp } from '../core/main.js'
import { biodata } from './biodata.js'
import { Riwayat } from './riwayat.js'
import { Tensi } from './script-tensi.js'

const tgl = $('#tgl')
const Module = {
    init: async () => {

    },
    action: {
        cari: async () => {
            NProgress.start()
            const res = await Api.showById('DaftarTunggu/Tensi', tgl.val())

            return Module.tableGenerator(res.response.data)
        },
        detPasien: async norm => {
            NProgress.start()
            const formData = {
                frmlama: norm
            }

            return Api.post('Pasien/form/cari', formData)
        },
        petugas: async notrans => {

        },
        tensi: async notrans => {
            NProgress.start()

            return await Api.showById('Tensi', notrans)
        },
        doEdit: async id => {
            const resKunj = await kunjungan.find(id)
            if (resKunj.metaData.code !== 200) return alert(resKunj.response.message)
            const dataKunj = resKunj.response.data
            const t_petugas = await trans_petugas.find(id)
            const dataTensi = await Module.action.tensi(dataKunj.notrans)
            const pasien = await Module.action.detPasien(dataKunj.norm)
            const dataPasien = pasien.response.data[0]
            const dataRiwayat = await Riwayat.find(dataKunj.norm)

            biodata.setdata(dataPasien, dataKunj)
            Tensi.setForm.tensi(dataKunj, dataTensi, t_petugas)
            Riwayat.setForm.riwayat(dataKunj, dataRiwayat)

            NProgress.done()
        },
        doPindah: async () => {
            NProgress.start()
            const formData = {
                notrans: $('#notrans-pindah').val(),
                ktujuan: $('#ktujuan-pindah').val()
            }
            const res = await Api.put('Kunjungan', formData.notrans, formData)
            if (res.metaData.code !== 201) return toastr['error'](res.response.message)
            toastr['info'](res.response.message)
            $('#pindahModal').modal('hide')
            await DaftarTunggu.action.showList('Tensi', $('#tgl').val(), 1)
            DaftarTunggu.setData.data_table()
            NProgress.done()
        }
    },
    setData: {
        setModal: notrans => {
            $('#notrans-pindah').val(notrans)
        }
    }
}

export { Module as daftar_tunggu_tensi }


$('#cariDaftarTunggu').on('click', Module.action.cari)
// Button Event
$('#listDaftarTunggu tbody').on('click', 'span.btn', async e => {
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'edit') return Module.action.doEdit(id)
    if (aksi === 'pindah') return Module.setData.setModal(id)
})

$('#listDaftarSelesai tbody').on('click', 'span.btn', async e => {
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'cetak') return MainApp.cetak()
    Module.setData.setModal(id)
})

$('.nav-tabs').on('click', 'li', e => {
    setTimeout(DaftarTunggu.setData.data_table, 100)
})

$('#simpan-pindah').on('click', Module.action.doPindah)

