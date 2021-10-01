import GlobalVar from './core/global.js'
import { deleteToken, getToken } from './core/cekToken.js'
import Generator from './core/request_generator.js'

const glo = new GlobalVar()
const frm = document.querySelector('#frmLogin')
const gen = new Generator()
const loaderModal = document.querySelector("#loaderModal")


let initPage = () => {
    const token = getToken()
    if (token !== undefined) window.location.href = "/"
}

let login = async event => {
    loaderModal.style.display = "block"
    const frmData = new FormData(frm)
    const req = {
        uri: `${glo.base_uri()}AUTH/login`,
        method: "POST",
        frmData: gen.formDatatoJson(frmData)
    }
    const res = await gen.request_generator(req)
    const data = await res.json()
    let tipe = "";
    if (data.metaData.code == 200) {
        tipe = 'success';
        document.cookie = `tokens=${data.response.token}`
        setTimeout(function () {
            window.location.href = "/"
        }, "1000");
    } else {
        tipe = 'danger';
    }
    $.notify({
        // options
        message: data.response.message,
    }, {
        delay: 5000,
        timer: 1000,
        type: tipe
    });
    event.preventDefault()
}


frm.addEventListener("submit", login)

initPage()