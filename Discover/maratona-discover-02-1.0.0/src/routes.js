const express = require('express');
const routes = express.Router()

const profile = {
    name: "André",
    avatar: "https://avatars.githubusercontent.com/u/50181391?v=4",
    "monthly-budget": 12000.00,
    "days-per-week": 40,
    "hours-per-day": 80,
    "vacation-per-year": 40,
}

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
routes.get('/profile', (request, response) => response.render(views + "profile", { profile }))


module.exports = routes;