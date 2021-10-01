export let getToken = () => {
    const coki = `; ${document.cookie}`
    let token = coki.split(`; tokens=`)
    if (token.length == 2) return token[1]
    if (window.location.pathname == "/Login") return
    return window.location.href = "/Login"
}

export let deleteToken = () => {
    document.cookie = "tokens=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    return window.location.href = "/Login"
}