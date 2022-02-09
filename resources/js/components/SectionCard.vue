<template>
    <section class="section-card container">

        <h1 class="my-5">Our Products</h1>

        <div class="row align-items-stretch">
            <div class="col-4 mb-4" v-for="product in products" :key="`prodotto-${product.id}`">
                <div class="card-product d-flex flex-column justify-content-between p-4 border h-100 position-relative">

                    <div class="info">
                        <h4>{{ product.brand }}</h4>
                        <h5 class="fw-light">{{ product.name_product }}</h5>
                    </div>

                    <div class="img-product d-flex justify-content-center my-5">
                        <img :src="`${product.thumb}`" :alt="`${product.name_product}`" class="w-50">
                    </div>

                    <div class="mb-3 d-flex flex-column">
                        <span class="price-deatail text-black-50">{{ product.price_detail }}</span>
                        <span class="price fs-3">€ {{ product.price }}</span>
                    </div>

                    <span class="position-absolute bottom-0 end-0 mb-3 me-3">
                        <i class="fa-solid fa-cart-shopping btn btn-primary px-4 fs-4 rounded-pill"></i>
                    </span>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';

export default {
    name: 'SectionCard',
    data() {
        return {
            products: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get('http://127.0.0.1:8000/api/products')
                .then(res => {
                    this.products = res.data;
                })
        },
    }
}
</script>

<style lang="scss" scoped>
    .section-card{
        .card-product{
            border-radius: 10px;
        }
        h4, h5, .price{
            color: #1b3d79;
        }
    }
</style>