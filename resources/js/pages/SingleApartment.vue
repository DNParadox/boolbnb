<template>
    <div class="single">
        <div class="container mt-3" v-if="apartment">
            <h2 class="mt-3">{{apartment.title}}</h2>
            <div class="d-flex justify-content-between">
                <span><span class="mr-1"><i class="fa-sharp fa-solid fa-star fa-xs mr-1"></i>{{ randomValutation() }}</span> · <span><a href="">{{ randomRecensioni() }} recensioni</a></span></span>
                <span><span class="box-share"><i class="fa-solid fa-arrow-up-from-bracket"></i> condividi</span><span class="box-share"><i class="fa-regular fa-heart"></i> save</span></span>
            </div>
            <div class="row mt-3">
                <div class="col-md-6 mb-3">
                    <div class="image">
                        <img :src="apartment.photo" class="card-img-top" alt="apartment.title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div v-if="center">
                        <Map :center="center" />
                    </div>
                </div>
            </div>

            <div class="row bottom-part">
                <div class="col-md-8 left">
                    
                    <h2 class="mt-3">{{apartment.title}}</h2>
                    <div class="info">
                        <span>4 ospiti</span>
                        <span>{{ apartment.room_number }} camere da letto</span>
                        <span>{{ apartment.bed_number }} letti</span>
                        <span>{{ apartment.bathroom }} bagni</span>
                        <span>{{ apartment.square_meters }} metri quadri</span>
                    </div>
                    <hr>
                    <div class="address"><i class="fa-solid fa-location-dot mr-1"></i>{{apartment.address}}</div>
                    <div class="description">
                        <p>{{apartment.description}}</p>
                    </div>

                    <hr>

                    <h4>Cosa troverai</h4>
                    <div class="services">
                        <div v-for="service in apartment.service" :key="service.id"><i :class="service.icon"></i> {{ service.name }}</div>
                    </div>

                    <hr>
                </div>

                <div class="col-md-4 right">
                    <div v-if="send">
                        <div class="alert alert-success" role="alert">
                            Messaggio inviato con successo
                        </div>  
                    </div>
                    <div class="contact">
                        <form @submit.prevent="sendMessage">
                            <h2>Contatta l'host</h2>
                            <div class="mb-3">
                                <label for="user-mail" class="form-label">Mail *</label>
                                <input type="email" class="form-control" id="user-mail" v-model="email" required="required">
                            </div>
                            <div class="mb-3">
                                <label for="user-message" class="form-label">Messaggio *</label>
                                <textarea class="form-control" id="user-message" v-model="note" rows="5" required="required"></textarea>
                            </div>
                            <input type="submit" class="btn color-btn-message">
                        </form>        
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Map from '../components/MapPage.vue' 
export default {
    name: 'SingleApartment',
    components: {
        Map
    },
    data() {
        return{
            apartment: null,
            center: null,
            email: '',
            note: '',
            send: false,
        }
    },
    methods: {
        getSinglePost() {
        axios.get('http://127.0.0.1:8000/api/contact/' + this.$route.params.id)
        .then((response) => {
            if(response.data.success){
                console.log(response);
                this.apartment = response.data.results;
                this.center = {lng: parseFloat(response.data.results.longitude), lat: parseFloat(response.data.results.latitude)};
            } else {
                this.$router.push({name: 'not-found'})
            }           
        })
        },
        sendMessage(){
            axios.post('http://127.0.0.1:8000/api/sendmessage/',{
                apartment_id: this.apartment.id,
                message: this.note,
                email: this.email,
            })
            .then((response) => {
                if(response.data.success){
                    console.log(response);
                    this.send = true;
                    setTimeout(this.sendInfo, 7000);
                    this.clearMessage();
                }          
            }) 
        },
        getCurrentUser(){
            axios.get('http://127.0.0.1:8000/users')
            .then((response) => {
                if(response.data.email){
                    this.email = response.data.email;
                }   
            })
        },
        clearMessage(){
            this.note = '';
        },
        sendInfo(){
            this.send = false;
        },
        randomValutation(){

            let value = Math.random() * (4.98 - 0.5) + 0.5;
            value = String(value).slice(0, 4);
            return value;
        },
        randomRecensioni(){
            let value = Math.floor(Math.random() * 1500)+1;
            return value;
        }
    },
    created(){
        this.getSinglePost();
        this.getCurrentUser();

    },
}
</script>

<style lang="scss" scoped>
.container {
    .address {
      color: grey; 
      margin-bottom: 20px; 
    }

    .image {
        img{
            border-radius: 15px;
            object-fit: cover;
            height: 400px;
            box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
        } 
    }

    /* .mapboxgl-canvas {
        width: 100%;
        height: 400px;
    } */

    .map {
        width: 100%;
        height: 100%;
        
        
    }
    .mapboxgl-map {
        border-radius: 15px;
    }

    .bottom-part {
        display: flex;
        justify-content: space-between;
        padding: 30px 0;

        .left {
            .info {
                font-size: 18px; 
                span:not(:last-child)::after {
                    content: ' · ';
                }
            }

            hr {
                border-color: lightgrey;
            }

            .description {
                font-size: 18px;
            }

            .services {
                font-size: 16px;
                display: flex;
                justify-content: flex-start;
                flex-wrap: wrap;

                span {
                    flex-basis: 50%;
                    margin-bottom: 15px;     
                } 
                div{
                    margin-right: 16px; 
                    width: 40%;
                }            
            }
        }

        .right {

            .contact {
                border: 1px solid lightgray;
                border-radius: 15px;
                padding: 10px;
                box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
            }
        }
    }

    .box-share{
        padding: 5px 7px;
        margin-left: 8px;
        &:hover{
            background-color: lightgrey;    
            border-radius: 12px;
        } 
    }

    .color-btn-message{
        color: white;
        background-color: #ff385c;
        width: 100%;
        margin-bottom: 0.6rem;
    }
    
}
</style>