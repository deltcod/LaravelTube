<template>
    <site-header></site-header>
    <div id="wrapper">
        <side-bar></side-bar>
        <main-wrapper></main-wrapper>
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
    import mainWrapper from './components/main-wrapper/index.vue'
    export default{
        components: { siteHeader, sideBar, mainWrapper,},
    }
</script>
