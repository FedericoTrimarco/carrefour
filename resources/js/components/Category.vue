<template>
    <li class="category">
        <!-- <a :href="`/categories/${categoryData.slug}`" class="d-flex flex-column text-center px-2 m-2"> -->
        <a :href="$router.resolve({name: 'categories', params: {slug: categoryData.slug}}).href" class="d-flex flex-column text-center px-2 m-2">
            <div class="category-logo pt-3 pb-2">
                <img src="https://www.carrefour.it/on/demandware.static/-/Sites-carrefour-storefront-catalog-IT/default/dw311c27eb/icons/spesa-on-line/ic_Enoteca_NormalCat.svg" :alt="`logo ${categoryData.name}`">
            </div>
            <div class="category-name py-2">{{ categoryData.name }}</div>
        </a>
    </li>
</template>

<script>
export default {
    name: 'Category',
    props: {
        categoryData: Object,
    }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&family=Orbitron&display=swap');

li.category a {
    height: 100px;
    width: 100px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0,0,0,.1);
    font-family: 'Open Sans', sans-serif;
    font-size: .7rem;
    font-weight: 600;
    line-height: .7rem;
    text-decoration: none;
    color: $main-text;
    transition: transform .3s ease-in-out;

    img {
        width: 40%;
    }

    &:hover {
        color: $main-link;
        transform: translateY(-10px);

        img {
            filter: invert(47%) sepia(85%) saturate(6216%) hue-rotate(202deg) brightness(95%) contrast(93%);
        }
    }
}
</style>