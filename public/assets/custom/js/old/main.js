import { base_uri, getToken, request_generator, generateHtmlFragment } from './core/jquery.module.js'

const token = getToken()
const mainContent = document.querySelector("#main-content")

let lua = () => {
    var curUri = window.location.hash
    curUri = curUri.replace('#', '')
    if (curUri != '' || curUri != null) return curUri
    return
};

let disable_enter = () => {
    $('input[type=text]').on("keydown", function (e) {
        var keyCode = e.keyCode
        if (keyCode === 13) {
            e.preventDefault()
            return false
        }
    })
}

let buka_uri = async () => {
    let curUri = lua()
    $('#loaderModal').modal('show');
    let uri = ""
    if (base_uri + curUri != base_uri && curUri != "") {
        uri = base_uri + curUri
    } else {
        uri = base_uri + 'main/dashboard'
    }

    const req = {
        uri: uri,
        method: "GET",
        token: token
    }

    const res = await request_generator(req)
    const data = await res.text()
    mainContent.innerHTML = ""
    generateHtmlFragment(mainContent, data)
    disable_enter()
    $('.datepicker').datepicker({
        autoclose: true,
        todayBtn: "linked",
        format: "yyyy-mm-dd"
    })
    $('#loaderModal').modal('hide');
}

window.addEventListener('popstate', function (event) {
    // Log the state data to the console
    buka_uri()
})

$(() => {
    document.querySelector('body').classList.add('menu-active')
})

buka_uri()