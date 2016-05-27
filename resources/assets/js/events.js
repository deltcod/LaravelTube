import Vue from 'vue'
import VueResource from 'vue-resource'
Vue.use(VueResource)

var socket = require('socket.io-client')('http://localhost:3000');

socket.on('likedislike-push', function(data){
    Vue.http.get('/api/videos/'+data.likeDislike.video_id).then(function (response) {
        $("#dislike-video"+response.data.data.id).html('<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '+response.data.data.dislikes);
        $("#like-video"+response.data.data.id).html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+response.data.data.likes);
        $("#likes-card-block"+response.data.data.id).html('<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '+response.data.data.likes);
        $("#dislikes-card-block"+response.data.data.id).html('<i class="fa fa-thumbs-o-down" aria-hidden="true"> '+response.data.data.dislikes);
    });
});
