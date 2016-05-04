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
</style>
<script>
    import siteHeader from './components/site-header/index.vue';
    import sideBar from './components/side-bar/index.vue';
    export default{
        components: { siteHeader, sideBar,},
    }
</script>
