var http = require('http');
var servidor = http.createServer();
var io = require('socket.io').listen(servidor);
var port = 5000;

io.sockets.on('connection', function(socket)
{
  socket.on("cake_event", function(data){
    io.sockets.emit("cake_response", data.arg);
    console.log(data.arg);
  });
});

servidor.listen(port, function(){
  console.log("El socket está funcionando en el puerto " + port);
});
