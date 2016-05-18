<template>
    <site-header></site-header>
    <div id="wrapper">
        <side-bar></side-bar>
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12" id="content">
                        <router-view transition-mode="out-in"></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<style>
    body{
        background-color: #303030;
    }
    *{
        color: white;
        font-family: 'Raleway', sans-serif;
    }

    .nav>li:hover, .sidebar-nav>li:hover{
        background-color: #00BE2D;
    }

    .v-link-active{
        border-left: 3px solid #46FF62;
        color: white !important;
    }

    .videoList:hover{
        border: 1px solid #46FF62;
    }
    .videoList{
        background-color: #101010;
    }
</style>
<script>
    import siteHeader from './components/site-header/index.vue';
    import sideBar from './components/side-bar/index.vue';
    export default{
        components: { siteHeader, sideBar,},
    }
</script>
