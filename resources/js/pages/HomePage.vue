<template>
<div class="width">
    <div class="mb-4 d-flex justify-content-between align-items-center research-menu">
        <div class="logo">
            <img src="../../../public/storage/logo-boolbnb.png" alt="BoolBnB">
            <!-- <span class="logo-text">Boolbnb</span> -->
        </div>
        <div class="search">
            <input class="bar" list="autocomplete" type="text" placeholder="Inserisci una città o un indirizzo..." v-model="currentSearch" @input="autocomplete()">
            <datalist id="autocomplete">

            </datalist>
            <button class="ms_btn" type="submit" @click="filterByDistance()"><i class="fa-solid fa-magnifying-glass icon"></i></button>

        </div>
        <div class="user" @click="menu_show = !menu_show">
            <i class="fa-solid fa-user login"></i>
            <div v-if="menu_show">
                <div class="menu">
                    <i class="fa-solid fa-caret-up"></i>
                    <ul class="menu-login">
                        <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Accedi</span></a></li>
                        <li><a href="http://127.0.0.1:8000/register"><span class="ml-2">Registrati</span></a></li><hr>
                        <li><a href="http://127.0.0.1:8000/logged/apartments"><span class="ml-2">Diventa un host</span></a></li>
                        <li><span class="ml-2">Proponi un'esperianza</span></li>
                        <li><span class="ml-2">Assistenza</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <div>
        <!-- Row -->
        <hr class="mb-3">
        <div class="row">
            <!-- Col -->
            <div class="col text-center wapper-container">
                <div @click="scroll_left()"><i class="fa-solid fa-chevron-left color-hover"></i></div>
                <div class="images d-flex wrapper-box">
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/35919456-df89-4024-ad50-5fcb7a472df9.jpg" alt=""><!-- 1 --><span>Minicase</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/8e507f16-4943-4be9-b707-59bd38d56309.jpg" alt=""><!-- 2 --> <span>Isole</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/d7445031-62c4-46d0-91c3-4f29f9790f7a.jpg" alt=""><!-- 3 --><span>Case Organiche</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/4759a0a7-96a8-4dcd-9490-ed785af6df14.jpg" alt=""><!-- 4 --><span>lutre</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/5ed8f7c7-2e1f-43a8-9a39-4edfc81a3325.jpg" alt=""><!-- 5 --><span>B&B</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/c0a24c04-ce1f-490c-833f-987613930eca.jpg" alt=""><!-- 6 --><span>Parchi nazionali</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/732edad8-3ae0-49a8-a451-29a8010dcc0c.jpg" alt=""><!-- 7 --><span>Baite</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/c5a4f6fc-c92c-4ae8-87dd-57f1ff1b89a6.jpg" alt=""><!-- 8 --><span>Wow!</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/10ce1091-c854-40f3-a2fb-defc2995bcaf.jpg" alt=""><!-- 9 --><span>Spiaggia</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/31c1d523-cc46-45b3-957a-da76c30c85f9.jpg" alt=""><!-- 10 --><span>Camper</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/33dd714a-7b4a-4654-aaf0-f58ea887a688.jpg" alt=""><!-- 11 --><span>Dimore storiche</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/50861fca-582c-4bcc-89d3-857fb7ca6528.jpg" alt=""><!-- 12 --><span>Design</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/8b44f770-7156-4c7b-b4d3-d92549c8652f.jpg" alt=""><!-- 13 --><span>Polo Nord</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/757deeaa-c78f-488f-992b-d3b1ecc06fc9.jpg" alt=""><!-- 14 --><span>Sulle piste</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/c8bba3ed-34c0-464a-8e6e-27574d20e4d2.jpg" alt=""><!-- 15 --><span>Sci</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/1d477273-96d6-4819-9bda-9085f809dad3.jpg" alt=""><!-- 16 --><span>A-frame</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/4d4a4eba-c7e4-43eb-9ce2-95e1d200d10e.jpg" alt=""><!-- 17 --><span>Case sull'albero</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/957f8022-dfd7-426c-99fd-77ed792f6d7a.jpg" alt=""><!-- 18 --><span>Surf</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/3fb523a0-b622-4368-8142-b5e03df7549b.jpg" alt=""><!-- 19 -->  <span>Piscine</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/6ad4bd95-f086-437d-97e3-14d12155ddfe.jpg" alt=""><!-- 20 --><span>Campagna</span></div>
                    <div><img class="i1wps9q8 dir dir-ltr" src="https://a0.muscache.com/pictures/a6dd2bae-5fd0-4b28-b123-206783b5de1d.jpg" alt=""><!-- 21 --><span>Nel deserto</span></div>
                </div>
                <div @click="scroll_right()"><i class="fa-solid fa-chevron-right color-hover"></i></div>
            </div>
        </div>
        <!-- Row -->
        <div class="container-xxl">
            <!-- Col -->
            <div class="row d-flex" v-if="currentApartmentsSponsored">
                <!-- Card -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-12" v-for="currentApartment in currentApartmentsSponsored" :key="currentApartment.id">
                    <div class="card mx-sm-auto mx-md-0">
                        <!-- Inside Card -->
                        <router-link :to="{name: 'single-apartment', 
                        params: { id: currentApartment.id }
                        }">
                            <img :src="currentApartment.photo" class="card-img-top" alt="...">
                            <div class="card-body">
                                <div class="d-flex justify-content-between"><h5>{{ currentApartment.title }}</h5><span><i class="fa-sharp fa-solid fa-star fa-xs mr-1"></i></span></div>
                                <div class="description">
                                    <div>Host Professionista</div>
                                        <div>{{ getText(currentApartment.address)  }}</div>
                                    <span>{{currentApartment.price ? currentApartment.price + '€ a notte': 'Per info contatta la struttura' }} </span>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>
            <div v-else>
                <h3>non ci sono appartamenti</h3>
            </div>          
        </div>
    </div>
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
            filteredApartments: [],
            menu_show: false,
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
            if(this.currentSearch.length > 4){
            axios.get(`https://api.tomtom.com/search/2/geocode/${this.currentSearch}.json?key=bPDrFGH37g0pZ56Wk83BxfYfIqELJR0v`)
            .then((response)=>{
                if(response.data.results.length > 0){
                    console.log(response);
                    for(let i = 0; i < 4; i++) {
                    
                        let addressHint = `${response.data.results[i].address.streetName ? `${response.data.results[i].address.streetName},` : ""} ${response.data.results[i].address.streetNumber ? `${response.data.results[i].address.streetNumber}` : ""} ${response.data.results[i].address.municipality ? `${response.data.results[i].address.municipality},` : ""} ${response.data.results[i].address.countrySubdivision ? `${response.data.results[i].address.countrySubdivision}` : ""}`;

                        if(response.data.results[i].address) {
                            suggestions.push(addressHint);
                        }
                    }
                
                    dataList.innerHTML = "";

                    suggestions.forEach((suggestion) => {
                        dataList.innerHTML += `<option>${suggestion}</option>`;
                    });

                    this.currentSearchPosition = response.data.results[0].position;
                }
            })
        };
        },
        filterByDistance(){

            this.$router.push({
                name: 'search', 
                params: {
                    currentPosition: this.currentSearchPosition,
                }
            })     
        },
        scroll_left() {
            let content = document.querySelector(".wrapper-box");
            content.scrollLeft -= 90;
        },
        scroll_right() {
            let content = document.querySelector(".wrapper-box");
            content.scrollLeft += 80;
        },
        getText(text){
            let sliced = text;
            if(text.length > 24){
               sliced = sliced.slice(0, 24) + '...';
            }

            return sliced;
        },
    },
    mounted(){
        this.getApartmentSponsored();
        this.getApartment();
    },
}
</script>

<style lang="scss" scoped>
.research-menu{
    margin-top: 20px;
    padding-inline: 15px;
    
    .logo{
        
        *{
            vertical-align: middle;
        }

        img{
            width: 130px;
        }

        .logo-text{
            margin-left: 6px;
            font-size: 24px;
            font-weight: 600;
            color: #ff385c;
        }  
    }
    
    .search {
        display: flex;
        justify-content: center;
        
        .bar {
            width: 300px;
            padding: 10px;
            border-radius: 7px 0 0 7px;
            border: 1px solid lightgray;
        }

        .ms_btn {
            padding: 10px 15px;
            background-color: #ff385c;
            color: white;
            border: none;
            border-radius: 0 7px 7px 0;
        }
    }

    .user{
        position: relative;

        .login{
            font-size: 22px;
            margin-right: 12px;
            padding: 8px;
            border: 2px solid #ff385c;
            border-radius: 20px;
            color: #ff385c;
        }

        .menu{
            margin-top: 10px;
            padding: 12px 0;
            position: absolute;
            z-index: 99999;
            right: 10px;
            left: -140px;
            border: 1px solid #939393;
            border-radius: 12px;
            background-color: #f2f2f2;

            i{
                position: absolute;
                top: -9px;
                right: 16px;
                color: #939393;
            }

            .menu-login{
                li{
                    padding-block: 5px;
                }
                li:hover{
                    background-color: #e3e3e3;
                } 
            }
        }
    }

}

@media screen and (max-width: 1000px) {
    .research-menu{
        .logo{
        display: none;  
        }

        .search {  
            .bar {
                width: 160px;
            }
        }

        
    }
    .width{
        margin-bottom: 80px;
        width: calc(100% - 200px);
    }
}

.width{
    width: 100%;
    overflow: hidden;
}


.container-xxl {
    padding-inline: 15px;
    .card {     
        margin-top: 3rem;
        border: none;
        background-color: inherit;
        img {
            border-radius: 14px;
            aspect-ratio: 1 / 1;
        }
        .card-body {
            padding-inline: 8px;
        }

        .description {
            color: grey;
        }

        a {
            margin-top: 7px;
        }
    }
  
}


.wapper-container{
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
    background-color: inherit;

    i{
        border: 2px solid #b1b1b1;
        border-radius: 50%;
        padding: 3px 5px;
        margin-bottom: 10px;
        cursor: pointer;

    }

    .images{
        width: 75%;
        overflow-x: auto;
        div{
            img{
                cursor: pointer;
                width: 32px;
                height: 32px;
                margin-inline: 30px;    
                filter: invert(64%) sepia(0%) saturate(0%) hue-rotate(174deg) brightness(92%) contrast(86%);;         
            }

            span{
                cursor: pointer;
                font-size: 11px;  
                font-weight: 700;
                color: #939393;
            }

            &:hover{
                
                filter: invert(64%) sepia(0%) saturate(0%) hue-rotate(174deg) brightness(92%) contrast(86%);;
            }
        }
        

    }
    .images{
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
}

</style>