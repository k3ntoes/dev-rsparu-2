import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

const kelurahan = {
    find: async (kdKec) => {
        NProgress.start()
        C.srcIcon.show('fKel')
        $('#kkelurahan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const uri = `${C.base_uri}/API/Kelurahan/${kdKec}`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
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