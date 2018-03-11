var express = require('express')
var app = express()

//needed for styles, images etc
app.use(express.static(__dirname + '/public'));


app.set('view engine', 'pug')

app.get('/', function(req, res) {
    res.render(
        'index', {
            title: 'Hey Hey Hey!',
            message: 'Yo Yo'
        })
})

app.get('/users', function(req, res) {

    var results = [{
        "name": "Jo",
        "things": [21,22,23]
    }, {
        "name": "Jo",
        "things": [21,22,23]
    }, {
        "name": "Jo",
        "things": [21,22,23]
    }, {
        "name": "Jo",
        "things": [21,22,23]
    }, {
        "name": "Jo",
        "things": [21,22,23]
    }]

    res.render(
        'users', {
            title: 'Users',
            message: 'List users',
            results: results
        })
})

app.listen(3000, function() {
    console.log('Example app listening on port 3000!')
})
