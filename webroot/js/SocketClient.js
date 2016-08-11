$(document).ready(function(){
  var socket = io.connect('http://128.76.8.38:5000');
  socket.on("cake_response", function(data){
    console.log(data);
    notification(data);
  });
});
