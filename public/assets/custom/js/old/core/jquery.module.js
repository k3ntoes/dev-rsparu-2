import './../../../scripts/jquery.min.js'
import '../../../plugin/bootstrap/js/bootstrap.js'
import '../../../plugin/select2/js/select2.min.js'
import * as tkn from './cekToken.js'
import Generator from './request_generator.js'

const gen = new Generator()
const base_uri = `${window.location.origin}/`
let getToken = () => tkn.getToken()
let deleteToken = () => tkn.deleteToken()
let option_generator = req => gen.option_generator(req)
let formDatatoJson = req => gen.formDatatoJson(req)
let request_generator = (req) => gen.request_generator(req)
let response_generator = (req) => gen.response_generator(req)
let generateHtmlFragment = (id, data) => gen.generateHtmlFragment(id, data)

export default window.jQuery.noConflict(true)
export { base_uri, getToken, deleteToken, option_generator, formDatatoJson, request_generator, response_generator, generateHtmlFragment }