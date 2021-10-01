import { MainApp as C } from '../core/main.js'
import { RequestHelper as R } from '../core/request_helper.js'

const tgl = $('#tgl')
const Module = {
    init: async () => {
        $('#cariDaftarTunggu').on('click', Module.action.cari)
        await Module.action.cari()
    },
    action: {
        cari: async () => {
            NProgress.start()
            const req = {
                uri: `${C.base_uri}/API/DaftarTunggu/Tensi/${tgl.val()}`,
                method: 'GET',
                token: C.token
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            return Module.tableGenerator(res1.response.data)
        },
        detPasien: async norm => {
            NProgress.start()
            const formData = {
                frmlama: norm
            }
            const req = {
                uri: `${C.base_uri}/API/Pasien/form/cari`,
                method: 'POST',
                token: C.token,
                formData: formData
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            return res1
        },
        kunjungan: async notrans => {
            NProgress.start()
            const req = {
                uri: `${C.base_uri}/API/Kunjungan/${notrans}`,
                method: 'GET',
                token: C.token
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            return res1
        }
    },
    tableGenerator: async data => {
        if ($.fn.DataTable.isDataTable('#listDaftarTunggu')) {
            $('#listDaftarTunggu').DataTable().clear().destroy();
            $('#listDaftarSelesai').DataTable().clear().destroy();
        }

        let strTunggu = ""
        let strSelesai = ""
        const o = Module.mapping(data)
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

        $('#listDaftarTunggu tbody').html(strTunggu);
        $('#listDaftarSelesai tbody').html(strSelesai);

        // await $('#listDaftarTunggu, #listDaftarSelesai').DataTable({
        //     'paging': true,
        //     "scrollX": true,
        //     "order": [[0, "desc"]]
        // })

        NProgress.done()
    },
    mapping: data => {
        const tunggu = data.reduce((t, c) => {
            if (parseInt(c.selesai) === 0) t.push(c)
            return t
        }, [])

        const selesai = data.reduce((t, c) => {
            if (parseInt(c.selesai) === 1) t.push(c)
            return t
        }, [])

        return {
            tunggu: tunggu,
            countTunggu: tunggu.length,
            selesai: selesai,
            countSelesai: selesai.length
        }
    },
    setForm: {
        biodata: (pasien, kunj) => {
            $('#nama').html(pasien.nama)
        }
    }
}

export { Module as daftar_tunggu_tensi }


let doEdit = async id => {
    const resKunj = await Module.action.kunjungan(id)
    if (resKunj.metaData.code !== 200) return alert(resKunj.response.message)
    const dataKunj = resKunj.response.data
    const pasien = await Module.action.detPasien(dataKunj.norm)
    const dataPasien = pasien.response.data[0]

    NProgress.done()
}

// Button Event
$('#listDaftarTunggu tbody').on('click', 'span.btn', async e => {
    const aksi = e.target.dataset.action
    const id = e.target.dataset.notrans
    if (aksi === 'edit') return doEdit(id)
})
