module.exports = function(server){
    const socketIO = require('socket.io');
    const io = socketIO(server);

io.on('connection',(socket)=>{
  console.log('client connected');

  socket.on('clientInput',(data)=>{
    console.log(data);
    io.emit('serverOutput',data);
  });
});
}