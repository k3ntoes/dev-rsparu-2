import { Api } from "../core/Api.js"
import { MainApp } from "../core/main.js"
import { RequestHelper } from "../core/request_helper.js"

const Riwayat = {
    find: async norm => {
        NProgress.start()
        return await Api.showById('RiwayatTensi', norm)
    },
    action: {
        simpan: async () => {
            MainApp.cekCheckbox('penyDahulu')
            const frm = document.getElementById('frmRiwayat')
            const formData = MainApp.formDatatoObj(new FormData(frm))
            let res
            if (formData.rw_norm === "") return
            if (parseInt(formData.ins_rw) === 1) res = await Api.put('RiwayatTensi', formData.rw_norm, formData)
            else res = await Api.post('RiwayatTensi', formData)

            if (res.metaData.code === 304) {
                return alert(res1.response.message)
            }
            $('#iTensi').addClass('active in')
            $('#liTensi').addClass('active')
            $('#iRiwayat').removeClass('active in')
            $('#liRiwayat').removeClass('active')
            MainApp.autoScroll('formPanel')
            toastr['success'](res.response.message)

            return false
        }
    },
    setForm: {
        setCacFis: id => {
            if (id === 0) return $('#cacatFisikKet').attr('readonly', 'readonly')
            return $('#cacatFisikKet').removeAttr('readonly')
        },
        setAlatBantu: id => {
            if (id === 0) return $('#alatBantuKet').attr('readonly', 'readonly')
            return $('#alatBantuKet').removeAttr('readonly')
        },
        setPengoTB: id => {
            if (id === 0) {
                $('#pengoTBtahun').attr('readonly', 'readonly')
                $('#pengoTBlama').attr('readonly', 'readonly')
                $('#pengoTBtempat').attr('readonly', 'readonly')
                return
            }
            $('#pengoTBtahun').removeAttr('readonly')
            $('#pengoTBlama').removeAttr('readonly')
            $('#pengoTBtempat').removeAttr('readonly')
            return
        },
        setPenyKeluarga: id => {
            if (id === 0) return $('#penyKeluargaKet').attr('readonly', 'readonly')
            return $('#penyKeluargaKet').removeAttr('readonly')
        },
        setAlergi: id => {
            if (id === 0) {
                $('#alergiKet').attr('readonly', 'readonly')
                $('#alergiReaksi').attr('readonly', 'readonly')
                return
            }
            $('#alergiKet').removeAttr('readonly')
            $('#alergiReaksi').removeAttr('readonly')
            return
        },
        setOperasi: id => {
            if (id === 0) {
                $('#operasiJenis').attr('readonly', 'readonly')
                $('#operasiTahun').attr('readonly', 'readonly')
                $('#operasiTempat').attr('readonly', 'readonly')
                return
            }
            $('#operasiJenis').removeAttr('readonly')
            $('#operasiTahun').removeAttr('readonly')
            $('#operasiTempat').removeAttr('readonly')
            return
        },
        setRokok: id => {
            if (id === 0) return $('#rokokKet').attr('readonly', 'readonly')
            return $('#rokokKet').removeAttr('readonly')
        },
        setAlkohol: id => {
            if (id === 0) return $('#alkoholKet').attr('readonly', 'readonly')
            return $('#alkoholKet').removeAttr('readonly')
        },
        setObat: id => {
            if (id === 0) return $('#obatKet').attr('readonly', 'readonly')
            return $('#obatKet').removeAttr('readonly')
        },
        riwayat: (dataKunj, dataRiwayat) => {
            $(`#rw_norm`).val(dataKunj.norm)
            if (dataRiwayat.metaData.code !== 200) return
            const riwayat = dataRiwayat.response.data
            $(`#cacatFisik${riwayat.cacatFisik}`).trigger('click')
            $(`#cacatFisikKet`).val(riwayat.cacatFisikKet)
            $(`#alatBantu${riwayat.alatBantu}`).trigger('click')
            $(`#alatBantuKet`).val(riwayat.alatBantuKet)
            if (riwayat.penyDahulu !== "") {
                let penyDahulu = riwayat.penyDahulu.split(",")
                penyDahulu.forEach(e => {
                    $(`#penyDahulu${e}`).prop('checked', true)
                })
            }
            $(`#penyDahulu`).val(riwayat.penyDahulu)
            $(`#penyLain`).val(riwayat.penyLain)
            $(`#pengoTB${riwayat.pengoTB}`).trigger('click')
            $(`#pengoTBtahun`).val(riwayat.pengoTBtahun)
            $(`#pengoTBlama`).val(riwayat.pengoTBlama)
            $(`#pengoTBtempat`).val(riwayat.pengoTBtempat)
            $(`#pengoLain`).val(riwayat.pengoLain)
            $(`#penyKeluarga${riwayat.penyKeluarga}`).trigger('click')
            $(`#penyKeluargaKet`).val(riwayat.penyKeluargaKet)
            $(`#alergi${riwayat.alergi}`).trigger('click')
            $(`#alergiKet`).val(riwayat.alergiKet)
            $(`#alergiReaksi`).val(riwayat.alergiReaksi)
            $(`#operasi${riwayat.operasi}`).trigger('click')
            $(`#operasiJenis`).val(riwayat.operasiJenis)
            $(`#operasiTahun`).val(riwayat.operasiTahun)
            $(`#operasiTempat`).val(riwayat.operasiTempat)
            $(`#rokok${riwayat.operasi}`).trigger('click')
            $(`#rokokKet`).val(riwayat.rokokKet)
            $(`#alkohol${riwayat.alkohol}`).trigger('click')
            $(`#alkoholKet`).val(riwayat.alkoholKet)
            $(`#obat${riwayat.obat}`).trigger('click')
            $(`#obatKet`).val(riwayat.obatKet)
            $(`#kerja`).val(riwayat.kerja)
            $('#ins_rw').val(1)
            $('#f_riwayat').val(1)
        },
        reset: () => {
            $('#frmRiwayat')[0].reset()
            Riwayat.setForm.setCacFis(0)
            Riwayat.setForm.setAlatBantu(0)
            Riwayat.setForm.setPengoTB(0)
            Riwayat.setForm.setPenyKeluarga(0)
            Riwayat.setForm.setAlergi(0)
            Riwayat.setForm.setOperasi(0)
            Riwayat.setForm.setRokok(0)
            Riwayat.setForm.setAlkohol(0)
            Riwayat.setForm.setObat(0)
            $('#f_riwayat').val(0)
        }
    }
}

export { Riwayat }

//Button Event
$('#cacatFisik0, #cacatFisik1').on('click', e => Riwayat.setForm.setCacFis(parseInt(e.target.value)))
$('#alatBantu0, #alatBantu1').on('click', e => Riwayat.setForm.setAlatBantu(parseInt(e.target.value)))
$('#pengoTB0, #pengoTB1').on('click', e => Riwayat.setForm.setPengoTB(parseInt(e.target.value)))
$('#penyKeluarga0, #penyKeluarga1').on('click', e => Riwayat.setForm.setPenyKeluarga(parseInt(e.target.value)))
$('#alergi0, #alergi1').on('click', e => Riwayat.setForm.setAlergi(parseInt(e.target.value)))
$('#operasi0, #operasi1').on('click', e => Riwayat.setForm.setOperasi(parseInt(e.target.value)))
$('#rokok0, #rokok1').on('click', e => Riwayat.setForm.setRokok(parseInt(e.target.value)))
$('#alkohol0, #alkohol1').on('click', e => Riwayat.setForm.setAlkohol(parseInt(e.target.value)))
$('#obat0, #obat1').on('click', e => Riwayat.setForm.setObat(parseInt(e.target.value)))
$(`input[name='penyDahulu[]']`).on('click', e => {
    const checkId = e.target.getAttribute('id')
    const checkName = e.target.getAttribute('name')
    if (checkId === 'penyDahulu0') {
        if ($(`#${checkId}`).is(':checked')) {
            $(`input[name='${checkName}']`).prop('checked', false)
            $(`#penyDahulu0`).prop('checked', true)
        }
    }
    if (checkId !== 'penyDahulu0') $(`#penyDahulu0`).prop('checked', false)
})

$('#frmRiwayat').on('submit', e => {
    if (!e.isDefaultPrevented()) Riwayat.action.simpan()
    return false
})

