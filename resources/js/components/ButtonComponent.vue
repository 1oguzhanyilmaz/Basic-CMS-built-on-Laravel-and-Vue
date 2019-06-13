<template>
    <button type="submit" class="myBtn"></button>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
    .myBtn{ background-color: lightcoral; color: #000000; }
</style>