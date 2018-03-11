var express = require('express');
var app = express();
var bodyParser = require('body-parser');

app.use(bodyParser.urlencoded({
    extended: true
}));

app.use(bodyParser.json());

app.get('/', function (req, res) {
  res.send('Hello World! This is an express app')
})

app.post('/process', function(req, res){
  console.log(req.body);
  var obj = {
    name:req.body.name,
    email:req.body.email
  }
  console.log(obj);
  res.send(JSON.stringify(obj));
})



app.listen(3001, function () {
  console.log('Example app listening on port 3001!')
})
