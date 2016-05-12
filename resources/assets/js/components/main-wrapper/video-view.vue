<template>
    <div class="list-inline video-js-responsive-container vjs-hd">
        <video id="my-video" class="video-js" controls preload="auto" data-setup='{"playbackRates": [1, 1.5, 2] }'>
            <source id="videoMp4" type="video/mp4">
            <source id="videoWebm" type="video/webm">
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
            </p>
        </video>
    </div>
    <h1 id="nameRoute">{{video.name}}</h1>
    <p>{{ video.category }}</p>
    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{ video.dislikes }}</button>
    <button type="button" class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ video.likes }}</button>
</template>

<script>
    export default{
        data(){
        return{
            video:[],
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
                videojs("my-video", {}, function(){
                    this.load();
                });
            });
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