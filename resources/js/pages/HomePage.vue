<template>
    <div>
        <div class="f-banner">
            <div class="container">
                <div class="text-center">
                    <h2>Ricerca case e appartamenti in affitto</h2>
                </div>
            </div>
        </div>

        <!-- Inizio  -->
        <section class="front-container container-fluid">
            <!-- Row -->
            <div class="row">
                <!-- Col -->
                <div class="col text-center">
                     <h2 class="">Appartamenti in evidenza</h2>
                </div>
            </div>

            <!-- Row -->
            <div class="row">
                <!-- Col -->
                <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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

                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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


                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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

                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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


                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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

                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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

                    <!-- Col -->
                    <div class="col">
                    <!-- Card -->
                    <div class="card">
                        <!-- Inside Card -->
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
        </section>
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
    .card {
        margin-top: 3rem;;
        border: none;
        background-color: inherit;
        width: 250px;
        img {
            border-radius: 24px;
            width: 100%;
        }
        .card-body {
            padding-left: 0;
        }

        // h4 {
        //     font-weight: bold;
        // }

        .description {
            color: grey;
        }

        a {
            margin-top: 7px;
        }
    }
}
    

</style>