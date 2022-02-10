<template>
    <section class="categories" v-if="categories !== null">
        <button class="btn left btn-primary" @click="leftTranslate">
            <i class="fas fa-angle-left"></i>
        </button>
        <ul>
            <Category 
                v-for="category in categories" 
                :key="`category-${category.id}`" 
                :categoryData="category"
            />
        </ul>
        <button class="btn right btn-primary" @click="rightTranslate">
            <i class="fas fa-angle-right"></i>
        </button>
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
            translateX: 0,
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
        },
        leftTranslate() {
            //
        },
        rightTranslate() {
            //
        }
    }
}
</script>

<style lang="scss" scoped>
section.categories {
    position: relative;
    overflow: hidden;

    .btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 1;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;

        &.left {
            left: 50px;
        }

        &.right {
            right: 50px;
        }
    }

    ul {
        list-style: none;
        display: flex;
        flex-wrap: nowrap;
        align-items: center;
        margin: 0;
        transition: translateX .5s ease-in-out;
    }
}
</style>