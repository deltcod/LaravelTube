<template>
    <h1>Best Videos</h1>
    <ul class="list-inline" id="bestVideosList">
        <li v-for="video in bestVideos">
            <div class="card" id="bestVideoCard">
                <video id="my-video" class="video-js" controls preload="auto" width="350" height="300"
                       data-setup='{"playbackRates": [1, 1.5, 2] }'>
                    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type='video/mp4'>

                    <p class="vjs-no-js">
                        To view this video please enable JavaScript, and consider upgrading to a web browser that
                        <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                    </p>
                </video>
                <div class="card-block">
                    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{ video.dislikes }}</button>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ video.likes }}</button>
                    <h4 class="card-text" id="bestVideoParagraph">{{ video.name.substring(0,17) }}</h4>
                    <p>{{ video.category }}</p>
                </div>
            </div>
        </li>
    </ul>
</template>

<script>
    export default{

        data(){
        return{
            bestVideos:[]
        }
    },

    ready: function(){
        this.getBestVideos();
    },

    methods:{
        getBestVideos: function(){
            this.$http.get('/api/videos/best').then(function (response) {
                this.$set('bestVideos', response.data.data);
            });
        }
    }
    }
</script>

<style>
    #bestVideosList>li:hover{
        background-color: transparent;
        border: 1px solid #46FF62;
    }
    #bestVideoCard{
        background-color: #101010;
    }

    .video-js { color: #46FF62; }
    .video-js .vjs-play-progress { background: #46FF62; }

    .video-js{margin: auto;}

</style>