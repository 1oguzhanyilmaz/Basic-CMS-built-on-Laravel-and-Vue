<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <a @click.prevent="goBack()" class="border border-0 btn btn-sm btn-outline-primary my-2">Go back to posts</a>
                        <hr>
                        <h5>
                            {{ post.title }}
                            <!--<span v-if="loading">{{ post.category.name }}</span>-->
                            <router-link v-if="loading" :to="categoryLink" class="text-muted btn btn-sm float-right">{{post.category.name}}</router-link>
                        </h5>
                        <hr>
                        <p>
                            <img v-if="post.image" :src="`/storage/${post.image}`" alt="post-img" style="width:100%;">
                            <img v-else src="https://via.placeholder.com/300x150" alt="post-img" style="width:100%;">
                        </p>
                        <p v-html="post.content"></p>
                        <hr>
                        <p><strong>Tags</strong></p>
                        <template v-for="tag in (post.tags)">
                            <router-link to="/" class="btn btn-sm btn-primary mx-1">{{ tag.name }}</router-link>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Post",
        data(){
            return {
                post: {},
                loading: false
            }
        },
        methods: {
            goBack(){
                this.$router.push('/');
            }
        },
        computed: {
            categoryLink(){
                return `/categories/${this.post.category.slug}/posts`;
            }
        },
        created(){
            axios.get(`/api/posts/${this.$route.params.slug}`)
                .then((response) => {
                    // console.log(response.data.data);
                    this.loading = true;
                    this.post = response.data.data;
                });
        }
    }
</script>

<style scoped>
    .kategori{ font-size: 14px; }
</style>