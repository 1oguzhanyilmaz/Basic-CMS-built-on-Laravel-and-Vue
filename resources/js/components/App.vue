<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Home</router-link>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto"></ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!--<li class="nav-link"> Hi, There</li>-->
                        <router-link to="/about" class="nav-link">About</router-link>
                        <router-link to="/contact" class="nav-link">Contact</router-link>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container py-2">
            <router-view></router-view>
        </div>
        <div class="container-fluid p-0 m-0">
            <div class="jumbotron">
                <h3 class="text-center">F o o t e r</h3>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "App"
    }
</script>

<style scoped>

</style>