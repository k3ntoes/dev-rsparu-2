import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";
import { kecamatan } from "./kecamatan.js";


const kabupaten = {
    find: async (kdProv) => {
        NProgress.start()
        kecamatan.reset()
        C.srcIcon.show('fKab')
        $('#kkabupaten').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const uri = `${C.base_uri}/API/Kabupaten/${kdProv}`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
            str += `<option value='${d.kdKab}'>${d.kabupaten}</option>`
        });

        $('#kkabupaten').append(str)
        C.srcIcon.hide('fKab')
        NProgress.done()
    },
    reset: () => {
        $('#kkabupaten').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"
        $('#kkabupaten').append(str)
    }
}

$('#kkabupaten').on('select2:select',async e => {
    const i = e.currentTarget.options.selectedIndex
    const kdKab = e.currentTarget.options[i].value
    await kecamatan.find(kdKab)
})

export { kabupaten }