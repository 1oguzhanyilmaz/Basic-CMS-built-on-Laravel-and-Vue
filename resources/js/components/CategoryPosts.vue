<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <div class="card-header">Category : {{ this.$route.params.slug }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <template v-for="post in posts">
                                <post-item :post="post"></post-item>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import PostItem from './PostItem.vue';

    export default {
        name: "CategoryPosts",
        data() {
            return {
                posts: [],
                category: {}
            }
        },
        created(){
            // let uri = 'http://test.test/api/posts';
            axios.get(`/api/categories/${this.$route.params.slug}/posts`)
                .then((response) => {
                    this.posts = response.data.data;
                });
            // axios.get(`/api/categories/${this.$route.params.slug}`)
            //     .then((response) => {
            //         this.category = response.data.data;
            //     });
        },
        components: { PostItem }
    }
</script>

<style scoped>

</style>