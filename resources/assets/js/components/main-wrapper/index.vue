<template>
    <h1 id="nameRoute">{{nameRoute}}</h1>
    <ul class="list-inline videoListCard">
        <li v-for="video in videos">
            <a v-link="'/videos/' + video.id" class="videoLink"><div class="card videoList">
                <video class="video-js videoCard">
                    <source :src=video.path+'.webm' type='video/webm'>
                    <source :src=video.path+'.mp4' type='video/mp4'>
                </video>
                <div class="card-block" id="card-block{{video.id}}">
                    <p class='label label-info pull-right'>{{video.category}}</p>
                    <h4 class="card-text">{{ video.name.substring(0,20) }}</h4>
                    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-thumbs-o-down" aria-hidden="true">{{video.dislikes}}</i></button>
                    <button type="button" class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true">{{video.likes}}</i></button>
                </div>
            </div></a>
        </li>
    </ul>
</template>

<script>
    export default{
        data(){
            return{
                videos:[],
                nameRoute:''
            }
        },

        route: {
            canReuse: function () {
                return this.getVideos();
            }
        },

        ready: function(){
            this.getVideos();
        },

        methods:{
            getVideos: function(){
                this.$http.get('/api/videos'+this.$route.path).then(function (response) {
                    this.$set('videos', response.data.data);
                    if(this.$route.params.name != null){
                        this.$set('nameRoute', this.$route.params.name);
                    } else {
                        this.$set('nameRoute', 'Best Videos');
                    }
                });
            },
        }
    }
</script>

<style>

    .videoList {
        margin-bottom: 20px !important;
    }

    h1, h2, h3, h4{
        text-transform: capitalize;
    }
    .videoLink{
        text-decoration:  none !important;
    }

    .videoCard{
        width:350px;
        height:300px;
    }
</style>