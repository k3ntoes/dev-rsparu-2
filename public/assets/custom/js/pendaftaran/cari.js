import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from '../core/request_helper.js'
import { formGenerator } from "./form-generator.js"
import { tableGenerator } from "./table-generator.js"


const Module = {
    init: () => {
        $('#fnama, #fdesa, #fkecamatan, #fkabupaten, #frmlama').keydown(async e => {
            if (e.keyCode === 13) {
                return Module.action.cari()
            }
        })

        $('.btn-cari').on('click', e => {
            Module.action.cariLama()
        })

        $('#listPasien tbody').on('dblclick', 'span', e => {
            if (e.target.dataset.stat === "new") return Module.action.cariFormNew(e.target.dataset.id)
            return Module.action.cariFormOld(e.target.dataset.id)
        })
    },
    action: {
        cari: async () => {
            const p_old = await Module.action.cariLama()
            const p_new = await Module.action.cariBaru()

            const data = {
                old: p_old,
                new: p_new
            }

            return tableGenerator.cariGenerator(data)
        },
        cariLama: async () => {
            $('#src_data_pas').show()
            NProgress.start()
            const formData = {
                fnama: $('#fnama').val(),
                fdesa: $('#fdesa').val(),
                fkecamatan: $('#fkecamatan').val(),
                fkabupaten: $('#fkabupaten').val(),
                frmlama: $('#frmlama').val()
            }

            const req = {
                uri: `${C.base_uri}/API/PasienOld/form/cari`,
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

            return res1.response
        },
        cariBaru: async () => {
            $('#src_data_pas').show()
            NProgress.start()
            const formData = {
                fnama: $('#fnama').val(),
                fdesa: $('#fdesa').val(),
                fkecamatan: $('#fkecamatan').val(),
                fkabupaten: $('#fkabupaten').val(),
                frmlama: $('#frmlama').val()
            }

            const req = {
                uri: `${C.base_uri}/API/Pasien/form/cari`,
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

            return res1.response
        },
        cariFormOld: async rmlama => {
            NProgress.start()
            const req = {
                uri: `${C.base_uri}/API/PasienOld/${rmlama}`,
                method: 'GET',
                token: C.token
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            if (res1.metaData.code !== 200) return alert(res1.response.message)
            $(`#old-${rmlama.replace('.', '')}`).removeClass('text-primary')
            $(`#old-${rmlama.replace('.', '')}`).css("background-color", "blue")
            $(`#old-${rmlama.replace('.', '')}`).css("color", "white")
            return formGenerator.generateNew('old', res1.response.data)
        },
        cariFormNew: async norm => {
            NProgress.start()
            const req = {
                uri: `${C.base_uri}/API/Pasien/${norm}`,
                method: 'GET',
                token: C.token
            }

            const res = await R.requestGenerator(req)
            const res1 = await res.json()

            if (res1.metaData.code !== 200) return alert(res1.response.message)
            $(`#new-${norm}`).removeClass('text-primary')
            $(`#new-${norm}`).css("background-color", "blue")
            $(`#new-${norm}`).css("color", "white")
            return formGenerator.generateNew('new', res1.response.data)
        }
    }

}

export { Module as Cari }

$(document).ready(() => {
    Module.init()
})