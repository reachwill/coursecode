// npm install bodyParser
// npm install request



var express = require('express')
var app = express()
var request = require('request')
var bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({
    extended: true
}));

app.use(bodyParser.json());

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

app.get('/contact', function(req, res) {
    res.render(
        'contact', {
            title: 'Contact',
            message: 'Fill in the form'
        })
})

app.post('/send', function(req, res) {
    console.log('send request')

    // bodyParser required for next bit


    console.log(req.body.user.name);
    request({
          uri: "http://localhost:3001/process",
          method: "POST",
          form: {
              name: req.body.user.name,
              email: req.body.user.email
          }
      },
      function(error, response, body) {
          console.log(body);
          var obj = JSON.parse(body);
          console.log(obj);
          res.render(
              'sent', {
                  title: 'Sent',
                  message: 'We will call you soon ' + obj.name
              })
      });




})

app.get('/users', function(req, res) {

    var results = [{
        "name": "Jo",
        "things": [21, 22, 23]
    }, {
        "name": "Jo",
        "things": [21, 22, 23]
    }, {
        "name": "Jo",
        "things": [21, 22, 23]
    }, {
        "name": "Jo",
        "things": [21, 22, 23]
    }, {
        "name": "Jo",
        "things": [21, 22, 23]
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
