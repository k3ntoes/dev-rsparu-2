import { base_uri, request_generator, response_generator, getToken } from './../core/jquery.module.js'
let uri, req, res, res1, resData, result, str

// API Tujuan
export let tujuan = async () => {
    uri = `${base_uri}API/Tujuan`
    $('#ktujuan').find('.optTujuan').remove().end()
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    if (resData.metaData.code === 200) {
        result = resData.response.data
        result.forEach(d => {
            str += `<option value='${d.kd_tujuan}' class='optTujuan'>${d.tujuan}</option>`
        });
        $('#ktujuan').append(str)
    }
}