<template>
    <section class="product-detail py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 d-flex justify-content-center">
                    <!-- product img with zoom -->
                    <div class="product-img border border-primary w-75">
                        <zoom-on-hover v-if="product" :img-normal="product.thumb"></zoom-on-hover>

                        <div v-else class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>

                <!-- info -->
                <div class="product-info col-6 p-5 d-flex flex-column justify-content-between">
                    <!-- name product -->
                    <div class="product-name d-flex justify-content-between align-items-center">
                        <div>
                            <h2>{{ product.brand.name }}</h2>
                            <span>{{ product.name }}</span>
                            <p>{{ product.description }}</p>
                        </div>

                        <img
                            v-if="product.is_new === 1"
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxc5_at9g0TttKAdjl0GjJ2hYZY_6PX5TSaQ&usqp=CAU"
                            alt="novità-logo"
                            class="is_new"
                        >
                    </div>

                    <!-- price detail -->
                    <div class="price-deatail d-flex justify-content-between align-items-center">
                        <div class="mb-3 d-flex flex-column ">
                            <span class="price-deatail text-black-50">{{ product.price_detail }}</span>
                            <span class="price fs-3">€ {{ product.price }}</span>
                        </div>

                        <span class="btn btn-primary rounded-pill px-4 d-flex align-items-center">
                            Aggiungi
                            <i class="fa-solid fa-cart-shopping fs-4 ms-3"></i>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ProductDetail',
    data() {
        return {
            product: null,
        }
    },
    created() {
        this.getPosts();
    },
    methods: {
        getPosts() {
            axios.get(`http://127.0.0.1:8000/api/products/${this.$route.params.slug}`)
                .then(res => {
                //  if (res.data.not_found) {
                //         this.$router.push({ name: 'not_found'})
                //     } else {
                        this.product = res.data;
                    // }
                })
                .catch(err => log.error(err));
        },
    }
}
</script>

<style lang="scss" scoped>
    .product-detail{
        background-color: #f7f7f7;
        .product-img{
            overflow: hidden;
            border-radius: 20px;
            .zoom{
                transition: transform ease-in-out 0.5s;
                &:hover{
                    transform: scale(2.5);
                }
            }
        }
        .product-info{
            .is_new{
                width: 50px;
                height: 50px;
            }
            h2, .price{
                color: #1b3d79;
            }
        }
    }
</style>