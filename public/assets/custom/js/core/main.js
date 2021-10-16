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
    serializeToObj: arr => {
        const str = arr.reduce((d, x) => {
            d += `"${x.name}": "${x.value}",`
            return d
        }, "")
        const json = `{ ${str.substring(0, str.length - 1)}}`

        return JSON.parse(json)
    },
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
    },
    autoScroll: id => {
        $('html, body').animate({
            scrollTop: $(`#${id}`).offset().top - 60
        }, 1000);
    },
    mapping: (data, ktujuan) => {
        let tunggu = []
        let selesai = []

        data.forEach(e => {
            console.assert(parseInt(e.ktujuan) === ktujuan)
            if (parseInt(e.ktujuan) === ktujuan) tunggu.push(e)
            else selesai.push(e)
        });

        return {
            tunggu: tunggu,
            countTunggu: tunggu.length,
            selesai: selesai,
            countSelesai: selesai.length
        }
    },
    cekCheckbox: (id) => {
        const checkboxes = document.getElementsByName(`${id}[]`);
        let vals = "";
        for (let i = 0, n = checkboxes.length; i < n; i++) {
            if (checkboxes[i].checked) {
                vals += "," + checkboxes[i].value;
            }
        }
        if (vals) vals = vals.substring(1);
        $(`#${id}`).val(vals)
    }
}

MainApp.init()

export { MainApp }