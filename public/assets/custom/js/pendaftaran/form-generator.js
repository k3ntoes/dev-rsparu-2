import { MainApp as C } from "../core/main.js"
import { RequestHelper as R } from "../core/request_helper.js"
import { tanggal } from "../core/tanggal.js"
import { kabupaten } from '../API/kabupaten.js'
import { kecamatan } from "../API/kecamatan.js"
import { kelurahan } from "../API/kelurahan.js"
import { Cari } from "./cari.js"

const formGenerator = {
    init: () => {
        formGenerator.reset_form()
    },
    reset_form: async () => {
        let loket = $('#loket').val()
        let petugas = $('#p_loket').val()
        $('#frm')[0].reset()
        $('#stat_tb').removeAttr('style')
        $('#stat_tb span').removeAttr('style')
        $('#stat_tb span').html('NTB')
        $('#tgldaftar').val(tanggal.skrng)
        $('#kkelompok').val(1).trigger('change')
        $('#kprovinsi').val(33).trigger("change").trigger('select2:select')
        $('#kkelurahan').find('.optKelurahan').remove().end()
        $('#kdAgama').val("1").trigger("change")
        $('#kdPendidikan').val("1").trigger("change")
        $('#nohp').attr('type', 'text')
        $('select#ktujuan option:eq(0)').prop('selected', true).trigger('change')
        $('#statKawin').val('').trigger("change")
        $('#updKunj').val(0)
        $('#bt_grup').hide()
        $('#rst').show()
        C.autoSelect('loket', loket)
        C.autoSelect('p_loket', petugas)
        $('#norm').focus()
        NProgress.done()
    },
    generateNew: async (tag, data) => {

        $('#norm').val(data.norm)
        $('#rmlama').val(data.rmlama)
        C.autoSelect('kkelompok', data.kkelompok)
        $('#kkelompok').trigger("change")
        C.autoSelect('kunj', data.kunj)
        $('#noasuransi').val(data.noasuransi)
        $('#noktp').val(data.noktp)
        $('#nama').val(data.nama)
        $('#alamat').val(data.alamat)
        if (tag === "new") {
            $('#kprovinsi').val(data.kprovinsi).trigger('change')
            await kabupaten.find(data.kprovinsi)
            $('#kkabupaten').val(data.kkabupaten).trigger('change')
            await kecamatan.find(data.kkabupaten)
            $('#kkecamatan').val(data.kkecamatan).trigger('change')
            await kelurahan.find(data.kkecamatan)
            $('#kkelurahan').val(data.kkelurahan).trigger('change')
        }
        if (tag === "old") {
            $('#kprovinsi').val('33').trigger('change')
            await kabupaten.find('33')
            let kkab = C.autoSelectLike('kkabupaten', data.kkabupaten)
            await kecamatan.find(kkab)
            let kkec = C.autoSelectLike('kkecamatan', data.kkecamatan)
            await kelurahan.find(kkec)
            C.autoSelectLike('kkelurahan', data.kkelurahan)
        }
        $('#rtrw').val(data.rtrw)
        C.autoSelect('jeniskel', data.jeniskel)
        $('#kdAgama').select2().val(data.kdAgama).trigger("change")
        $('#kdPendidikan').val(data.kdPendidikan).trigger("change")
        if (data.nohp != "") {
            $('#nohp').attr('type', 'password')
        }
        $('#nohp').val(data.nohp)
        $('#tmptlahir').val(data.tmptlahir)
        $('#tgllahir').val(data.tgllahir)
        tanggal.src_umur()
        $('#statKawin').val(data.statKawin).trigger('change')
        $('#pekerjaan').val(data.pekerjaan)
        $('#pjwb').val(data.pjwb)
        $('#ibuKandung').val(data.ibuKandung)
        C.autoSelect("goldarah", data.goldarah)
        $('#sts_pasien').val(1)
        $('#bt_grup').show()
        $('#rst').hide()
        NProgress.done()
    },
    simpan: async (e) => {
        NProgress.start()
        e.preventDefault()

        if ($('#nourut').val() === "") {
            $('#nourut').focus()
            alert('Norm tidak Boleh Kosong!')
            return false
        }

        if ($('#kkelompok').val() !== "1" && $('#noasuransi').val() === "") {
            $('#noasuransi').focus()
            alert('No Asuransi tidak boleh Kosong!')
            return false
        }

        const frm = document.getElementById('frm')
        const formData = C.formDatatoObj(new FormData(frm))

        const req = {
            uri: `${C.base_uri}/API/Kunjungan`,
            method: `POST`,
            token: C.token,
            formData: formData
        }

        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code === 302) {
            const a = alert('Pasien sudah pernah terdaftar!')
            return Cari.action.cariFormNew(res1.response.data.result.norm)
        }

        if (res1.metaData.code !== 201) {
            const x = confirm('Pasien sudah pernah didaftar hari ini\n akan update data?')
            if (x === true) {
                $('#updKunj').val(1)
                return $('#save-bt').click()
            }
            NProgress.done()
            return false
        }

        toastr["success"](`${res1.response.message}, ${res1.response.data}`)
        const u = confirm('akan mencetak data?')
        if (u === true) formGenerator.cetak(res1.response.data)
        formGenerator.reset_form()

        NProgress.done()
        return false
    },
    updatePasien: async () => {
        NProgress.start()

        const frm = document.getElementById('frm')
        const formData = C.formDatatoObj(new FormData(frm))

        const req = {
            uri: `${C.base_uri}/API/Pasien/${formData.norm}`,
            method: `PUT`,
            token: C.token,
            formData: formData
        }
        const res = await R.requestGenerator(req)
        const res1 = await res.json()

        if (res1.metaData.code !== 201) {
            toastr["danger"](`${res1.response.message}`)
            return false
        }

        toastr["success"](`${res1.response.message}, ${res1.response.data}`)
        const u = confirm('akan mencetak data?')
        if (u === true) formGenerator.cetak(res1.response.data)
        formGenerator.reset_form()

        NProgress.done()
    },
    cetak: norm => {
        console.log(norm)
    }
}

export { formGenerator }