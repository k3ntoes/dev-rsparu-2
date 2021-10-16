import { Api } from "../core/Api.js"
import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"

const pendidikan = {
    find: async () => {
        NProgress.start()
        $('#kdPendidikan').find('option').remove().end()
        let str = "<option selected>-- Pilih --</option>"

        const res = await Api.showList('Pendidikan')

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kdPend}'>${d.pendidikan}</option>`
        });

        $('#kdPendidikan').append(str)
        NProgress.done()
    },
    reset: () => {

    }
}

export { pendidikan }