<template>
    <div>
        <Header />
        <main>
            <SectionCard />
        </main>

    </div>
</template>

<script>
import Header from '../components/Header.vue';
import SectionCard from '../components/SectionCard.vue';
export default {
    name: 'App',
    components: {
        Header,
        SectionCard,
    }
}
</script>

<style lang="scss">
// @import '../../sass/_variables.scss';

</style>