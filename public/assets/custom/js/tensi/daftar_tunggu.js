import { kunjungan } from '../API/kunjungan.js'
import { trans_petugas } from '../API/trans_petugas.js'
import { Api } from '../core/Api.js'
import { MainApp as C, MainApp } from '../core/main.js'
import { RequestHelper as R } from '../core/request_helper.js'
import { biodata } from './biodata.js'
import { Riwayat } from './riwayat.js'
import { Tensi } from './script-tensi.js'

const tgl = $('#tgl')
const Module = {
    init: async () => {
        $('#cariDaftarTunggu').on('click', Module.action.cari)
        await Module.action.cari()
        MainApp.autoScroll('tungguPanel')
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
        }
    },
    tableGenerator: async data => {
        if ($.fn.DataTable.isDataTable('#listDaftarTunggu')) {
            $('#listDaftarTunggu').DataTable().clear().destroy();
            $('#listDaftarSelesai').DataTable().clear().destroy();
        }

        let strTunggu = ""
        let strSelesai = ""
        const o = C.mapping(data, 1)
        if (o.countTunggu === 0) toastr['info']('Tidak ada Antrian tunggu Tensi')
        if (o.countSelesai === 0) toastr['info']('pasien belum ada yang diperiksa')

        o.tunggu.forEach(d => {
            let statSelesai = `<label class='label label-primary' style="font-size: 11px;">Belum Selesai</label>`
            strTunggu += `<tr>` +
                `<td class='row small-spacing'>
                        <div class="checkbox info col-lg-2">
                            <input type='checkbox' id='chck_${d.notrans}' name='chck[]' value='${d.notrans}'>
                            <label for='chck_${d.notrans}'>&nbsp</label>
                        </div>
                        <div class='btn-group btn-group-xs'>
                            <span class='btn btn-xs btn-danger glyphicon glyphicon-pencil' data-action='edit' data-notrans='${d.notrans}'></span>
                            <span class='btn btn-xs btn-success glyphicon glyphicon-print' data-action='cetak' data-notrans='${d.norm}'></span>
                            <span class='btn btn-xs btn-warning glyphicon glyphicon-share-alt' data-action='pindah' data-notrans='${d.notrans}'></span>
                        </div>
                    </td>` +
                `<td>${d.nourut}</td>` +
                `<td>${d.norm}</td>` +
                `<td>${d.noktp}</td>` +
                `<td>${d.kelompok}</td>` +
                `<td>${d.noasuransi}</td>` +
                `<td>${d.nama}</td>` +
                `<td>${d.jeniskel}</td>` +
                `<td>${d.kelurahan}</td>` +
                `<td>${d.kunj}</td>` +
                `<td>${statSelesai}</td>` +
                `</tr>`
        })

        o.selesai.forEach(d => {
            let statSelesai = `<label class='label label-primary' style="font-size: 11px;">Belum Selesai</label>`
            strSelesai += `<tr>` +
                `<td class='row small-spacing'>
                        <div class="checkbox info col-lg-2">
                            <input type='checkbox' id='chck_${d.notrans}' name='chck[]' value='${d.notrans}'>
                            <label for='chck_${d.notrans}'>&nbsp</label>
                        </div>
                        <div class='btn-group btn-group-xs'>
                            <span class='btn btn-xs btn-danger glyphicon glyphicon-pencil' data-action='edit' data-notrans='${d.notrans}'></span>
                            <span class='btn btn-xs btn-success glyphicon glyphicon-print' data-action='cetak' data-notrans='${d.norm}'></span>
                            <span class='btn btn-xs btn-warning glyphicon glyphicon-share-alt' data-action='pindah' data-notrans='${d.notrans}'></span>
                        </div>
                    </td>` +
                `<td>${d.nourut}</td>` +
                `<td>${d.norm}</td>` +
                `<td>${d.noktp}</td>` +
                `<td>${d.kelompok}</td>` +
                `<td>${d.noasuransi}</td>` +
                `<td>${d.nama}</td>` +
                `<td>${d.jeniskel}</td>` +
                `<td>${d.kelurahan}</td>` +
                `<td>${d.kunj}</td>` +
                `<td>${statSelesai}</td>` +
                `</tr>`
        })

        $('#listDaftarTunggu tbody').html(strTunggu);
        $('#listDaftarSelesai tbody').html(strSelesai);

        // await $('#listDaftarTunggu, #listDaftarSelesai').DataTable({
        //     'paging': true,
        //     "scrollX": true,
        //     "order": [[0, "desc"]]
        // })

        NProgress.done()
    }
}

export { Module as daftar_tunggu_tensi }


// Button Event
$('#listDaftarTunggu tbody').on('click', 'span.btn', async e => {
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'edit') return Module.action.doEdit(id)
})


