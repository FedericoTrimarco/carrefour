<template>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="lello">
                        <h4>Company</h4>
                    </div>
                    <ul>
                        <li><a href="#">about us</a></li>
                        <li><a href="#">our service</a></li>
                        <li><a href="#">privacy policy</a></li>
                        <li><a href="#">affiliate program</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="lello">
                        <h4>Company</h4>
                    </div>

                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">returns</a></li>
                        <li><a href="#">order status</a></li>
                        <li><a href="#">payment options</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="lello">
                        <h4>Company</h4>
                    </div>
                    <ul>
                        <li><a href="#">watch</a></li>
                        <li><a href="#">bag</a></li>
                        <li><a href="#">shoes</a></li>
                        <li><a href="#">dress</a></li>
                    </ul>
                </div>
                <div class="col">
                    <div class="lello">
                        <h4>Company</h4>
                    </div>
                    <ul>
                        <div class="git_links">
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/AlessandroVano/"
                                >
                                    Ale
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/FedericoTrimarco/"
                                >
                                    Fe
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/Tolihama/"
                                >
                                    Fra
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/stefanofilippini/"
                                >
                                    Ste
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/Nuccia/"
                                >
                                    Ele
                                </a>
                            </li>
                            <li>
                                <a
                                    rel="stylesheet"
                                    href="https://github.com/GvMazzon25/"
                                >
                                    Gio
                                </a>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
export default {
    name: "Footer",
};
</script>

<style lang="scss">
footer {
    background-color: #474c5a;
    max-width: 100%;
    margin: auto;
    padding: 50px 0;
}
ul {
    list-style: none;
}
h4 {
    font-size: 18px;
    color: #ffffff;
    text-transform: capitalize;
    margin-bottom: 30px;
}
.lello {
    position: relative;
    h4::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: -10px;
        background-color: #e91e63;
        height: 2px;
        box-sizing: border-box;
        width: 50px;
    }
}

ul li:not(:last-child) {
    margin-bottom: 10px;
}
ul li a {
    font-size: 16px;
    text-transform: capitalize;
    color: #ffffff;
    text-decoration: none;
    font-weight: 300;
    color: #bbbbbb;
    display: block;
    transition: all 0.3s ease;
}

ul li a:hover {
    color: #ffffff;
    padding-left: 8px;
}
</style>
