import { Api } from "../core/Api.js";

const diagnosa = {
    find: async () => {
        NProgress.start()
        $('.diagnosa').find('option').remove().end()
        let str = "<option>--Pilih--</option>"
        const res = await Api.showList('Diagnosa')
        if (res.metaData.code !== 200) return alert(res.metaData.message)
        res.response.data.forEach(d => {
            str += `<option value='${d.kdDiag}'>${d.diagnosa}</option>`
        });
        $('.diagnosa').append(str)
        NProgress.done()
    }
}

export { diagnosa }