import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const petugas = {
    find: async () => {
        const group = $('#group').val()
        $('#p_loket').find('option').remove().end()
        let strLoket = ""

        const uri = `${C.base_uri}/API/Petugas/`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return window.location.href = `${window.location.origin}/logout`

        res1.response.data.forEach(d => {
            let nama = `${d.gelar_d} ${d.nama}, ${d.gelar_b}`
            let kdJab = parseInt(d.kd_jab)
            if (kdJab === 10 || kdJab === 17 || kdJab === 18) {
                strLoket += `<option value='${d.nip}'>${nama}</option>`
            }
        });
        if (group === "loket") return $('#p_loket').append(strLoket)
    }
}

export { petugas }