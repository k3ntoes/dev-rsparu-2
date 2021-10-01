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

        const uri = `${C.base_uri}/API/Provinsi/`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
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