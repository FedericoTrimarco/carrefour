<template>
    <div>
        <Header />
        <Categories />
        <main>
            <SectionCard />
        </main>

    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Categories from '../components/Categories.vue';
import SectionCard from '../components/SectionCard.vue';
export default {
    name: 'App',
    components: {
        Header,
        SectionCard,
        Categories,
    }
}
</script>

<style lang="scss">
// @import '../../sass/_variables.scss';

</style>