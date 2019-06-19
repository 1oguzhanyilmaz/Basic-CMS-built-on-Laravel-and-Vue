<template>
    <div>

        <div class="container-fluid p-0 m-0">

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-end">
                <a class="navbar-brand mr-auto" href="/">Home</a>
                <!--<a class="nav-link ml-auto mr-1" href="/admin/dashboard">Always Show</a>-->
                <!--icon-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                    <ul class="navbar-nav text-right">
                        <!--<li> <router-link :to="{ name: 'create', params: { userId } }">NEW POST </router-link></li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Welcome, {{ userName }}</a>
                        </li>
                        <li class="nav-item">
                            <span @click="logout" class="nav-link" style="cursor: pointer">Logout</span>
                        </li>
                    </ul>
                </div>
            </nav>

        </div>

        <div class="container p-2">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            <router-link :to="{ name: 'read', params: {  } }">
                                Posts
                            </router-link>
                            <hr>
                            <router-link :to="{ name: 'user', params: {  } }">
                                Users
                            </router-link>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <span>
                            <router-link :to="{ name: 'create', params: { userId } }" class="btn btn-primary btn-sm m-2">
                                Add New Post
                            </router-link>
                            <!--<router-link :to="{ name: 'create', params: { userId } }">NEW POST </router-link>-->
                        </span>

                        <div class="card-body">
                            <router-view></router-view>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>
<script>
    export default {
        props: {
            userId: {
                type: Number,
                required: true
            },
            userName: {
                type: String,
                required: true
            }
        },
        data() {
            return {};
        },
        methods: {
            logout() {
                axios.post("/logout").then(() => {
                    window.location = "/";
                });
            }
        }
    };
</script>