// All node modules have events associated with them
// Here's the docs...
// https://nodejs.org/api/http.html


var http = require('http');

var server = http.createServer(function(req, res) {
  res.writeHead(200);
  res.end('Hi everybody!');
});

server.on('close', function() { // We listened to the close event
    console.log('Goodbye!');
})

server.listen(8080); // Starts the server

server.close(); // Stops the server. Triggers the close event
