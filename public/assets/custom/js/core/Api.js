import { MainApp } from "./main.js"
import { RequestHelper } from "./request_helper.js"

const Api = {
    showList: async (uri) => {
        const req = {
            uri: `${MainApp.base_uri}/API/${uri}`,
            method: "GET"
        }
        const res = await RequestHelper.requestGenerator(req)
        return await res.json()
    },
    showById: async (uri, id) => {
        const req = {
            uri: `${MainApp.base_uri}/API/${uri}/${id}`,
            method: "GET"
        }
        const res = await RequestHelper.requestGenerator(req)
        return await res.json()
    },
    post: async (uri, data) => {
        const req = {
            uri: `${MainApp.base_uri}/API/${uri}`,
            method: 'POST',
            formData: data
        }
        const res = await RequestHelper.requestGenerator(req)
        return await res.json()
    },
    put: async (uri, id, data) => {
        const req = {
            uri: `${MainApp.base_uri}/API/${uri}/${id}`,
            method: 'PUT',
            formData: data
        }
        const res = await RequestHelper.requestGenerator(req)
        return await res.json()
    }
}

export { Api }