const express = require('express');
const routes = express.Router()

// resquest, response
/*routes.get('/', (request, response) => {
    console.log('entrei no index')

    return response.sendFile(__dirname + "/views/index.html")

    //nodemon .
})*/
const views = __dirname + "/views/" //basePath quando usar ejs retira ele
// resquest, response
routes.get('/', (request, response) => response.render(views + "index"))
routes.get('/job', (request, response) => response.render(views + "job"))
routes.get('/job/edit', (request, response) => response.render(views + "job-edit"))
routes.get('/profile', (request, response) => response.render(views + "profile"))


module.exports = routes;