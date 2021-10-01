const RequestHelper = {
    optionGenerator: (req) => {
        if (req.method === "GET" || req.method === "DELETE") {
            return {
                headers: {
                    "content-type": "application/json",
                    "X-Token": req.token
                },
                method: req.method
            }
        }

        return {
            headers: {
                "content-type": "application/json",
                "X-Token": req.token
            },
            method: req.method,
            body: JSON.stringify(req.formData)
        }
    },
    requestGenerator: (req) => {
        const option = RequestHelper.optionGenerator(req)
        return fetch(req.uri, option)
    }
}

export { RequestHelper }