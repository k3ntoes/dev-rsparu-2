
export default class GlobalVar {
    loaderModal = () => {
        return document.getElementById('loaderModal')
    }

    base_uri = () => {
        return window.location.origin + "/"
    }
}