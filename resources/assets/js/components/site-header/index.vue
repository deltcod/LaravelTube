<template>
    <div id="navigation" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <button type="button" class="navbar-toggle pull-left" v-on:click="toogleSideMenu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <search-form></search-form>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li v-if="isLoggedIn != 1"><user-login></user-login></li>
                    <li v-if="isLoggedIn != 1"><user-register></user-register></li>
                    <li v-else><a href="/upload"><span class="glyphicon glyphicon-home"></span> {{user.name}}</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</template>

<script>
    import searchForm from './search-form.vue';
    import userLogin from './user-login.vue';
    import userRegister from './user-register.vue';
    export default{
        components: { searchForm, userLogin, userRegister},

        data(){
            return{
                isLoggedIn: $("meta[name=login-status]").attr('content'),
                user:'',
            }
        },

        ready: function(){
            this.getUser();
        },

        methods: {
            toogleSideMenu: function (event) {
                event.preventDefault();
                $("#wrapper").toggleClass("active");
            },
            getUser: function (){
                if(this.isLoggedIn == 1){
                    this.$set('user', jQuery.parseJSON($('meta[name=user]').attr("content")));
                }

            }
        }
    }
</script>

<style>
    #navigation {
        background: #282828;
    }
</style>
