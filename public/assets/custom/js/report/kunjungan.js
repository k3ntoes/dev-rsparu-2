import { MainApp as C } from "../core/main.js";
import { RequestHelper as R } from "../core/request_helper.js";

let cariKunjungan = async () => {
    const tahun = $('#tahun').val()
    const req = {
        uri: `${C.base_uri}/Report/Kunjungan/${tahun}`,
        method: "GET",
        token: C.getToken()
    }

    const res = await R.requestGenerator(req)
    const res1 = await res.json()

    if (res1.metaData.code !== 200) return alert(`upsss... \n ${res1.response.message}`)
    let rr = []
    const redc = res1.response.data.reduce((hasil = [], arr) => {
        const x = {
            kdKab: arr.kdKab,
            kabupaten: arr.kabupaten
        }
        if (!hasil.includes(arr.kabupaten)) {
            hasil.push(arr.kabupaten)
            rr.push(x)
        }
        return hasil
    }, [])

    generateStrTable(res1.response.data, rr)
}

let generateStrTable = (data, redc) => {
    if($.fn.dataTable.isDataTable("#listKunjungan")) $('#listKunjungan').DataTable().destroy()
    let no = 0
    let strKab = ''
    let jml1 = 0
    let jml2, jml3, jml4, jml5, jml6, jml7, jml8, jml9, jml10, jml11, jml12

    redc.forEach(e => {
        no = no + 1
        strKab += `<tr id='tr-${e.kdKab}'>
                        <td>${no}</td>
                        <td>${e.kabupaten}</td>
                        <td id="bln-1">0</td>
                        <td id="bln-2">0</td>
                        <td id="bln-3">0</td>
                        <td id="bln-4">0</td>
                        <td id="bln-5">0</td>
                        <td id="bln-5">0</td>
                        <td id="bln-7">0</td>
                        <td id="bln-8">0</td>
                        <td id="bln-9">0</td>
                        <td id="bln-10">0</td>
                        <td id="bln-11">0</td>
                        <td id="bln-12">0</td>
                    </tr>`
    });

    $('#listKunjungan tbody').html(strKab)

    data.forEach(d => {
        $(`#tr-${d.kdKab} #bln-${d.bulan}`).html(d.jml)
        let td = $(`#jml-${d.bulan}`)
        for (let i = 1; i <= 12; i++) {
            let j = parseInt(td.html())
            if (parseInt(d.bulan) === i) td.html(j + parseInt(d.jml))
        }
    })

    $('#listKunjungan').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    })
}

cariKunjungan()

$('#cariDaftarTunggu').on('click', cariKunjungan)