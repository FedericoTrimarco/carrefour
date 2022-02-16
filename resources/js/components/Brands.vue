<template>
    <div>
        <label for="brand" class="form-label">Marca:</label>
        <input 
            type="text" 
            name="brand" 
            id="brand" 
            placeholder="Insert brand" 
            class="form-control" 
            autocomplete="false" 
            v-model.trim="input" 
            @keyup="suggestionsList"
        >
        <div class="suggestions-list" v-show="!suggestionsShow">
            <ul>
                <li
                    v-for="(brand, i) in brands"
                    :key="brand.id"
                    @click="setValue(i)"
                    v-show="brandsFilteredList.includes(brand.id)"
                >
                    {{ brand.name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Brands',

    props: {
        brands: Array,
        old_input: String,
    },

    data() {
        return {
            input: '',
            brandsFilteredList: [],
            isSet: false,
        }
    },

    computed: {
        suggestionsShow() {
            return this.input.length === 0 || this.isSet;
        },
    },

    created() {
        if (this.old_input !== '' && this.old_input !== null) {
            this.input = this.old_input;
            this.isSet = true;
        }
    },

    methods: {
        setValue(i) {
            this.input = this.brands[i].name;
            this.isSet = true;
        },
        suggestionsList() {
            this.brandsFilteredList = [];
            this.isSet = false;
            let i = 0;
            if (this.input.length > 0) {
                this.brands.forEach(brand => {
                    if (brand.name.toLowerCase().substring(0, this.input.length).includes(this.input.toLowerCase()) && i <= 10) {
                        this.brandsFilteredList.push(brand.id);
                        i++;
                    }
                });
            }
        },
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/app.scss';

div {
    position: relative;

    .suggestions-list {
        background: #fff;
        margin: 0;
        padding: 1rem 0;
        box-shadow: 0 5px 10px 0 #ccc,
                    0 0 0 1px #ccc;
        border-radius: 0 0 10px 10px;

        ul {
            list-style: none;
            margin: 0;
            padding: 0;

            li {
                width: 100%;
                padding: 0 5rem 0 1rem;
                &:hover {
                    background: $cyan;
                }
            }
        }
    }
}

</style>