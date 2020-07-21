const express = require('express')
const bodyParser = require('body-parser')
const app = express()
const port = 3000

app.use(express.static('public'))
app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())

const studentRoute = require('./routes/student.js')
app.use('/api/v1/student', studentRoute)



app.listen(`${port}`, () => {
    console.log('Listening on port ' + `${port}`)
})