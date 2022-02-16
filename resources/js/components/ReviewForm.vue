<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center mb-3 mt-5">Aggiungi la tua Recensione</h3>
                <div
                    v-show="isSent"
                    class="banner banner-success text-center"
                >
                    La tua recensione è stata inviata correttamente
                </div>
                <form v-show="!isSent" @submit.prevent="reviewForm">
                    <div class="mb-3 d-flex flex-column align-items-center">
                        <input type="text" name="author" id="author" v-model.trim="author" placeholder="Nome" class="form-control">

                        <div
                            v-for="(error,index) in errors.author"
                            :key= "`err-author-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3 d-flex flex-column align-items-center">
                        <textarea name="description" id="description" rows="1" v-model.trim="description" placeholder="Descrizione" class="form-control"></textarea>

                        <div 
                            v-for="(error,index) in errors.description"
                            :key= "`err-description-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3 d-flex flex-column align-items-center">
                        <input type="text" name="email" id="email" v-model.trim="email" placeholder="Email" class="form-control">

                        <div 
                            v-for="(error,index) in errors.email"
                            :key= "`err-email-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3 d-flex flex-column align-items-center">
                        <input type="number" min="0" max="5" name="rate" step="1" id="rate" v-model="rate" placeholder="Voto" class="form-control">
                    
                        <div 
                            v-for="(error,index) in errors.rate"
                            :key= "`err-rate-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-1" :disabled="sending" @click="refreshReviewList()">
                        {{ sending ? 'invio in corso...' : 'invio' }}
                    </button>
                </form>
            </div>
            <div class="col-12">
                <h3 class="text-center mb-3">Recensioni</h3>
                <div v-if="mainArray">
                    <div class="review p-3 mb-3" v-for="(el, i) in mainArray" :key="`review-${i}`">
                        <h4 class="author">
                            {{ el.author }}
                        </h4>
                        <span v-for="(star, i) in el.rate" :key="`star-${i}`">
                            <i class="fa-solid fa-star mb-3 text-warning"></i>
                        </span>
                        <p class="review-description">
                            {{ el.description }}
                        </p>
                    </div>
                </div>
                <span v-else>Non ci sono ancora recensioni per questo prodotto</span>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ReviewForm',

    props: {
        mainArray: Array,
        product_id: Number,
    },

    data() {
        return {
            author: '',
            description: '',
            email: '',
            rate: '',
            errors: {},
            sending: false,
            isSent: false,
        };
    },

    methods: {
        reviewForm() {
            this.sending = true;
            axios.post('http://127.0.0.1:8000/api/reviews', {
                product_id: this.product_id,
                author: this.author,
                rate: this.rate,
                email: this.email,
                description: this.description,
            })
            .then(res => {
                this.sending = false;
                if(res.data.errors) {
                    this.errors = res.data.errors;
                } else {
                    this.author = '';
                    this.rate = '';
                    this.email = '';
                    this.description = '';
                    this.isSent = true;
                }
            })
            .catch(err => {
                this.sending = false;
                console.log(err);
            })
        },
    }
}
</script>

<style lang="scss" scoped>
    .review {
        background-color: white;
        border-radius: 15px;
        .author {
            color: #1b3d79;
            margin: 5px 0px;
            font-size: 25px;
        }
        .rating {
            color: yellow;
            margin: 5px 0px;
        }
        .review-description {
            color: #212529;
            margin: 5px 0px;
        }
    }

    form {
/*         .form-label {
            
        } */
        .form-control {
            border: none;
            -moz-appearance: textfield;
            background-color: #f7f7f7;
            border-bottom: 1px solid rgb(175, 175, 175);
            border-radius: 0px;
            overflow-y: hidden;
            &::placeholder {
            color: rgb(143, 143, 143);
            }
        }
    }
</style>