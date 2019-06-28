<template>
    <div>
        <router-link :to="categoryLink">{{ category.name }} ({{ category.postsCount }})</router-link>
    </div>
</template>

<script>
    export default {
        name: "CategoryItem",
        data(){
            return {
                postsCount: 0
            }
        },
        props: {
            category: { type: Object, required: true }
        },
        computed: {
            categoryLink(){
                return `/categories/${this.category.slug}/posts`;
            }
        },
        created() {
            axios.get(`/api/categories/${this.category.id}`)
                .then((response) => {
                    this.postsCount = response.data.data.length;
                });
        }
    }
</script>

<style scoped>

</style>