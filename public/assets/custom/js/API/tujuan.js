import { Api } from "../core/Api.js"
import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"

const tujuan = {
    find: async () => {
        NProgress.start()
        $('#ktujuan').find('option').remove().end()
        let str = "<option value selected>-- Pilih --</option>"
        
        const res = await Api.showList('Tujuan')

        if (res.metaData.code !== 200) return alert(res.metaData.message)

        res.response.data.forEach(d => {
            str += `<option value='${d.kd_tujuan}'>${d.tujuan}</option>`
        });

        $('#ktujuan').append(str)
        NProgress.done()
    },
    reset: () => {

    }
}

export { tujuan }