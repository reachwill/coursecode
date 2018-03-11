// npm install express --save
// npm install morgan --save

var express = require('express');
var app = express();
var logger = require('morgan');

app.use(logger('dev'));

app.get('/', function(req, res) {
    console.log('yehah');

    //res.send('Hello World! This is an express app called testapp');

    res.sendFile(__dirname + '/index.html');

})

app.get('/get', function(req, res) {
    res.send('another page');
});


app.listen(3002, function() {
    console.log('Example app listening on port 3002!')
})
