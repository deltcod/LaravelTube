<template>
    <div class="side search showing" id="searchForm">
        <input type="search" placeholder=" Search">
    </div>
</template>

<script>

</script>

<style>
    #searchForm {
        display: flex;
        align-items: center;
        justify-content: center;
        flex: 0 0 256px;
        background: transparent;
        margin-top: 10px;
    }

    #searchForm>input{
        width: 250px;
        height: 30px;
        margin-top: 0;
        border-radius: 12px;
        border: 2px solid #181818;
        font-family: 'Raleway', sans-serif;
        color: #303030;
        font-size: 13px;
    }

    #searchForm>input:focus {
        outline: none;
    }
</style>
