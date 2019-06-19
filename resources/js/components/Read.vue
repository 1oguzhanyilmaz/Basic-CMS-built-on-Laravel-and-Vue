<template>
    <div id="posts">
        <!--<p>### Component Read ###</p>-->

        <!--posts-->
        <p class="border p-2" v-for="post in posts">
            {{ post.title }}

            <router-link :to="{ name: 'update', params: { postId : post.id } }">
                <button type="button" class="p-1 mx-3 float-right btn btn-primary btn-sm">
                    Update
                </button>
            </router-link>

            <button type="button" @click="deletePost(post.id)" class="p-1 mx-3 float-right btn btn-danger btn-sm">
                Delete
            </button>
        </p>

        <!--next and prev-->
        <div>
            <button v-if="next" type="button" @click="navigate(next)" class="m-3 btn btn-primary">
                Next
            </button>
            <button v-if="prev" type="button" @click="navigate(prev)" class="m-3 btn btn-primary">
                Previous
            </button>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.getPosts();
        },
        data() {
            return {
                posts: {},
                next: null,
                prev: null
            };
        },
        methods: {
            getPosts(address) {
                axios.get(address ? address : "/api/posts").then(response => {
                    this.posts = response.data.data;
                    this.prev = response.data.links.prev;
                    this.next = response.data.links.next;
                });
            },
            deletePost(id) {
                axios.delete("/api/posts/" + id).then(response => this.getPosts())
            },
            navigate(address) {
                this.getPosts(address)
            }
        }
    };
</script>