import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"
import { tableGenerator } from "./table-generator.js"

const Module = {
    init: () => {
        $('#frnama, #frdesa, #frkecamatan, #frkabupaten, #frnorm').keydown(async e => {
            if (e.keyCode === 13) {
                return Module.action.cari()
            }
        })

        $('.btn-r-cari').on('click', e => {
            Module.action.cari()
        })
    },
    action: {
        cari: async () => {
            $('#src_data_riwayat').show()
            NProgress.start()
            const formData = {
                frnama: $('#frnama').val(),
                frdesa: $('#frdesa').val(),
                frkecamatan: $('#frkecamatan').val(),
                frkabupaten: $('#frkabupaten').val(),
                frnorm: $('#frnorm').val()
            }

            const req = {
                uri: `${C.base_uri}/API/Riwayat/Kunjungan`,
                method: 'POST',
                token: C.token,
                formData: formData
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            if (res1.metaData.code !== 200) {
                NProgress.done()
                $('#src_data_pas').hide()
                return
            }

            return tableGenerator.riwayatGenerator(res1.response)
        }
    }

}

Module.init()

export { Module as kunjLoket }