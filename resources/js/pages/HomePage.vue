<template>
        <!-- Inizio  -->
        <section class="front-container container">
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
                <div class="col d-flex">
                    <!-- Card -->
                    <div class="card mx-sm-auto mx-md-0" v-for="currentApartment in currentApartments" :key="currentApartment.id">
                        <!-- Inside Card -->
                        <router-link :to="{name: 'single-apartment', }">
                            <img :src="currentApartment.photo" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h4>{{ currentApartment.title }}</h4>
                                <div class="description">
                                    <div>{{ currentApartment.address }}</div>
                                    <span>80 € a notte</span>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>          
            </div>
        </section>
    </div>
</template>

<script>
export default {
    name: 'Homepage',
    data() {
        return{
            currentApartments: [],
        }
    },
    methods:{
        getApartment(){ 
        axios.get('http://127.0.0.1:8000/api/sponsored').then((response)=>{
            response.data.results.forEach((apartment) =>{
                this.currentApartments.push(apartment);
            })

        })},
    },
    mounted(){
        this.getApartment();
    },
}
</script>

<style lang="scss" scoped>
.front-container{
    .card {
        margin-top: 3rem;;
        border: none;
        background-color: inherit;
        width: 250px;
        img {
            border-radius: 24px;
            width: 300px;
            height: 280px;
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