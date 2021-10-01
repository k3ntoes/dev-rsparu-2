import { base_uri, request_generator, response_generator, getToken } from './../core/jquery.module.js'
let uri, req, res, res1, resData, result

// API Petugas
export let petugas = async () => {
    var _strAll = "";
    var _strPerawat = "";
    var _strDokter = "";
    var _strRO = "";
    var $name

    uri = `${base_uri}API/Petugas`
    $('.petugas').find('.optPetugas').remove().end()
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
        $name = resData.response.aliases
        result.forEach(t => {
            //All Pegawai
            _strAll += '<option value="' + t.nip + '" class="optPetugas">' + t.gelar_d + " " + t.nama + ", " + t.gelar_b + '</option>';
            //Dokter
            if (t.kd_jab == 7 || t.kd_jab == 8 || t.kd_jab == 1) {
                _strDokter += '<option value="' + t.nip + '" class="optPetugas">' + t.gelar_d + " " + t.nama + ", " + t.gelar_b + '</option>';
            }
            //Perawat
            if (t.kd_jab == 10) {
                _strPerawat += '<option value="' + t.nip + '" class="optPetugas">' + t.gelar_d + " " + t.nama + ", " + t.gelar_b + '</option>';
            }
            //RO
            if (t.kd_jab == 12) {
                _strRO += '<option value="' + t.nip + '" class="optPetugas">' + t.gelar_d + " " + t.nama + ", " + t.gelar_b + '</option>';
            }
        });

        if ($name == 'PENDAFTARAN') {
            $('.petugas').append(_strAll);
        } else if ($name == 'TENSI' || $name == 'TENSI TB') {
            $('.petugas').append(_strPerawat);
        } else if ($name == 'POLI UMUM' || $name == 'POLI TB') {
            $('.perawat').append(_strPerawat);
            $('.dokter').append(_strDokter);
        } else if ($name == 'RONTGEN') {
            $('.petugas').append(_strRO);
        }
    }
}