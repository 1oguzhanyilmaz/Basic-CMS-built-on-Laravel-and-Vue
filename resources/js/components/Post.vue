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
                            <router-link :to="categoryLink" class="text-muted btn btn-sm float-right">{{post.category.name}}</router-link>
                        </h5>
                        <hr>
                        <p>Post image</p>
                        <p>{{ post.content }}</p>
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
                post: {}
            }
        },
        methods: {
            goBack(){
                this.$router.push('/');
            }
        },
        computed: {
            categoryLink(){
                return `/categories/${this.post.category.id}/posts`;
            }
        },
        created(){
            axios.get(`/api/posts/${this.$route.params.id}`)
                .then((response) => {
                    // console.log(response.data.data);
                    this.post = response.data.data;
                });
        }
    }
</script>

<style scoped>
    .kategori{ font-size: 14px; }
</style>