import { deleteToken } from "./cekToken.js";
export default class Generator {
    formDatatoJson = frmData => {
        const obj = {}
        frmData.forEach((value, key) => {
            obj[key] = value;
        });
        return JSON.stringify(obj)
    }

    option_generator = req => {
        if (req.method === 'GET' || req.method === 'DELETE') {
            return {
                headers: {
                    'content-type': 'application/json',
                    'Cross-Origin-Embedder-Policy': '*',
                    'Cross-Origin-Opener-Policy': '*',
                    'x-token': req.token
                },
                method: req.method,
            }
        }

        return {
            headers: {
                'content-type': 'application/json',
                'Cross-Origin-Embedder-Policy': '*',
                'Cross-Origin-Opener-Policy': '*',
                'x-token': req.token
            },
            method: req.method,
            body: req.frmData
        }
    }

    request_generator = async (req) => {
        let uri = req.uri
        // console.log(JSON.stringify(this.option_generator(req)))
        return fetch(uri, this.option_generator(req))
    }

    response_generator = async (req) => {
        if (req.metaData.code === 401) {
            $.notify({
                // options
                message: "Session Habis",
            }, {
                delay: 5000,
                timer: 1000,
                type: "danger"
            });
            deleteToken()
            return setTimeout(() => {
                getToken()
            }, 2000)
        }

        return req
    }

    generateHtmlFragment = (id, data) => {
        const fragment = document.createRange().createContextualFragment(data)
        id.append(fragment)
    }
}