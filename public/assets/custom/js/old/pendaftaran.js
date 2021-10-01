import { kelompok } from "./API/kelompok.js"


const bt_grup = $('#bt_grup')
const rst = $('#rst')

reset_form = () => {
    bt_grup.hide()
    rst.show()
}

findAlamat = (kdProv, kdKab, kdKec, kdKel) => {

}

pageInit = async () => {
    await kelompok()
    await agama()
    await pendidikan()
    await kelompok()
    await tujuan()
    await provinsi()

    reset_form()
}

$('document').ready(function () {
    setInterval(function () {
        var jam = new Date();
        var j = jam.getHours();
        if (j < 10) {
            j = "0" + j;
        }
        var m = jam.getMinutes();
        if (m < 10) {
            m = "0" + m;
        }
        var d = jam.getSeconds();
        if (d < 10) {
            d = "0" + d;
        }
        $('#jamdaftar').val(j + ":" + m + ":" + d);
    }, 1000);

    $('.select2').select2()
    pageInit()

    $('#kprovinsi').on("change", async () => {
        await kabupaten($('#kprovinsi').val())
        $('#kkecamatan').find('.optKec').remove().end();
        $('#kkelurahan').find('.optKel').remove().end();
    })

    $('#kkabupaten').on("change", async () => {
        await kecamatan($('#kkabupaten').val())
        $('#kkelurahan').find('.optKel').remove().end();
    })

    $('#kkecamatan').on("change", async () => {
        await kelurahan($('#kkecamatan').val())
    })
})