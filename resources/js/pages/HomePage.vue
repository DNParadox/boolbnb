<template>
<div>
    <div>
      <input list="autocomplete" type="text" placeholder="Search..." v-model="currentSearch" @input="autocomplete()">
      <datalist id="autocomplete">

      </datalist>
      <input type="button" value="submit" @click="filterByDistance()">

        <div>
            <h2>Servizi aggiuntivi</h2>
            <ul>
            <li v-for="service in services" :key="service.id" >
                {{ service.name }}
            </li>
            </ul>
        </div>
    </div>
    <div v-if="filteredApartments.length > 0">
        {{this.$router.push({
                name: 'search', 
                params: {
                    filtered: filteredApartments, 
                    currentPosition: currentSearchPosition,
                }
            }) 
        }}
    </div>
    <!-- Inizio  -->
    <section class="front-container container-fluid" v-else>
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
                <div class="card mx-sm-auto mx-md-0" v-for="currentApartment in currentApartmentsSponsored" :key="currentApartment.id">
                    <!-- Inside Card -->
                    <router-link :to="{name: 'single-apartment', 
                    params: { id: currentApartment.id }
                    }">
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
            currentSearch: '',
            currentApartmentsSponsored: [],
            currentApartments: [],
            currentSearchPosition: null,
            services: [],
            filteredApartments: []
        }
    },
    methods:{
        getApartmentSponsored(){ 
        axios.get('http://127.0.0.1:8000/api/sponsored').then((response)=>{
            response.data.results.forEach((apartment) =>{
                this.currentApartmentsSponsored.push(apartment);
            })

        })},
        getApartment(){ 
        axios.get('http://127.0.0.1:8000/api/search').then((response)=>{
            response.data.results.forEach((apartment) =>{
                
                this.currentApartments.push(apartment);
            })

        })},
        getServices(){
            axios.get('http://127.0.0.1:8000/api/services').then((response)=>{
            response.data.results.forEach((service) =>{
                this.services.push(service);
            });
        } 
        )},
        getDistance(latitude1,longitude1,latitude2,longitude2){ 
            // R: raggio della terra (paragonabile ad una sfera) in chilometri
            let R = 6371;
            let deltaLat = this.degreeToRadians(latitude1 - latitude2);
            let deltaLon = this.degreeToRadians(longitude1 - longitude2);

            let lat1 = this.degreeToRadians(latitude1);
            let lat2 = this.degreeToRadians(latitude2);

            var a = Math.sin(deltaLat/2) * Math.sin(deltaLat/2) +
            Math.cos(lat1) * Math.cos(lat2) * Math.sin(deltaLon/2) * Math.sin(deltaLon/2);

            var c = 2 * Math.atan2(Math.sqrt(a),Math.sqrt(1-a));
            var d = R * c;

            return d;
        },   
        degreeToRadians(degrees)
        {
            var pi = Math.PI;
            return degrees * (pi/180);
        },
        autocomplete(){
            let dataList = document.getElementById('autocomplete');
            console.log(this.currentSearch);
            let suggestions = [];
            axios.get(`https://api.tomtom.com/search/2/geocode/${this.currentSearch}.json?key=lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq`)
            .then((response)=>{
                if(response.data.results.length > 0){
                
                    for(let i = 0; i < 4; i++) {
                    
                        let addressHint = `${response.data.results[i].address.streetName}, ${response.data.results[i].address.streetNumber ? `${response.data.results[i].address.streetNumber},` : ""} ${response.data.results[i].address.municipality}, ${response.data.results[i].address.countrySubdivision}`;

                        if(response.data.results[i].address.streetName) {
                        suggestions.push(addressHint);
                        }
                    }
                
                    dataList.innerHTML = "";

                    suggestions.forEach((suggestion) => {
                        dataList.innerHTML += `<option>${suggestion}</option>`;
                    });

                    this.currentSearchPosition = response.data.results[0].position;
                }

            });

        
        },
        filterByDistance(){
            this.filteredApartments = [];
            this.currentApartments.forEach((apartment)=> {
                parseFloat(this.getDistance(parseFloat(this.currentSearchPosition.lat), parseFloat(this.currentSearchPosition.lon), parseFloat(apartment.latitude), parseFloat(apartment.longitude)));
                if(this.getDistance(parseFloat(this.currentSearchPosition.lat), parseFloat(this.currentSearchPosition.lon), parseFloat(apartment.latitude), parseFloat(apartment.longitude)) < 50) {
                    this.filteredApartments.push(apartment);
                }
            })
        }
    },
    mounted(){
        this.getApartmentSponsored();
        this.getServices();
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