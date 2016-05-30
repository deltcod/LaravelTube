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
    <br />
    <h3>Comments</h3>
    <hr />
    <div class="commentBox">
        <ul class="commentList">
            <li v-for="comment in video.comments" v-bind="getUser(comment.user_id, comment.id)">
                <div class="commenterImage">
                    <img id="avatarComment{{comment.user_id}}{{comment.id}}" src="" />
                </div>
                <div class="commentText">
                    <p class="">{{comment.comment}}</p><span class="date sub-text" id="nameUserComment{{comment.user_id}}{{comment.id}}"></span>
                    <div class="form-inline form-add-comment" v-if="isLoggedIn == 1">
                        <div v-if="comment.user_id ==  getUserLogin().id">
                            <input class="form-control" id="your-update-comment{{comment.id}}" type="text" placeholder="{{comment.comment}}" />
                            <button @click="updateComment(comment.id)" class="btn btn-success btn-comment">Update</button>
                            <button @click="deleteComment(comment.id)" class="btn btn-danger btn-comment">Delete</button>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="form-inline form-add-comment">
            <div class="form-group">
                <input class="form-control" type="text" id="your-comments" name="your-comments" placeholder="Your comments" />
            </div>
            <div class="form-group">
                <button @click="commentVideo(isLoggedIn)" class="btn btn-success btn-comment">Add</button>
            </div>
        </div>
    </div>
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

                $('#errorLogin div').remove();

                if(!checkLogin){
                    $('#errorLogin').append('<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please!</strong> login first</div>');
                } else{
                    var user=jQuery.parseJSON($('meta[name=user]').attr("content"));
                    this.$http.post('/api/videos/'+this.video.id+'/like-dislike', {user_id: user.id,  video_id: this.video.id, type: type}).then(function (response) {
                    });
                }

            },

            getUser: function(id, comment_id){
                this.$http.get('/api/users/'+id).then(function (response) {
                    $('#avatarComment'+id+comment_id).attr('src', response.data.data.avatar);
                    $('#nameUserComment'+id+comment_id).append(response.data.data.name);
                });
            },

            commentVideo: function(isLoggedIn){

                var checkLogin= this.checkLogin(isLoggedIn);

                $('#errorLogin div').remove();

                if(!checkLogin){
                    $('#errorLogin').append('<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Please!</strong> login first</div>');
                } else{
                    var user=jQuery.parseJSON($('meta[name=user]').attr("content"));
                    var comment=$("#your-comments").val();
                    this.$http.post('/api/videos/'+this.video.id+'/comments', {user_id: user.id,  video_id: this.video.id, comment: comment}).then(function (response) {
                        this.getVideo();
                    }).catch(function (error){
                        $('#errorLogin').append('<div class="alert alert-danger" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error</strong> You have exceeded the limit for comments in one hour.</div>');
                    });

                }
            },

            updateComment: function(id){
                var comment=$("#your-update-comment"+id).val();
                this.$http.put('/api/videos/'+this.video.id+'/comments', {id: id, comment: comment}).then(function (response) {
                    this.getVideo();
                });
            },

            deleteComment: function(id){
                this.$http.delete('/api/videos/'+this.video.id+'/comments', {id: id}).then(function (response) {
                    this.getVideo();
                });
            },

            checkLogin: function(isLoggedIn){
                if(isLoggedIn == 1){
                    return true;
                } else{
                    return false;
                }
            },

            getUserLogin: function(){
                var user=jQuery.parseJSON($('meta[name=user]').attr("content"));
                return user;
            }
        }
    }
</script>

<style>

    .alert-danger {
        background-color: #dd4b39;
        border-color: #dd4b39;
        color: white;
    }

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

     .commentBox {
         padding:10px;
     }
     .commentBox .form-group:first-child, .actionBox .form-group:first-child {
         width:80%;
     }
     .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
         width:18%;
     }
     .commentBox .form-group * {
         width:100%;
     }

     .commentList {
         padding:0;
         list-style:none;
         max-height:200px;
         overflow:auto;
     }
     .commentList li {
         margin:0;
         margin-top:10px;
     }
     .commentList li > div {
         display:table-cell;
     }
     .commenterImage {
         width:30px;
         margin-right:5px;
         height:100%;
         float:left;
     }
     .commenterImage img {
         width:100%;
         border-radius:50%;
     }
     .commentText p {
         margin:0;
     }
     .sub-text {
         color:#aaa;
         font-family:verdana;
         font-size:11px;
     }
</style>