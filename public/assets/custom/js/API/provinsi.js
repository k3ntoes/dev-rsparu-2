import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";
import { kabupaten } from "./kabupaten.js";


const provinsi = {
    find: async () => {
        NProgress.start()
        kabupaten.reset()
        C.srcIcon.show('fProv')
        $('#kprovinsi').find('option').remove().end()
        let str = ""

        const res = await Api.showList('Provinsi')

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kdProv}'>${d.provinsi}</option>`
        });

        $('#kprovinsi').append(str)
        C.srcIcon.hide('fProv')
        NProgress.done()
    }
}

$('#kprovinsi').on('select2:select', async (e) => {
    const i = e.currentTarget.options.selectedIndex
    const kdProv = e.currentTarget.options[i].value
    await kabupaten.find(kdProv)
})

export { provinsi }