let getCookie = (cname) => {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

let getToken = () => {
    const token = getCookie('x-token')
    // if (token === "") return window.location.href = `${MainApp.base_uri}/logout`
    return token
}

let formDatatoObj = frmData => {
    const obj = {}
    frmData.forEach((value, key) => {
        obj[key] = value;
    });
    return obj
}


const srcIcon = {
    show: (id) => {
        $(`#${id}`).html('<i class="fa fa-spinner fa-pulse fa-2x"></i>')
    },
    hide: (id) => {
        $(`#${id}`).html("")
    }
}

const disableEnter = () => {
    $('input:text').keydown(e => {
        if (e.keyCode === 13) {
            e.preventDefault
            return false
        }
    })
}

const MainApp = {
    init: () => {
        disableEnter()
    },
    base_uri: window.location.origin,
    token: `Bearer ${getToken()}`,
    formDatatoObj: (frmData) => formDatatoObj(frmData),
    srcIcon: srcIcon,
    autoSelect: (id, val) => {
        $(`select#${id} option`).each(function () {
            this.selected = (this.value == val);
        });
    },
    autoSelectLike: (id, val) => {
        $(`select#${id} option`).each(function () {
            let rg = new RegExp(val, 'gi')
            this.selected = (this.text.match(rg));
        })
        $(`#${id}`).trigger('change')
        return $(`#${id}`).val()
    }
}

MainApp.init()

export { MainApp }