import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const kelompok = {
    find: async () => {
        $('#kkelompok').find('option').remove().end()
        let str = ""

        const res = await Api.showList('Kelompok')

        if (res.metaData.code !== 200) return window.location.href = `${window.location.origin}/logout`

        res.response.data.forEach(d => {
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