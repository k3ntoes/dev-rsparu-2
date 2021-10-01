import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"

const agama = {
    find: async () => {
        NProgress.start()
        $('#kdAgama').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const uri = `${C.base_uri}/API/Agama/`
        const req = {
            uri: uri,
            method: "GET",
            token: C.token
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 200) return alert(res1.metaData.message)

        res1.response.data.forEach(d => {
            str += `<option value='${d.kdAgama}'>${d.agama}</option>`
        });

        $('#kdAgama').append(str)
        NProgress.done()
    },
    reset: () => {

    }
}

export { agama }