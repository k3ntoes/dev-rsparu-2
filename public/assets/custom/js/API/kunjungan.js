import { Api } from "../core/Api.js"
import { MainApp } from "../core/main.js"
import { RequestHelper } from "../core/request_helper.js"

const Module = {
    find: async notrans => {
        NProgress.start()
        const res = await Api.showById('Kunjungan', notrans)

        return res
    }
}

export { Module as kunjungan }