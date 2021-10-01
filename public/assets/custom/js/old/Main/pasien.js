import { kabupaten, kecamatan, kelurahan, provinsi } from "../API/alamat.js"
import { getToken } from "../core/cekToken.js"
import { base_uri, request_generator, response_generator } from "../core/jquery.module.js"
import { autoSelect, autoSelectLike } from "../core/optionRule.js"
import { src_umur } from "../core/srcUmur.js"

const token = getToken()
const uri = `${base_uri}Main/pasien`

export let cariPasien = async data => {
    const req = {
        uri: uri,
        token: token,
        frmData: JSON.stringify(data),
        method: "POST"
    }

    const res = await request_generator(req)
    const res1 = await res.json()

    if (typeof data === 'object') {
        if (res1.new.metaData.code === 200) {
            return setForm(res1.new.response.data[0], "rmbaru")
        } else if (res1.old.metaData.code === 200) {
            return setForm(res1.old.response.data[0], "rmlama")
        }

        return alert("Data Tidak ditemukan")
    }
    // return setCari(res1)
    // console.log(res1)
}

let setForm = async (data, tag) => {
    const kkab = $('#kkabupaten')
    const kkec = $('#kkecamatan')
    const kkel = $('#kkelurahan')
    // var uri = base_uri;

    $('#norm').val(data.norm);
    $('#rmlama').val(data.rmlama);
    autoSelect('kkelompok', data.kkelompok);
    $('#kkelompok').trigger("change");
    autoSelect('kunj', data.kunj);
    $('#noasuransi').val(data.noasuransi);
    $('#noktp').val(data.noktp);
    $('#nama').val(data.nama);
    $('#alamat').val(data.alamat);
    if (tag == "rmlama") {
        autoSelectLike("kkabupaten", data.kkabupaten)
        kkab.val(kkab.val())
        kkab.trigger('change')
        await kecamatan(kkab.val())
        autoSelectLike('kkecamatan', data.kkecamatan)
        kkec.val(kkec.val())
        kkec.trigger('change')
        await kelurahan(kkec.val())
        autoSelectLike('kkelurahan', data.kkelurahan)
        kkel.val(kkel.val())
        kkel.trigger('change')
        // kkec.trigger('select2:select')
        //     var sKab = showKabupaten(base_uri, $('#kkabupaten').val());
        //     sKab.always(function () {
        //         setTimeout(function () {
        //             autoSelectLike('kkecamatan', data.kkecamatan);
        //             var sKec = showKecamatan(base_uri, $('#kkabupaten').val(), $('#kkecamatan').val());
        //             sKec.always(function () {
        //                 setTimeout(function () {
        //                     autoSelectLike('kkelurahan', data.kkelurahan);
        //                     $('#kkelurahan').select2().trigger('change');
        //                 }, 1000);
        //             });
        //         }, 1000);
        //     });
    } else {
        $('#kprovinsi').val(data.kprovinsi).trigger("change")
        await kabupaten(data.kprovinsi)
        $('#kkabupaten').val(data.kkabupaten).trigger("change")
        await kecamatan(data.kkabupaten)
        $('#kkecamatan').val(data.kkecamatan).trigger("change")
        await kelurahan(data.kkecamatan)
        $('#kkelurahan').val(data.kkelurahan).trigger("change")
    }
    $('#rtrw').val(data.rtrw);
    autoSelect('jeniskel', data.jeniskel);
    $('#kdAgama').select2().val(data.kdAgama).trigger("change");
    $('#kdPendidikan').val(data.kdPendidikan).trigger("change");
    if (data.nohp != "") {
        $('#nohp').attr('type', 'password');
    }
    $('#nohp').val(data.nohp);
    $('#tmptlahir').val(data.tmptlahir);
    $('#tgllahir').val(data.tgllahir);
    src_umur();
    $('#statKawin').val(data.statKawin).trigger('change');
    $('#pekerjaan').val(data.pekerjaan);
    $('#pjwb').val(data.pjwb);
    $('#ibuKandung').val(data.ibuKandung);
    autoSelect("goldarah", data.goldarah);
    $('#sts_pasien').val(1);
    $('#bt_grup').show();
    $('#rst').hide();

    // checkTB(data.norm);
}

let setCari = data => {
    console.log("Pencarian executed!!")
}

export let cariPasienBy = async () => {
    const fnama = $('#fnama').val()
    const fdesa = $('#fdesa').val()
    const fkecamatan = $('#fkecamatan').val()
    const fkabupaten = $('#fkabupaten').val()

    const frmData = {
        new: {
            fnama: fnama,
            fdesa: fdesa,
            fkecamatan: fkecamatan,
            fkabupaten: fkabupaten
        },
        old: {
            fnama: fnama,
            fdesa: fdesa,
            fkecamatan: fkecamatan,
            fkabupaten: fkabupaten

        }
    }

    const req = {
        uri: uri,
        token: token,
        frmData: JSON.stringify(frmData),
        method: "POST"
    }

    const res = await request_generator(req)
    const res1 = await res.json()

    showListPasien(res1)
}

let showListPasien = data => {
    let str = "";
    // document.querySelector('.trListPasien').removeEventListener('dblclick');
    $('#src_data_pas').show();
    if ($.fn.DataTable.isDataTable("#listPasien")) {
        $('#listPasien').DataTable().clear().destroy();
    }
    $('#listPasien tbody').find('tr').remove().end();

    if (data.new.metaData.code === 200) {
        $.each(data.new.response.data, (i, d) => {
            str += `<tr style='color:blue;' id='new_${d.norm.replace('.', '')}' data-rm='new_${d.norm.replace('.', '')}'>`
                + `<td nowrap><span class='glyphicon glyphicon-eye-open trListPasien' data-rm='new_${d.norm}'></span></td>`
                + `<td nowrap>${d.norm}</td>`
                + `<td nowrap>${d.rmlama}</td>`
                + `<td nowrap>${d.nama}</td>`
                + `<td nowrap>${d.jeniskel}</td>`
                + `<td nowrap>${d.kkelurahan}</td>`
                + `<td nowrap>${d.kkecamatan}</td>`
                + `<td nowrap>${d.kkabupaten}</td>`
                + `<td nowrap>${d.noktp}</td>`
                + `<td nowrap>${d.noasuransi}</td>`
                + `</tr>`
        })
    }

    if (data.old.metaData.code === 200) {
        $.each(data.old.response.data, (i, d) => {
            str += `<tr id='old_${d.rmlama.replace('.', '')}' data-rm='old_${d.rmlama}'>`
                + `<td nowrap><span class='glyphicon glyphicon-eye-open trListPasien' data-rm='old_${d.rmlama}'></span></td>`
                + `<td nowrap>${d.norm}</td>`
                + `<td nowrap>${d.rmlama}</td>`
                + `<td nowrap>${d.nama}</td>`
                + `<td nowrap>${d.jeniskel}</td>`
                + `<td nowrap>${d.kkelurahan}</td>`
                + `<td nowrap>${d.kkecamatan}</td>`
                + `<td nowrap>${d.kkabupaten}</td>`
                + `<td nowrap>${d.noktp}</td>`
                + `<td nowrap>${d.noasuransi}</td>`
                + `</tr>`
        })
    }

    $('#listPasien tbody').html(str);
    $('#listPasien').DataTable({
        'paging': true,
        "scrollX": true,
        "order": [[0, "desc"]]
    });

    if (str !== "") {
        const btMata = $('#listPasien tbody')
        btMata[0].childNodes.forEach(element => {

            element.addEventListener('dblclick', (e => {
                cariCurrentRm(element)
            }))
        })
    }
    $('#src_data_pas').hide();
}

let cariCurrentRm = (curTarget) => {
    let req
    const trId = $(`#${curTarget.id}`)
    trId.css("background", "blue")
    trId.css("color", "white")

    const splitId = curTarget.dataset.rm.split("_")
    const norm = splitId[1]
    if (splitId[0] === "new") {
        req = {
            new: {
                norm: norm
            }
        }
    } else {
        req = {
            old: {
                norm: norm
            }
        }
    }

    return cariPasien(req)
}