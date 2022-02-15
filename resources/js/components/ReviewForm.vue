<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">
                <h3 class="text-center">Recensioni</h3>
                <div v-if="mainArray">
                    <div v-for="(el, i) in mainArray" :key="`review-${i}`">
                        <h4>
                            {{ el.author }}
                        </h4>
                        <p>
                            {{ el.rate }}
                        </p>
                        <p>
                            {{ el.description }}
                        </p>
                    </div>
                </div>
                <span v-else>Non ci sono ancora recensioni per questo prodotto</span>
            </div>
            <div class="col-4">
                <div
                    v-show="sending"
                    class="banner banner-success"
                >
                    Recensione inviata correttamente
                </div>
                <h3 class="text-center">Form Recensioni</h3>
                <form @submit.prevent="reviewForm">
                    <div class="mb-3">
                        <label for="author" class="form-label">Inserisci il tuo nome</label>
                        <input type="text" name="author" id="author" v-model="author" class="form-control">

                        <div 
                            v-for="(error,index) in errors.author"
                            :key= "`err-author-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Inserisci la tua recensione</label>
                        <textarea name="description" id="description" v-model="description" class="form-control"></textarea>

                        <div 
                            v-for="(error,index) in errors.description"
                            :key= "`err-description-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Inserisci la tua mail</label>
                        <input type="text" name="email" id="email" v-model="email" class="form-control">

                        <div 
                            v-for="(error,index) in errors.email"
                            :key= "`err-email-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="rate" class="form-label">Inserisci la tua valutazione</label>
                        <input type="number" min="0" max="5" name="rate" step="1" id="rate" v-model="rate" class="form-control">
                    
                        <div 
                            v-for="(error,index) in errors.rate"
                            :key= "`err-rate-${index}`"
                            class="text-danger"
                        >
                            {{ error }}
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-1" :disabled="sending">
                        {{ sending ? 'invio in corso...' : 'invio' }}
                    </button>
                </form>
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
    },

    data() {
        return {
        author:'',
        description:'',
        email:'',
        rate:'',
        errors: {},
        sending: false,
        };
    },

    methods: {
        reviewForm() {
            this.sending = true;
            axios.post('http://127.0.0.1:8000/api/reviews', {
                author: this.author,
                rate: this.rate,
                email: this.email,
                description: this.description,
            })
            .then(res => {
                console.log(res.data);
                this.sending = false;
                if(res.data.errors) {
                    this.errors = res.data.errors;
                } else {
                    this.author = '';
                    this.rate = '';
                    this.email = '';
                    this.description = '';
                    
                }
            })
            .catch(err => {
                this.sending = false;
                console.log(err);
            })
        }
    }
}
</script>

<style lang="scss" scoped>

</style>