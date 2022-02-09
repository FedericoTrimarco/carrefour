<template>
    <div>
        <Header />
        <h1>lello</h1>

    </div>
</template>

<script>
import Header from '../components/Header.vue';
export default {
    name: 'App',
    components: {
        Header,
    }
}
</script>

<style lang="scss">
    h1{
        color: red;
    }
</style>