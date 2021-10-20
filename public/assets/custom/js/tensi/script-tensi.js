import { DaftarTunggu } from "../API/daftarTunggu.js";
import { petugas } from "../API/petugas.js";
import { tujuan } from "../API/tujuan.js";
import { Api } from "../core/Api.js";
import { MainApp } from "../core/main.js";
import { biodata } from "./biodata.js";
import { daftar_tunggu_tensi } from "./daftar_tunggu.js";
import { Riwayat } from "./riwayat.js";

const Tensi = {
    init: async () => {
        $('.select2').select2({ width: '100%' })
        Tensi.setForm.reset()
    },
    action: {
        simpan: async () => {
            MainApp.cekCheckbox('demamWaktuPagi')
            const frm = document.getElementById('frmTensi')
            const formData = MainApp.formDatatoObj(new FormData(frm))
            let res

            if (parseInt(formData.updTensi) === 1) res = await Api.put('Tensi', formData.notrans, formData)
            else res = await Api.post('Tensi', formData)

            if (res.metaData.code === 304) {
                $('#iTensi').removeClass('active in')
                $('#liTensi').removeClass('active')
                $('#iRiwayat').addClass('active in')
                $('#liRiwayat').addClass('active')
                MainApp.autoScroll('formPanel')
                return alert(res.response.message)
            }
            toastr['success'](res.response.message)
            Tensi.setForm.reset()
        }
    },
    setForm: {
        setSumber: id => {
            if (id === 0) {
                $('#ketSmbrData').attr('readonly', 'readonly')
                $('#hubSmbrData').attr('readonly', 'readonly')
                return
            }
            $('#ketSmbrData').removeAttr('readonly')
            $('#hubSmbrData').removeAttr('readonly')
            return
        },
        setRuj: id => {
            if (id === 0) return $('#ketStatRujuk').attr('readonly', 'readonly')
            return $('#ketStatRujuk').removeAttr('readonly')
        },
        setPsiko: id => {
            if (id === 3) return $('#otherPsiko').removeAttr('readonly')
            return $('#otherPsiko').attr('readonly', 'readonly')
        },
        reset: async () => {
            const p_admin_tensi = $('#p_admin_tensi').val()
            const p_perawat_tensi = $('#p_perawat_tensi').val()
            biodata.resetData()
            $('#frmTensi')[0].reset()
            Riwayat.setForm.reset()
            $('#norm').removeAttr('readonly')
            Tensi.setForm.setSumber(0)
            Tensi.setForm.setRuj(0)
            Tensi.setForm.setPsiko(0)
            $('#otherPsiko').attr('readonly', 'readonly')

            $('#p_admin_tensi').val(p_admin_tensi).trigger('change')
            $('#p_perawat_tensi').val(p_perawat_tensi).trigger('change')

            MainApp.autoScroll('tungguPanel')
            await DaftarTunggu.action.showList('Tensi', $('#tgl').val(), 1)
            DaftarTunggu.setData.data_table()

            // Tensi.init()
        },
        tensi: (kunj, res_tensi, t_petugas) => {
            $('#norm').val(kunj.norm)
            $('#norm').attr('readonly', 'readonly')
            $('#notrans').val(kunj.notrans)
            if (res_tensi.metaData.code === 200) {
                const tensi = res_tensi.response.data
                const petugas = t_petugas.response.data
                $(`#smbrData${tensi.smbrData}`).trigger('click')
                $('#ketSmbrData').val(tensi.ketSmbrData)
                $('#hubSmbrData').val(tensi.hubSmbrData)
                $(`#statRujuk${tensi.statRujuk}`).trigger('click')
                $('#ketStatRujuk').val(tensi.ketStatRujuk)
                $('#td').val(tensi.td)
                $('#fnadi').val(tensi.fnadi)
                $('#suhu').val(tensi.suhu)
                $('#fnafas').val(tensi.fnafas)
                $('#spo2').val(tensi.spo2)
                $('#bb').val(tensi.bb)
                $('#tb').val(tensi.tb)
                $(`#hilangBB3Bln${tensi.hilangBB3Bln}`).trigger('click')
                $(`#turunAsupMkn${tensi.turunAsupMkn}`).trigger('click')
                $(`#psiko${tensi.psiko}`).trigger('click')
                Tensi.setForm.setPsiko(parseInt(tensi.psiko))
                $('#otherPsiko').val(tensi.otherPsiko)
                $('#hasilPeriksaSebelumnya').val(tensi.hasilPeriksaSebelumnya)
                $('#batuk').val(tensi.batuk)
                $(`#batukDahak${tensi.batukDahak}`).trigger('click')
                $('#batukDarah').val(tensi.batukDarah)
                $(`#batukDarahKualitas${tensi.batukDarahKualitas}`).trigger('click')
                $('#sesak').val(tensi.sesak)
                $(`#sesakSuara`).val(tensi.sesakSuara).trigger('change')
                $('#nyeriDada').val(tensi.nyeriDada)
                $(`#nyeriDadaLok${tensi.nyeriDadaLok}`).trigger('click')
                $('#demam').val(tensi.demam)
                if (tensi.demamWaktuPagi !== "") {
                    let demamWaktuPagi = tensi.demamWaktuPagi.split(",")
                    demamWaktuPagi.forEach(e => {
                        $(`#demamWaktuPagi${e}`).prop('checked', true)
                    })
                }
                $(`#penyDahulu`).val(tensi.penyDahulu)
                $('#keluhanLain').val(tensi.keluhanLain)
                $('#p_admin_tensi').val(petugas.p_admin_tensi).trigger('change')
                $('#p_perawat_tensi').val(petugas.p_perawat_tensi).trigger('change')
                $('#ktujuan').val(kunj.ktujuan).trigger('change')
                $('#updTensi').val(1)
            }
            MainApp.autoScroll('formPanel')
        }
    }
}

export { Tensi }

petugas.find()
tujuan.find()

$(document).ready(() => { Tensi.init() })

$('#smbrData0, #smbrData1').on('click', e => Tensi.setForm.setSumber(parseInt(e.target.value)))
$('#statRujuk0, #statRujuk1').on('click', e => Tensi.setForm.setRuj(parseInt(e.target.value)))
$(`input[name=psiko]`).on('click', () => {
    if ($('#psiko3').is(':checked')) $('#otherPsiko').removeAttr('readonly')
    else $('#otherPsiko').attr('readonly', 'readonly')
})

$('#frmTensi').on("submit", e => {
    if (!e.isDefaultPrevented()) Tensi.action.simpan()
    return false
})

$('#batal_tensi').on('click', Tensi.setForm.reset)