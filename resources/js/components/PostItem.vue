<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    {{ post.title }}
                </div>
                <div class="card-body">
                    <p>
                        <strong>Category : </strong>
                        <router-link :to="categoryLink" class="btn btn-sm btn-outline-primary border border-0">{{ post.category.name }}</router-link>
                    </p>
                    <p><small class="text-muted">Posted on {{ post.created_at | formatDate}}</small></p>
                    <!--<img :src="iconUrl" alt="">-->
                    <p>
                        <img v-if="post.image" :src="`/storage/${post.image}`" alt="post-img" style="width:100%;">
                        <img v-else src="https://via.placeholder.com/300x150" alt="post-img" style="width:100%;">
                    </p>
                    <!--<p>{{ post.image }}</p>-->
                    <p v-html="post.content.substring(0,50)"></p>
                    <router-link :to="postLink">Read More</router-link>
                    <hr>
                    <p class="text-muted ">
                        <strong>Tags:</strong>
                        <span v-for="tag in (post.tags)">
                            <router-link :to="categoryLink" class="btn btn-sm btn-outline-primary border border-0">{{ tag.name }} </router-link>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PostItem",
        props: {
            post: { type: Object, required: true }
        },
        methods: {
            dateFormatted: function(d){
                return d.toLocaleFormat('%d-%b-%Y');
            }
        },
        computed: {
            postLink(){
                return `/posts/${this.post.slug}`;
            },
            categoryLink(){
                return `/categories/${this.post.category.slug}/posts`;
            },
            iconUrl () {
                // alert(`${this.post.image}`);
                // return require(`../../../public/storage/${this.post.image}`)
                // The path could be '../assets/img.png', etc., which depends on where your vue file is
            }
        }
    }
</script>

<style scoped>

</style>