<template>
    <div class="single">
        <div class="container" v-if="apartment">
            <h2 class="mt-3">{{apartment.title}}</h2>
            <div class="address"><i class="fa-solid fa-location-dot"></i> {{apartment.address}}</div>

            <hr>
            <div class="row">
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

                    <hr>

                    <div class="info">
                        <span>2 camere da letto</span>
                        <span>5 letti</span>
                        <span>1 bagno</span>
                        <span>80 metri quadri</span>
                    </div>

                    <hr>

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
                    <div class="contact">
                        <h2>Contatta l'host</h2>
                        <form >
                            <div class="mb-3">
                                <label for="user-mail" class="form-label">Mail</label>
                                <input type="email" class="form-control" id="user-mail" :value="$user =! null ? '' : $user.email">
                            </div>
                            <div class="mb-3">
                                <label for="user-message" class="form-label">Messaggio</label>
                                <textarea class="form-control" id="user-message" rows="5"></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary">
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
    },
    created(){
        this.getSinglePost();
    }

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
                margin-top: 25px;
                font-size: 18px; 
                span:not(:last-child)::after {
                    content: ' | ';
                }
            }

            hr {
                border-color: lightgrey;
            }

            .description {
                font-size: 18px;
            }

            .services {
                font-size: 18px;
                display: flex;
                justify-content: flex-start;
                flex-wrap: wrap;

                span {
                    flex-basis: 50%;
                    margin-bottom: 15px;     
                } 
                div{
                    margin-right: 16px; 
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
    
}
</style>