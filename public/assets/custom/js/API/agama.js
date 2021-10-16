import { Api } from "../core/Api.js"
import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"

const agama = {
    find: async () => {
        NProgress.start()
        $('#kdAgama').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const res = await Api.showList('Agama')

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kdAgama}'>${d.agama}</option>`
        });

        $('#kdAgama').append(str)
        NProgress.done()
    },
    reset: () => {

    }
}

export { agama }