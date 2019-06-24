<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <!--<div class="card-header">Home</div>-->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <template v-for="post in posts">
                                <post-item :post="post"></post-item>
                            </template>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header">Categories</div>
                                        <div class="card-body" style="">
                                            <template v-for="category in categories">
                                                <category-item :category="category"></category-item>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--<div class="row mt-4">-->
                                <!--<div class="col-md-12">-->
                                    <!--<div class="card">-->
                                        <!--<div class="card-header">Tags</div>-->
                                        <!--<div class="card-body">-->
                                            <!--<router-link to="/" class="btn btn-sm btn-outline-info border border-0">Php</router-link>-->
                                            <!--<router-link to="/" class="btn btn-sm btn-outline-info border border-0">Matlab</router-link>-->
                                            <!--<router-link to="/" class="btn btn-sm btn-outline-info border border-0">C++</router-link>-->
                                            <!--<router-link to="/" class="btn btn-sm btn-outline-info border border-0">Go</router-link>-->
                                        <!--</div>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PostItem from './PostItem.vue';
    import CategoryItem from './CategoryItem.vue';

    export default {
        name: "Home",
        data() {
            return {
                posts: [],
                categories: [],
            }
        },
        created(){
            // let uri = 'http://test.test/api/posts';
            axios.get('/api/posts')
                .then((response) => {
                    // console.log(response.data.data);
                    this.posts = response.data.data;
                });
            axios.get('/api/categories')
                .then((response) => {
                    // console.log(response.data.data);
                    this.categories = response.data.data;
                });
        },
        components: { PostItem, CategoryItem }
    }
</script>

<style scoped>

</style>