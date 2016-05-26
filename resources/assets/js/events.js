var socket = require('socket.io-client')('http://localhost:3000');
socket.on('likedislike-push', function(data){
    alert('Push');
});
