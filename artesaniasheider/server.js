var io = require('socket.io');
var socket = io.listen(8080);
socket.on('connection', function(socket) {
    socket.on('usr_conectado', function(pNombre) {
        socket.broadcast.emit('usr_conectado', pNombre);
	socket.emit('usr_conectado',pNombre);
    });
     
    socket.on('usr_desconectado', function(pNombre, pCallback) {
        socket.broadcast.emit('usr_desconectado', pNombre);
        pCallback();
    });
});
