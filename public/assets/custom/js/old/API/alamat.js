import { base_uri, request_generator, response_generator, getToken } from './../core/jquery.module.js'
let uri, req, res, res1, resData, result, str

// API Provinsi
export let provinsi = async (kdProv = null) => {
    str = ""
    uri = `${base_uri}API/Provinsi`
    $('#kprovinsi').find('.optProv').remove().end()
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    if (resData.metaData.code === 200) {
        resData.response.data.forEach(d => {
            str += `<option value='${d.kdProv}' class='optProv'>${d.provinsi}</option>`
        });
        $('#kprovinsi').append(str)
    }
}

// API Kabupaten
export let kabupaten = async (kdProv, kdKab = null) => {
    str = ""
    uri = `${base_uri}API/Kabupaten`
    $('#kkabupaten').find('.optKab').remove().end()
    if (kdProv !== null) uri = `${base_uri}API/Kabupaten/${kdProv}`
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    if (resData.metaData.code === 200) {
        resData.response.data.forEach(d => {
            if (d.kdKab === kdKab) {
                str += `<option value='${d.kdKab}' class='optKab' selected>${d.kabupaten}</option>`
            } else {
                str += `<option value='${d.kdKab}' class='optKab'>${d.kabupaten}</option>`
            }
        });
        $('#kkabupaten').append(str)
        // $('#kkabupaten').val("").trigger('change')
        // if (kdKab !== null) $('#kkabupaten').val(kdKab).trigger('change')
    }
}

// API Kecamatan
export let kecamatan = async (kdKab, kdKec = null) => {
    str = ""
    uri = `${base_uri}API/Kecamatan`
    $('#kkecamatan').find('.optKec').remove().end()
    if (kdKab !== null) uri = `${base_uri}API/Kecamatan/${kdKab}`
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    if (resData.metaData.code === 200) {
        resData.response.data.forEach(d => {
            str += `<option value='${d.kdKec}' class='optKec'>${d.kecamatan}</option>`
        });
        $('#kkecamatan').append(str)
        // if (kdKec !== null) $('#kkecamatan').val(kdKec).trigger('change')
    }
}

// API Kelurahan
export let kelurahan = async (kdKec, kdKel = null) => {
    str = ""
    uri = `${base_uri}API/Kelurahan`
    $('#kkelurahan').find('.optKel').remove().end()
    if (kdKec !== null) uri = `${base_uri}API/Kelurahan/${kdKec}`
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    if (resData.metaData.code === 200) {
        resData.response.data.forEach(d => {
            str += `<option value='${d.kdKel}' class='optKel'>${d.kelurahan}</option>`
        });
        $('#kkelurahan').append(str)
        // if (kdKel !== null) $('#kkelurahan').val(kdKab).trigger('change')
    }
}