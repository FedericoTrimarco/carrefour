<template>
    <section class="categories" v-if="categories !== null">
        <ul class="d-flex flex-wrap justify-content-center container">
            <Category 
                v-for="category in categories" 
                :key="`category-${category.id}`" 
                :categoryData="category"
            />
        </ul>
    </section>
</template>

<script>
import axios from 'axios';

// Components import
import Category from './Category';

// BaseURL for axios api call
const baseURL = 'http://127.0.0.1:8000'; // da modificare in caso di discrepanza

export default {
    name: 'Categories',
    components: {
        Category,
    },
    data() {
        return {
            categories: null,
        }
    },
    created() {
        this.getCategories();
    },
    methods: {
        getCategories() {
            axios.get(`${baseURL}/api/products/categories`)
                .then(res => {
                    this.categories = res.data;
                })
                .catch(err => console.log(err));
        }
    }
}
</script>

<style lang="scss" scoped>
section.categories {
    ul {
        list-style: none;
    }
}
</style>