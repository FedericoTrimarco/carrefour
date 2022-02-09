<template>
    <div id="container">
      <div id="header" class="d-flex justify-content-between">
        <a href="#">
          <img src="https://www.carrefour.it/on/demandware.static/Sites-carrefour-IT-Site/-/default/dwd7bbaf67/images/carrefour-logotype.svg" alt="Logo carrefour">
          <img src="https://www.carrefour.it/on/demandware.static/Sites-carrefour-IT-Site/-/default/dw6d5c338b/images/carrefour-logomark.svg" alt="">
        </a>
        <input type="text" placeholder="Di che cosa hai bisogno?" class="form-control w-50">
        <a href="#">
          <img src="https://www.carrefour.it/on/demandware.static/Sites-carrefour-IT-Site/-/default/dw59c9c6e7/images/payback-ball.png" alt="">
        </a>
        <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
      </div>
      <div id="Navbar" class="d-flex justify-content-between">
        <nav>
          <ul class="d-flex">
            <li>
              <a href="#">Spesa Online</a>
            </li>
            <li>
              <a href="#">Elettronica e Giocattoli</a>
            </li>
            <li>
              <a href="#">Promozioni</a>
            </li>
          </ul>
        </nav>
        <nav>
          <ul class="d-flex">
            <li>
              <a href="#">Vivi di gusto</a>
            </li>
            <li>
              <a href="#">Idee regalo</a>
            </li>
            <li>
              <a href="#">Spesa smart</a>
            </li>
            <li>
              <a href="#">Accedi</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>

</template>

<script>
export default {
    name: 'Header',
}
</script>

<style lang="scss" scoped>
    #container {
      padding: 20px;
      #header {
        height: 50px;
        padding: 10px 0px;
        a {
          text-decoration: none;
          height: 100%;
          img {
            height: 100%;
          }
        }
      }
      #Navbar {
        nav {
          ul {
            margin-top: 20px;
            padding: 0px;
            li {
              list-style: none;
              margin-right: 20px;
              padding-right: 20px;
              border-right: 1px solid gray;
              &:last-of-type {
                border-right: none;
                margin-right: 0px;
                padding-right: 0px;
              }
              a {
                text-decoration: none;
                color: #0e3368;
                transition: 1s;
                &:hover {
                  color: #0970e6;
                }
              }
            }
          }
        }
      }
    }


</style>