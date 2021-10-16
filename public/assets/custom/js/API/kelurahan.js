import { Api } from "../core/Api.js";
import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const kelurahan = {
    find: async (kdKec) => {
        NProgress.start()
        C.srcIcon.show('fKel')
        $('#kkelurahan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const res = await Api.showById('Kelurahan', kdKec)

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kdKel}' class='optKelurahan'>${d.kelurahan}</option>`
        });

        $('#kkelurahan').append(str)
        C.srcIcon.hide('fKel')
        NProgress.done()
    },
    reset: () => {
        $('#kkelurahan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"
        $('#kkelurahan').append(str)
    }
}

export { kelurahan }