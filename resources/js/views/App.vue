<template>
    <div>
        <Header />
        <Categories />

        <main>
            <SectionCard />
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Categories from '../components/Categories.vue';
import SectionCard from '../components/SectionCard.vue';
import Footer from '../components/Footer.vue';
export default {
    name: 'App',
    components: {
        Header,
        SectionCard,
        Categories,
        Footer,
    }
}
</script>

<style lang="scss">
// @import '../../sass/_variables.scss';

</style>