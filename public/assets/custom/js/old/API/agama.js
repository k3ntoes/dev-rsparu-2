import { base_uri, request_generator, response_generator, getToken } from './../core/jquery.module.js'
let uri, req, res, res1, resData, idx, result, str

// API Agama
let agama = async (data = null) => {
    if (data === null) data = 1
    uri = `${base_uri}API/Agama`
    $('#kdAgama').find('.optAgama').remove().end()
    req = {
        uri: uri,
        method: "GET",
        token: getToken()
    }
    res = await request_generator(req)
    res1 = await res.json()
    resData = await response_generator(res1)
    idx = 0
    if (resData.metaData.code === 200) {
        result = resData.response.data
        result.forEach(d => {
            str += `<option value='${d.kdAgama}' class='optAgama'>${d.agama}</option>`
        });
        $('#kdAgama').append(str)
        $('#kdAgama').val(1).trigger('change')
    }
}

export { agama }