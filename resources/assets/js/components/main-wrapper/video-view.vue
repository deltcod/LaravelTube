<template>
    <div class="list-inline video-js-responsive-container vjs-hd">
        <video id="my-video{{video.id}}" class="video-js" controls>
            <source id="videoWebm" type="video/webm">
            <source id="videoMp4" type="video/mp4">
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
    </div>
    <h1>{{video.name}}</h1>
    <hr />
    <div id="errorLogin"></div>
    <button type="button" id="dislike-video{{video.id}}"  @click="likeDislike(isLoggedIn, 'dislike')" class="btn btn-danger pull-right"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{ video.dislikes }}</button>
    <button type="button" id="like-video{{video.id}}" @click="likeDislike(isLoggedIn, 'like')" class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ video.likes }}</button>
</template>

<script>
    export default{
        data(){
            return{
                video:'',
                isLoggedIn: $("meta[name=login-status]").attr('content'),
                api_token:$('meta[name=api_token]').attr("content"),
            }
        },

        ready: function(){
            this.getVideo();

        },

        methods:{
            getVideo: function(){
                this.$http.get('/api'+this.$route.path).then(function (response) {
                    this.$set('video', response.data.data);
                    $('#videoMp4').attr('src', response.data.data.path+'.mp4');
                    $('#videoWebm').attr('src', response.data.data.path+'.webm');
                    videojs(document.getElementsByClassName('video-js')[0], {}, function(){
                        this.load();
                        this.play();
                    });
                });
            },
            likeDislike: function(isLoggedIn, type){

                var checkLogin= this.checkLogin(isLoggedIn);
                if(!checkLogin){
                    $('#response div').remove();
                    $('#errorLogin').append('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please!</strong> login first</div>');
                } else{
                    var user=jQuery.parseJSON($('meta[name=user]').attr("content"));
                    this.$http.post('/api/videos/'+this.video.id+'/like-dislike', {user_id: user.id,  video_id: this.video.id, type: type}).then(function (response) {
                    });
                }

            },

            checkLogin: function(isLoggedIn){
                if(isLoggedIn == 1){
                    return true;
                } else{
                    return false;
                }
            }
        }
    }
</script>

<style>

 .video-js, .vjs-control-bar{ color: #46FF62; }

    .video-js-responsive-container.vjs-hd {
        padding-top: 56.25%;
    }
    .video-js-responsive-container.vjs-sd {
        padding-top: 75%;
    }
    .video-js-responsive-container {
        width: 100%;
        position: relative;
    }
    .video-js-responsive-container .video-js {
        height: 100% !important;
        width: 100% !important;
        position: absolute;
        top: 0;
        left: 0;
    }
</style>