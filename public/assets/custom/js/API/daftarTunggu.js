import { Api } from "../core/Api.js"
import { MainApp } from "../core/main.js"

const DaftarTunggu = {
    action: {
        showList: async (uri, tgl, ktujuan) => {
            NProgress.start()
            const res = await Api.showById(`DaftarTunggu/${uri}`, tgl)
            return DaftarTunggu.setData.table(res, ktujuan)
        },
        pindah: () => {

        }
    },
    setData: {
        table: async (res, ktujuan) => {
            let strTunggu = ""
            let strSelesai = ""

            if ($.fn.DataTable.isDataTable('#listDaftarTunggu')) {
                $('#listDaftarTunggu').DataTable().destroy();
                $('#listDaftarSelesai').DataTable().destroy();
            }

            if (res.metaData.code !== 200) {
                $('#listDaftarTunggu tbody').html(strTunggu)
                $('#listDaftarSelesai tbody').html(strSelesai)
                DaftarTunggu.setData.data_table()
                return
            }

            $('#listDaftarTunggu tbody').html(strTunggu)
            $('#listDaftarSelesai tbody').html(strSelesai)

            const data = res.response.data

            const o = MainApp.mapping(data, ktujuan)
            if (o.countTunggu === 0) toastr['info']('Tidak ada Antrian tunggu Tensi')
            if (o.countSelesai === 0) toastr['info']('pasien belum ada yang diperiksa')

            o.tunggu.forEach(d => {
                let statSelesai = `<label class='label label-primary' style="font-size: 11px;">Belum Selesai</label>`
                strTunggu += `<tr>` +
                    `<td class='row small-spacing'>
                            <div class="checkbox info col-lg-2" style="margin-top: -2px;">
                                <input type='checkbox' id='chck_${d.notrans}' name='chck[]' value='${d.notrans}'>
                                <label for='chck_${d.notrans}'>&nbsp</label>
                            </div>
                            <div class='btn-group btn-group-xs'>
                                <span class='btn btn-xs btn-danger glyphicon glyphicon-pencil' data-action='edit' data-notrans='${d.notrans}'></span>
                                <span class='btn btn-xs btn-success glyphicon glyphicon-print' data-action='cetak' data-notrans='${d.norm}'></span>
                                <span class='btn btn-xs btn-warning glyphicon glyphicon-share-alt' data-action='pindah' data-toggle="modal" data-target="#pindahModal" data-notrans='${d.notrans}'></span>
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
                            <div class='btn-group btn-group-xs'>
                               <span class='btn btn-xs btn-success glyphicon glyphicon-print' data-action='cetak' data-notrans='${d.norm}'></span>
                                <span class='btn btn-xs btn-warning glyphicon glyphicon-share-alt' data-action='pindah' data-toggle="modal" data-target="#pindahModal" data-notrans='${d.notrans}'></span>
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

            $('#listDaftarTunggu tbody').html(strTunggu)
            $('#listDaftarSelesai tbody').html(strSelesai)

            // DaftarTunggu.setData.data_table()
            MainApp.autoScroll('tungguPanel')

            NProgress.done()
        },
        data_table: async () => {
            setTimeout(() => {
                if ($.fn.DataTable.isDataTable('#listDaftarTunggu')) {
                    $('#listDaftarTunggu').DataTable().destroy();
                    $('#listDaftarSelesai').DataTable().destroy();
                }

                $('#listDaftarTunggu, #listDaftarSelesai').DataTable({
                    'paging': true,
                    "scrollX": true,
                    "order": [[0, "desc"]]
                })
            }, 100)
        },
        pindah: () => {

        }
    }
}

export { DaftarTunggu }