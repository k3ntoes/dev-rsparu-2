import { base_uri, request_generator, response_generator, getToken } from './../core/jquery.module.js'
let uri, req, res, res1, resData, result, str

// API Pendidikan
export let pendidikan = async () => {
    uri = `${base_uri}API/Pendidikan`
    $('#kdPendidikan').find('.optPendidikan').remove().end()
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
            str += `<option value='${d.kdPend}' class='optPendidikan'>${d.pendidikan}</option>`
        });
        $('#kdPendidikan').append(str)
    }
}
