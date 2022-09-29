<template>
    <div>
        <div class="f-banner">
            <div class="container">
                <div class="text-center">
                    <h2>Ricerca case e appartamenti in affitto</h2>
                </div>
            </div>
        </div>

        <h2 class="text-center m-5">Appartamenti in evidenza</h2>

        <div class="front-container">
            <div class="row row-cols-6">
                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col">
                    <div class="card mb-5">
                        <a href="#">
                            <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>Villa torre delle stelle</h4>
                                <div class="description">
                                    <div>Via della torre, Napoli</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Homepage'
}
</script>

<style lang="scss" scoped>
.f-banner {
    background: linear-gradient(to right, blue, red);
    padding: 60px 0;

    .container {
        h2 {
            color: white;
            font-size: 35px;
        }
    }
}

.front-container{
    width: 90%;
    margin: 0 auto;

    .card {
        border: none;
        background-color: inherit;
        img {
            border-radius: 15px;
        }

        .card-body {
            padding-left: 0;
        }

        h4 {
            font-weight: bold;
        }

        .description {
            color: grey;
        }

        a {
            margin-top: 7px;
        }
    }
}
    

</style>