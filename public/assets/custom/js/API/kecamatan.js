import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";
import { kelurahan } from "./kelurahan.js";

const kecamatan = {
    find: async (kdKab) => {
        NProgress.start()
        C.srcIcon.show('fKec')
        $('#kkecamatan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"
        const res1 = await Api.showById('Kecamatan', kdKab)
        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
            str += `<option value='${d.kdKec}'>${d.kecamatan}</option>`
        });

        $('#kkecamatan').append(str)
        C.srcIcon.hide('fKec')
        NProgress.done()
    },
    reset: () => {
        $('#kkecamatan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"
        $('#kkecamatan').append(str)
    }
}

$('#kkecamatan').on('select2:select', async e => {
    const i = e.currentTarget.options.selectedIndex
    const kdKec = e.currentTarget.options[i].value
    await kelurahan.find(kdKec)
})

export { kecamatan }