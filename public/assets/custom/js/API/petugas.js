import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const petugas = {
    find: async () => {
        const group = $('#group').val()
        $('#p_loket').find('option').remove().end()
        let strLoket = ""
        let strPerawat = ""
        let strDokter = ""

        const res = await Api.showList('Petugas')

        if (res.metaData.code !== 200) return window.location.href = `${window.location.origin}/logout`

        res.response.data.forEach(d => {
            let nama = `${d.gelar_d} ${d.nama}, ${d.gelar_b}`
            let kdJab = parseInt(d.kd_jab)
            if (kdJab === 10 || kdJab === 17 || kdJab === 18) strLoket += `<option value='${d.nip}'>${nama}</option>`
            if (kdJab === 10) strPerawat += `<option value='${d.nip}'>${nama}</option>`
            if (kdJab === 1) strDokter += `<option value='${d.nip}'>${nama}</option>`
        });

        if (group === "loket") return $('#p_loket').append(strLoket)
        if (group === "tensi") return $('#p_admin_tensi, #p_perawat_tensi').append(strPerawat)

    }
}

export { petugas }