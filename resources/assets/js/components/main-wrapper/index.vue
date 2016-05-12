<template>
    <h1 id="nameRoute">{{nameRoute}}</h1>
    <ul class="list-inline videoListCard">
        <li v-for="video in videos">
            <a v-link="'/videos/' + video.id" id="videoLink"><div class="card videoList">
                <video id="video" class="video-js">
                    <source :src=video.path+'.mp4' type='video/mp4' />
                </video>
                <div class="card-block">
                    <button type="button" class="btn btn-danger pull-right"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> {{ video.dislikes }}</button>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{ video.likes }}</button>
                    <h4 class="card-text">{{ video.name.substring(0,17) }}</h4>
                    <p>{{ video.category }}</p>
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
        }
    }
    }
</script>

<style>
    #nameRoute{
        text-transform: capitalize;
    }
    #videoLink{
        text-decoration:  none;
    }

    #video{
        width:350px;
        height:300px;
    }
</style>