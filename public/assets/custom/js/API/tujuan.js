import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"

const tujuan = {
    find: async () => {
        NProgress.start()
        $('#ktujuan').find('option').remove().end()
        let str = "<option value selected>-- Pilih --</option>"

        const uri = `${C.base_uri}/API/Tujuan/`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
            str += `<option value='${d.kd_tujuan}'>${d.tujuan}</option>`
        });

        $('#ktujuan').append(str)
        NProgress.done()
    },
    reset: () => {

    }
}

export { tujuan }