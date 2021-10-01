import { base_uri, formDatatoJson, request_generator } from "../core/jquery.module.js";
import { autoSelect } from "../core/optionRule.js";
import { tgl_sekarang } from "../core/srcUmur.js";

export default class FormModule {
    reset_form = async () => {
        var loket = $('#loket').val()
        var petugas = $('#p_loket').val()
        $('#frm')[0].reset()

        $('#stat_tb').removeAttr('style')
        $('#stat_tb span').removeAttr('style')
        $('#stat_tb span').html('NTB')
        $('#kkelompok').val(1).trigger('change')
        $('#kprovinsi').val(33).trigger('change')
        $('#kkabupaten').find('.optKab').remove().end()
        $('#kkecamatan').find('.optKec').remove().end()
        $('#kkelurahan').find('.optKel').remove().end()
        $('#kdAgama').val("1").trigger("change")
        $('#kdPendidikan').val("1").trigger("change")
        $('#nohp').attr('type', 'text')
        $('#statKawin').val('').trigger("change")
        $('#ktujuan').val('').trigger("change")
        $('#updKunj').val(0)
        $('#bt_grup').hide()
        $('#rst').show()
        autoSelect('loket', loket)
        autoSelect('p_loket', petugas)
        console.log(tgl_sekarang())
        $('#tgldaftar').val(tgl_sekarang())
        $('#norm').focus()
    }

    doSimpan = async () => {
        if ($('#nourut').val() == "") {
            alert('Nomor Urut Belum Di ISI!!!');
            return false;
        }

        if ($('#ktujuan').val() == "") {
            alert('Pilih Tujuan!!!');
            $('#ktujuan').focus();
            return false;
        }

        const frm = document.querySelector('#frm')
        const frmData = new FormData(frm)
        const req = {
            uri: `${base_uri}Main/pasien/new`,
            frmData: formDatatoJson(frmData),
            method: "POST"
        }

        const res = await request_generator(req)
        const res1=await res.json()

        // var smpn = $.post(base_uri + "Pendaftaran/Simpan", $('#frm').serializeArray(), function (json) {
        //     if (json.metaData.code == 201) {
        //         $.notify({
        //             // options
        //             message: json.response.message + ", <span findData(\'norm_" + json.response.norm + "'); >" + json.response.norm + "</span>",
        //         }, {
        //             delay: 5000,
        //             timer: 1000,
        //             type: 'success'
        //         });
        //         $('#ulangBtn').removeAttr("onClick");

        //         var x = confirm("Cetak Kartu?");
        //         if (x == true) {
        //             $('#norm').val(json.response.norm);
        //             cetak();
        //             $('#bt_grup').show();
        //             $('#rst').hide();
        //         }
        //         reset_form();
        //     } else if (json.metaData.code == 302) {
        //         var y = confirm(json.response.message + ", Akan Mengupdate Data?");
        //         if (y == true) {
        //             $('#updKunj').val(1);
        //             $('#frm').submit();
        //         } else {
        //             reset_form();
        //         }
        //     } else {
        //         $.notify({
        //             // options
        //             message: json.response.message,
        //         }, {
        //             delay: 5000,
        //             timer: 1000,
        //             type: 'danger'
        //         });
        //     }
        // }, "json");
        // smpn.always(function (data) { });


        return false;
    }
}