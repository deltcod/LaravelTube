<template>
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12" id="bestVideos">
                    <h1>Best Videos</h1>
                    <ul class="list-inline" id="bestVideosList">
                        <li v-for="video in bestVideos">
                            <div class="card" id="bestVideoCard">
                                <video id="example_video_1" class="video-js vjs-default-skin"
                                       controls preload="auto" width="350" height="300"
                                       data-setup='{"example_option":true}'>
                                    <source src="http://clips.vorwaerts-gmbh.de/VfE_html5.mp4" type="video/mp4" />
                                    <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                                </video>
                                <div class="card-block">
                                    <h4 class="card-text" id="bestVideoParagraph">{{ video.name.substring(0,28) }}</h4>
                                    <p>{{ video.category }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
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
</style>