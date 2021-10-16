import { Api } from "../core/Api.js";
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

        const res = await Api.showById('Kabupaten',kdProv)

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
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