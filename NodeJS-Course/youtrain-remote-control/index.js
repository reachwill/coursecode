var express = require('express');
var app = express();
require('./app/app.js')(app,express);

// app.set('view engine', 'pug');
app.use(express.static(__dirname + '/public'));


var server = app.listen(3000,function(){
  console.log('App running on localhost:3000');
});

require('./socket/socket.js')(server);

