import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const kelompok = {
    find: async () => {
        $('#kkelompok').find('option').remove().end()
        let str = ""

        const uri = `${C.base_uri}/API/Kelompok/`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return window.location.href = `${window.location.origin}/logout`

        res1.response.data.forEach(d => {
            str += `<option value='${d.kkelompok}' data-biaya='${d.biaya}'>${d.kelompok}</option>`
        });

        $('#kkelompok').append(str)
    },
    setBiaya: e => {
        const i = e.currentTarget.options.selectedIndex
        const v = e.currentTarget.value
        const biaya = e.currentTarget.options[i].dataset.biaya
        if (parseInt(v) === 1) $('#noasuransi').attr('readonly', 'readonly')
        else $('#noasuransi').removeAttr('readonly')
        $('#biaya').val(biaya)
    }
}

export { kelompok }