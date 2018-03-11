var mymodule = require('./mymodule');

var http = require('http');

var server = http.createServer(function(req, res) {
  res.writeHead(200);
  res.end('Hi everybody!');
});

server.on('close', function() { // We listened to the close event
    console.log('Goodbye!');
})

server.listen(8080); // Starts the server

mymodule.sayHello();
mymodule.sayGoodbye();
