import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { kabupaten } from "./kabupaten.js";

const diagnosa = {
    find: async () => {
        NProgress.start()
        kabupaten.reset()
        $('#kprovinsi').find('option').remove().end()
        let str = ""

        const res = await Api.showList('Diagnosa')

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kdProv}'>${d.provinsi}</option>`
        });

        $('#kprovinsi').append(str)
        C.srcIcon.hide('fProv')
        NProgress.done()
    }
}

export { provinsi }