import Generator from './request_generator.js'
const _body = document.querySelector('body')
const _modal = document.querySelector('.modal')
const gen = new Generator()

export default class Modal {
    show = (id) => {
        const backdrop = document.querySelector('#backdrop')
        backdrop.innerHTML = ""
        const bd = `<div class="modal-backdrop fade in"></div>`
        gen.generateHtmlFragment(backdrop, bd)
        id.style.display = "block"
        id.classList.toggle("in")
    }

    hide = (id) => {
        const backdrop = document.querySelector('#backdrop')
        backdrop.innerHTML = ""
        id.style.display = "none"
        id.classList.toggle("in")
    }
}