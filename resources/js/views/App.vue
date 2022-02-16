<template>
    <div class="h-100 d-flex flex-column">
        <Header />
        <Categories />

        <main>
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Categories from '../components/Categories.vue';
// import SectionCard from '../components/SectionCard.vue';
import Footer from '../components/Footer.vue';
export default {
    name: 'App',
    components: {
        Header,
        // SectionCard,
        Categories,
        Footer,
    }
}
</script>

<style lang="scss">
// @import '../../sass/_variables.scss';
    body {
        height: 100vh;
    }
    main {
        flex-grow: 1;
    }
</style>