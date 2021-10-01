const tableGenerator = {
    cariGenerator: async res => {
        if ($.fn.DataTable.isDataTable('#listPasien')) {
            $('#listPasien').DataTable().clear().destroy();
        }

        let str = ""
        res.new.data.forEach(n => {
            str += `<tr class='text-primary' id='new-${n.norm}'>` +
                `<td class='text-center' nowrap>
                    <span class='glyphicon glyphicon-eye-open btn-lihat' data-id='${n.norm}' data-stat="new" style="cursor: pointer;"></span>
                 </td>` +
                `<td nowrap>${n.norm}</td>` +
                `<td nowrap>${n.rmlama}</td>` +
                `<td nowrap>${n.nama}</td>` +
                `<td nowrap>${n.jeniskel}</td>` +
                `<td nowrap>${n.kkelurahan}</td>` +
                `<td nowrap>${n.kkecamatan}</td>` +
                `<td nowrap>${n.kkabupaten}</td>` +
                `<td nowrap>${n.noktp}</td>` +
                `<td nowrap>${n.noasuransi}</td>` +
                `</tr>`
        })

        res.old.data.forEach(n => {
            str += `<tr id='old-${n.rmlama.replace('.', '')}'>` +
                `<td class='text-center' nowrap>
                    <span class='glyphicon glyphicon-eye-open btn-lihat' data-id='${n.rmlama}' data-stat="old" style="cursor: pointer;"></span>
                 </td>` +
                `<td nowrap>&nbsp;</td>` +
                `<td nowrap>${n.rmlama}</td>` +
                `<td nowrap>${n.nama}</td>` +
                `<td nowrap>${n.jeniskel}</td>` +
                `<td nowrap>${n.kkelurahan}</td>` +
                `<td nowrap>${n.kkecamatan}</td>` +
                `<td nowrap>${n.kkabupaten}</td>` +
                `<td nowrap>${n.noktp}</td>` +
                `<td nowrap>${n.noasuransi}</td>` +
                `</tr>`
        })

        $('#listPasien tbody').html(str)
        await $('#listPasien').DataTable({
            'paging': true,
            "scrollX": true,
            "order": [[0, "desc"]]
        })

        NProgress.done()
        $('#src_data_pas').hide()
    },
    riwayatGenerator: async res => {
        console.log(res)
        if ($.fn.DataTable.isDataTable('#listRiwayatKunj')) {
            $('#listRiwayatKunj').DataTable().clear().destroy();
        }

        let str = ""

        res.data.forEach(d => {
            let jkel = 'Laki-Laki'
            if (d.jeniskel === 'P') jkel = 'Perempuan'
            str += `<tr>` +
                `<td nowrap>${d.norm}</td>` +
                `<td nowrap>${d.tgltrans}</td>` +
                `<td nowrap>${d.nama}</td>` +
                `<td nowrap>${jkel}</td>` +
                `<td nowrap>${d.kelurahan}</td>` +
                `<td nowrap>${d.kecamatan}</td>` +
                `<td nowrap>${d.kabupaten}</td>` +
                `<td nowrap>${d.noktp}</td>` +
                `<td nowrap>${d.noasuransi}</td>` +
                `</tr>`
        })

        $('#listRiwayatKunj tbody').html(str)
        await $('#listRiwayatKunj').DataTable({
            'paging': true,
            "scrollX": true
        })

        NProgress.done()
        $('#src_data_riwayat').hide()
    }
}

export { tableGenerator }